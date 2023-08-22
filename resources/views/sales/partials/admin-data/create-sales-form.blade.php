<form method="post" action="{{ route('sales.storeAdminDataSales') }}" class="p-6 flex">
    @csrf
    <div class="w-1/2 mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <section>
                <h2 class="text-lg font-medium text-gray-900 mb-6">
                    {{ __('Customer Data') }}
                </h2>

                <div class="mb-4">
                    <x-input-label for="customer_name" :value="__('Name')" />
                    <x-text-input id="customer_name" name="customer_name" type="text" class="mt-1 block w-full"
                        :value="old('customer_name')" autocomplete="" />
                    <x-input-error :messages="$errors->get('customer_name')" class="mt-2" />
                </div>

                <div class="mb-4">
                    <x-input-label for="customer_family_card_no" :value="__('Family Card No')" />
                    <x-text-input id="customer_family_card_no" name="customer_family_card_no" type="text"
                        class="mt-1 block w-full" :value="old('customer_family_card_no')" autocomplete="customer_family_card_no" />
                    <x-input-error :messages="$errors->get('customer_family_card_no')" class="mt-2" />
                </div>

                <div class="mb-4">
                    <x-input-label for="customer_identity_card_no" :value="__('Identity Card No')" />
                    <x-text-input id="customer_identity_card_no" name="customer_identity_card_no" type="text"
                        class="mt-1 block w-full" :value="old('customer_identity_card_no')" autocomplete="customer_identity_card_no" />
                    <x-input-error :messages="$errors->get('customer_identity_card_no')" class="mt-2" />
                </div>

                <div class="mb-4">
                    <x-input-label for="customer_full_address" :value="__('Full Address')" />
                    <x-text-input id="customer_full_address" name="customer_full_address" type="textarea"
                        class="mt-1 block w-full" :value="old('customer_full_address')" autocomplete="customer_full_address" />
                    <x-input-error :messages="$errors->get('customer_full_address')" class="mt-2" />
                </div>

                <div class="mb-4">
                    <x-input-label for="sales_type" :value="__('Installment Type')" class="mb-2" />

                    <div class="flex">
                        <x-text-input id="motor_installment" name="sales_type" type="radio" class="mt-1 me-1 block"
                            autocomplete="motor_installment" value="Motor Installment" :checked="old('sales_type', $defaultInstallmentType) === 'Motor Installment'" />

                        <x-input-label for="motor_installment" :value="__('Motor Installment')" />
                    </div>

                    <div class="flex">
                        <x-text-input id="reinstallment" name="sales_type" type="radio" class="mt-1 me-1 block"
                            autocomplete="reinstallment" value="Reinstallment" :checked="old('sales_type', $defaultInstallmentType) === 'Reinstallment'" />
                        <x-input-label for="reinstallment" :value="__('Reinstallment')" />
                    </div>

                    <x-input-error :messages="$errors->get('sales_type')" class="mt-2" />
                </div>
            </section>
        </div>
    </div>

    <div class="w-1/2 mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <section>

                <h2 class="text-lg font-medium text-gray-900 mb-6">
                    {{ __('Motor Data') }}
                </h2>

                <div class="mb-4">
                    <x-input-label for="motor_type" :value="__('Type')" />
                    <x-text-input id="motor_type" name="motor_type" type="text" class="mt-1 block w-full"
                        :value="old('motor_type')" autocomplete="" />
                    <x-input-error :messages="$errors->get('motor_type')" class="mt-2" />
                </div>

                <div class="mb-4">
                    <x-input-label for="motor_plate_number" :value="__('Plate Number')" />
                    <x-text-input id="motor_plate_number" name="motor_plate_number" type="text"
                        class="mt-1 block w-full" :value="old('motor_plate_number')" autocomplete="" />
                    <x-input-error :messages="$errors->get('motor_plate_number')" class="mt-2" />
                </div>

                <div class="mb-4">
                    <x-input-label for="motor_price" :value="__('Price')" />
                    <x-text-input id="motor_price" name="motor_price" type="number" class="mt-1 block w-full"
                        :value="old('motor_price')" autocomplete="" />
                    <x-input-error :messages="$errors->get('motor_price')" class="mt-2" />
                </div>

                <div class="mb-4">
                    <x-input-label for="motor_dp" :value="__('DP')" />
                    <x-text-input id="motor_dp" name="motor_dp" type="number" class="mt-1 block w-full"
                        :value="old('motor_dp')" autocomplete="" />
                    <x-input-error :messages="$errors->get('motor_dp')" class="mt-2" />
                </div>

                <div class="mb-4">
                    <x-input-label for="motor_administration_fee" :value="__('Administration_fee')" />
                    <p class="text-red-800">Rp 150,000</p>
                    <x-input-error :messages="$errors->get('motor_administration_fee')" class="mt-2" />
                </div>

                <div class="mb-4">
                    <x-input-label for="dealer_id" :value="__('Dealer')" />
                    <x-select name="dealer_id" :options="$dealers" :selected="old('dealer_id', $dealers[0]->id)" />
                    <x-input-error :messages="$errors->get('dealer_id')" class="mt-2" />
                </div>
            </section>
        </div>
        <div class="mt-6 flex justify-end">
            <x-secondary-button type="redirect" href="/customers">
                {{ __('Back') }}
            </x-secondary-button>

            <x-primary-button class="ml-3">
                {{ __('Save') }}
            </x-primary-button>
        </div>
    </div>

</form>
