<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Sales extends Model
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

    protected function salesStatus(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => strtoupper($value),
        );
    }

    protected function salesType(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => strtolower($value),
        );
    }

    protected function customerName(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => ucwords($value),
        );
    }

    public function scopeFilterByCustomer($query, string $search)
    {
        $query = $query->where(function ($query) use ($search) {
            $query->where('customer_name', 'like', '%' . $search . '%')
                ->orWhere('customer_full_address', 'like', '%' . $search . '%')
                ->orWhere('motor_plate_number', 'like', '%' . $search . '%')
                ->orWhere('sales_code', 'like', '%' . $search . '%');
        });

        if (request()->route('sales')) $query->where('id', request()->route('sales')->id);
        if (auth()->user()->hasRole('cashier')) $query->whereNot('sales_status', 'pending');
        

        return $query;
    }

    public function scopeFilterByCredit($query, string $search)
    {
        return $query ->where('sales_status', 'accepted')
            ->where('is_finish_edited', false)
            ->where('sales_type', '!=', 'cash')
            ->where(function ($query) use ($search) {
                $query->where('sales_code', 'like', '%' . $search . '%')
                ->orWhere('sales_date', 'like', '%' . $search . '%')
                ->orWhere('customer_name', 'like', '%' . $search . '%')
                ->orWhere('motor_plate_number', 'like', '%' . $search . '%')
                ->orWhereHas('dealer', function ($query) use($search) {
                    $query->where('name', 'like', '%' . $search . '%');
                });
            })
            ;
    }

    /* Relations */
    public function surveyor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'sales_surveyor');
    }

    public function dealer(): BelongsTo
    {
        return $this->belongsTo(Dealer::class);
    }

    /* Essential methods */

    private function prefixBySalesType(string $salesType)
    {
        $salesPrefix = [
            'motor installment' => 'JM',
            'cash' => 'JC',
            'reinstallment' => 'JK',
        ];

        return $salesPrefix[$salesType];
    }

    private function findLastSalesByType(string $salesType): ?Sales
    {
        $lastSalesCodeByType = self::where('sales_code', 'like', '%' . now()->format('Ym') . '%')
            ->where('sales_type', $salesType)
            ->latest('sales_code')
            ->first();

        return $lastSalesCodeByType;
    }

    public function generateSalesCode(): string
    {
        $salesType = $this->sales_type;
        $latestSalesByType = self::findLastSalesByType($salesType);

        if ($latestSalesByType) {
            $prefix = self::prefixBySalesType($latestSalesByType->sales_type);
            $sequenceNumber = (int)substr($latestSalesByType->sales_code, -4) + 1;
        } else {
            $prefix = self::prefixBySalesType($salesType);
            $sequenceNumber = 1;
        }

        return $prefix . now()->format('Ym') . str_pad($sequenceNumber, 4, '0', STR_PAD_LEFT);
    }
}
