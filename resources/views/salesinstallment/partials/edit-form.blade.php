<form method="post" action="{{ route('salesinstallment.update', ['salesinstallment' => $salesInstallment->id]) }}" class="p-6 grid grid-cols-2">
@csrf
<div class="sm:px-6 lg:px-8 space-y-6 mb-4">
    <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
        <section>
            <h2 class="text-lg font-medium text-gray-900 mb-6">
                {{ __('Cashier Data') }}
            </h2>

            <div class="mb-4">
                <x-input-label for="receipt_date" :value="__('Receipt Date')" />
                <x-text-input readonly id="receipt_date" name="receipt_date" type="text" class="mt-1 block w-full"
                    :value="old('receipt_date', $salesInstallment->receipt_date)" autocomplete="" />
                <x-input-error :messages="$errors->get('receipt_date')" class="mt-2" />
            </div>

            <div class="mb-4">
                <x-input-label for="code" :value="__('Installment Code')" />
                <x-text-input readonly id="code" name="code" type="text"
                    class="mt-1 block w-full" :value="old('code', $salesInstallment->code)" autocomplete="code" />
                <x-input-error :messages="$errors->get('code')" class="mt-2" />
            </div>

            <div class="mb-4">
                <x-input-label for="sales_code" :value="__('Sales Code')" />
                <x-text-input readonly id="sales_code" name="sales_code" type="text"
                    class="mt-1 block w-full" :value="old('sales_code', $sales->sales_code)" autocomplete="sales_code" />
            </div>

            <div class="mb-4">
                <x-input-label for="customer_name" :value="__('Customer')" />
                <x-text-input readonly id="customer_name" name="customer_name" type="text"
                    class="mt-1 block w-full" :value="old('customer_name', $sales->customer_name)" autocomplete="customer_name" />
            </div>

        </section>
    </div>
</div>

<div class="sm:px-6 lg:px-8 space-y-6 mb-4">
    <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
        <section>

            <h2 class="text-lg font-medium text-gray-900 mb-6">
                {{ __('Motor Data') }}
            </h2>

            <div class="mb-4">
                <x-input-label for="motor_plate_number" :value="__('Plate Number')" />
                <x-text-input readonly id="motor_plate_number" name="motor_plate_number" type="text" class="mt-1 block w-full"
                    :value="old('motor_plate_number', $sales->motor_plate_number)" autocomplete="" />
                <x-input-error :messages="$errors->get('motor_plate_number')" class="mt-2" />
            </div>

            <div class="mb-4">
                <x-input-label for="motor_type" :value="__('Type')" />
                <x-text-input readonly id="motor_type" name="motor_type" class="mt-1 block w-full"
                    :value="old('motor_type', $sales->motor_type)" autocomplete="" />
                <x-input-error :messages="$errors->get('motor_type')" class="mt-2" />
            </div>

            <div class="mb-4">
                <x-input-label for="motor_color" :value="__('Color')" />
                <x-text-input readonly id="motor_color" name="motor_color" class="mt-1 block w-full"
                    :value="old('motor_color', $sales->motor_color)" autocomplete="" />
                <x-input-error :messages="$errors->get('motor_color')" class="mt-2" />
            </div>


        </section>
    </div>
</div>

<div class="w-full col-span-2 mx-auto sm:px-6 lg:px-8 space-y-6">
    <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg grid gap-4 grid-cols-2">
        <section>

            <h2 class="text-lg font-medium text-gray-900 mb-6">
                {{ __('Installment Data') }}
            </h2>

            <div class="mb-4">
                <x-input-label for="due_date" :value="__('Due Date')" />
                <x-text-input readonly id="due_date" name="due_date" type="text" class="mt-1 block w-full"
                    :value="old('due_date', $salesInstallment->due_date)" autocomplete="" />
                <x-input-error :messages="$errors->get('due_date')" class="mt-2" />
            </div>

            <div class="mb-4">
                <x-input-label for="installment_amount" :value="__('Installment Amount')" />
                <x-text-input readonly id="installment_amount" name="installment_amount" class="mt-1 block w-full"
                    :value="old('installment_amount', $sales->motor_installment_amount)" autocomplete="" />
                <x-input-error :messages="$errors->get('installment_amount')" class="mt-2" />
            </div>

            <div class="mb-4">
                <x-input-label for="late_payment_days" :value="__('Late Payment Days')" />
                <x-text-input readonly id="late_payment_days" name="late_payment_days" class="mt-1 block w-full"
                    :value="old('late_payment_days', $salesInstallment->late_payment_days)" autocomplete="" />
                <x-input-error :messages="$errors->get('late_payment_days')" class="mt-2" />
            </div>

            <div class="mb-4">
                <x-input-label for="fine" :value="__('Fine')" />
                <x-text-input readonly id="fine" name="fine" class="mt-1 block w-full"
                    :value="old('fine', $salesInstallment->fine)" autocomplete="" />
                <x-input-error :messages="$errors->get('fine')" class="mt-2" />
            </div>

            <div class="mb-4">
                <x-input-label for="penalty_debt" :value="__('Fine Penalty')" />
                <x-text-input readonly id="penalty_debt" name="penalty_debt" class="mt-1 block w-full"
                    :value="old('penalty_debt', $salesInstallment->penalty_debt)" autocomplete="" />
                <x-input-error :messages="$errors->get('penalty_debt')" class="mt-2" />
            </div>

            <div class="mb-4">
                <x-input-label for="pay_in" :value="__('Pay In')" class="mb-2" />

                <div class="flex">
                    <x-text-input id="Office" name="pay_in" type="radio" class="mt-1 me-1 block"
                        autocomplete="Office" value="Office" :checked="old('pay_in', $salesInstallment->pay_in) === 'Office'" />

                    <x-input-label for="Office" :value="__('Office')" />
                </div>

                <div class="flex">
                    <x-text-input id="Collector" name="pay_in" type="radio" class="mt-1 me-1 block"
                        autocomplete="Collector" value="Collector" :checked="old('pay_in', $salesInstallment->pay_in) === 'Collector'" />
                    <x-input-label for="Collector" :value="__('Collector')" />
                </div>

                <x-input-error :messages="$errors->get('pay_in')" class="mt-2" />
            </div>

            <div class="mb-4">
                <x-input-label for="account" :value="__('Store To')" class="mb-2" />

                <div class="flex">
                    <x-text-input id="Cash" name="account" type="radio" class="mt-1 me-1 block"
                        autocomplete="Cash" value="Cash" :checked="old('account', $salesInstallment->account) === 'Cash'" />
                    <x-input-label for="Cash" :value="__('Cash')" />
                </div>


                <div class="flex">
                    <x-text-input id="BCA" name="account" type="radio" class="mt-1 me-1 block"
                        autocomplete="BCA" value="BCA" :checked="old('account', $salesInstallment->account) === 'BCA'" />

                    <x-input-label for="BCA" :value="__('BCA')" />
                </div>

                <div class="flex">
                    <x-text-input id="BRI" name="account" type="radio" class="mt-1 me-1 block"
                        autocomplete="BRI" value="BRI" :checked="old('account', $salesInstallment->account) === 'BRI'" />
                    <x-input-label for="BRI" :value="__('BRI')" />
                </div>

                <x-input-error :messages="$errors->get('account')" class="mt-2" />
            </div>
        </section>

        <section class="p-1">
            <div class="mt-12 mb-4 flex">
                <div class="w-1/2 me-2">
                    <x-input-label for="period_no" :value="__('Period No')" />
                    <x-text-input readonly id="period_no" name="period_no" type="text" class="mt-1 block w-full"
                        :value="old('period_no', $salesInstallment->period_no)" autocomplete="" />
                    <x-input-error :messages="$errors->get('period_no')" class="mt-2" />
                </div>

                <div class="w-1/2">
                    <x-input-label for="period_left" :value="__('Period Left')" />
                    <x-text-input readonly id="period_left" name="period_left" type="text" class="mt-1 block w-full"
                        :value="old('period_left', $salesInstallment->period_left)" autocomplete="" />
                    <x-input-error :messages="$errors->get('period_left')" class="mt-2" />
                </div>
            </div>

            <div class="mb-4">
                <x-input-label for="discount_amount" :value="__('Discount')" />
                <x-text-input id="discount_amount" name="discount_amount" type="text" class="mt-1 block w-full"
                    :value="old('discount_amount', $salesInstallment->discount_amount)" autocomplete="" />
                <x-input-error :messages="$errors->get('discount_amount')" class="mt-2" />
            </div>

            <div class="mb-4">
                <x-input-label for="paid_fine" :value="__('Paid Fine')" />
                <x-text-input id="paid_fine" name="paid_fine" type="text" class="mt-1 block w-full"
                    :value="old('paid_fine', $salesInstallment->paid_fine)" autocomplete="" />
                <x-input-error :messages="$errors->get('paid_fine')" class="mt-2" />
            </div>

            {{-- <div class="mb-4">
                <x-input-label for="total_payment" :value="__('Total Payment')" />
                <x-text-input readonly id="total_payment" name="total_payment" type="text" class="mt-1 block w-full"
                    :value="old('total_payment')" autocomplete="" />
                <x-input-error :messages="$errors->get('total_payment')" class="mt-2" />
            </div> --}}

            <div class="mb-4">
            <x-input-label for="note" :value="__('Note')" />
            <x-text-input id="note" name="note" type="textarea" class="mt-1 block w-full"
                :value="old('note', $salesInstallment->note)" autocomplete=""> 
                {{  old('note', $salesInstallment->note)}}
            </x-text-input>
                <x-input-error :messages="$errors->get('note')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button type="redirect" href="{{ route('sales.showCreditSales', ['sales' => $sales->id]) }}">
                    {{ __('Back') }}
                </x-secondary-button>

                <x-primary-button class="ml-3">
                    {{ __('Save') }}
                </x-primary-button>
            </div>
        </section>
    </div>
</div>

</form>
