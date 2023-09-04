<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\DB;

class SalesInstallment extends Model
{
    use HasFactory;

     /**
     * The attributes that are not mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [
        'id',
        'created_at',
        'updated_at'
    ];

     /* Mutators and Casts */
    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

     /* Relations */
    public function sales(): BelongsTo
    {
        return $this->belongsTo(Sales::class, 'sales_id');
    }

    public function scopeFilter($query, string $search, string $salesId)
    {
        $query = $query->join('sales', 'sales.id', '=', 'sales_installments.sales_id')
                ->leftJoin('dealers', 'dealers.id', '=', 'sales.dealer_id')
                ->select(DB::raw('sales_installments.*, FORMAT(sales_installments.installment_amount, 0) formatted_installment_amount, FORMAT(sales_installments.fine, 0) formatted_fine, FORMAT(sales_installments.discount_amount, 0) formatted_discount_amount, FORMAT(sales_installments.total_payment, 0) formatted_total_payment, sales.customer_name, sales.customer_address, sales.motor_plate_number, sales.sales_code'));

        if ($salesId !== 'all') return $query->where('sales.id', $salesId)
            ->where(function ($query) use ($search) {
                $query->where('code', 'like', '%' . $search . '%')
                ->orWhere('period_no', 'like', '%' . $search . '%')
                ->orWhere('receipt_date', 'like', '%' . $search . '%')
                ->orWhere('dealers.name', 'like', '%' . $search . '%');
            });

        return $query->where(function ($query) use ($search) {
            $query->where('customer_name', 'like', '%' . $search . '%')
            ->orWhere('customer_address', 'like', '%' . $search . '%')
            ->orWhere('motor_plate_number', 'like', '%' . $search . '%')
            ->orWhere('sales_code', 'like', '%' . $search . '%');
        });
    }

    /* Essential methods */

    private function prefixBySalesType(string $salesType)
    {
        $salesPrefix = [
            'motor installment' => 'KK',
            'reinstallment' => 'KM',
        ];

        return $salesPrefix[$salesType];
    }

    private function findLastSalesByType(string $salesType): ?SalesInstallment
    {
        $lastSalesCodeByType = self::where('code', 'like', '%' . now()->format('Ym') . '%')
            ->whereHas('sales', function ($query) use($salesType) {
                $query->where('sales_type', $salesType);
            })
            ->latest('code')
            ->first();

        return $lastSalesCodeByType;
    }

    public function generateCode(): string
    {
        $salesType = $this->sales->sales_type;
        $latestSalesByType = self::findLastSalesByType($salesType);

        if ($latestSalesByType) {
            $prefix = self::prefixBySalesType($latestSalesByType->sales->sales_type);
            $sequenceNumber = (int)substr($latestSalesByType->code, -4) + 1;
        } else {
            $prefix = self::prefixBySalesType($salesType);
            $sequenceNumber = 1;
        }

        return $prefix . now()->format('Ym') . str_pad($sequenceNumber, 4, '0', STR_PAD_LEFT);
    }
}
