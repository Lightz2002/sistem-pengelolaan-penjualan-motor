<form method="post" action="{{ route('cashsales.store') }}" class="p-6 flex">
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
            <x-input-label for="customer_phone_no" :value="__('Phone No')" />
            <x-text-input id="customer_phone_no" name="customer_phone_no" type="text"
                class="mt-1 block w-full" :value="old('customer_phone_no')" />
            <x-input-error :messages="$errors->get('customer_phone_no')" class="mt-2" />
            </div>

            <div class="mb-4">
                <x-input-label for="customer_full_address" :value="__('Full Address')" />
                <x-text-input id="customer_full_address" name="customer_full_address" type="textarea"
                    class="mt-1 block w-full" :value="old('customer_full_address')" autocomplete="customer_full_address">
                    {{ old('customer_full_address') }}
                </x-text-input>
                <x-input-error :messages="$errors->get('customer_full_address')" class="mt-2" />
            </div>

            <div class="mb-4">
            <x-input-label for="sales_date" :value="__('Sales Date')" />
            <x-text-input id="sales_date" name="sales_date" type="date"
                class="mt-1 block w-full" :value="old('sales_date', now()->format('Y-m-d'))" />
            <x-input-error :messages="$errors->get('sales_date')" class="mt-2" />
            </div>

            <div class="mb-4">
            <x-input-label for="sales_code" :value="__('Sales Code')" />
            <x-text-input id="sales_code" name="sales_code" type="text"
                class="mt-1 block w-full" :value="old('sales_code', $defaultSalesCode)" />
            <x-input-error :messages="$errors->get('sales_code')" class="mt-2" />
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
            <x-input-label for="motor_plate_number" :value="__('Plate Number')" />
            <x-text-input id="motor_plate_number" name="motor_plate_number" type="text"
                class="mt-1 block w-full" :value="old('motor_plate_number')" autocomplete="" />
            <x-input-error :messages="$errors->get('motor_plate_number')" class="mt-2" />
            </div>

            <div class="mb-4">
                <x-input-label for="motor_type" :value="__('Type')" />
                <x-text-input id="motor_type" name="motor_type" type="text" class="mt-1 block w-full"
                    :value="old('motor_type')" autocomplete="" />
                <x-input-error :messages="$errors->get('motor_type')" class="mt-2" />
            </div>

            <div class="mb-4">
            <x-input-label for="motor_frame_number" :value="__('Frame Number')" />
            <x-text-input id="motor_frame_number" name="motor_frame_number" type="text" class="mt-1 block w-full"
                :value="old('motor_frame_number')" autocomplete="" />
            <x-input-error :messages="$errors->get('motor_frame_number')" class="mt-2" />
            </div>

            <div class="mb-4">
            <x-input-label for="motor_engine_number" :value="__('Engine Number')" />
            <x-text-input id="motor_engine_number" name="motor_engine_number" type="text" class="mt-1 block w-full"
                :value="old('motor_engine_number')" autocomplete="" />
            <x-input-error :messages="$errors->get('motor_engine_number')" class="mt-2" />
            </div>

            <div class="mb-4">
            <x-input-label for="motor_assemble_year" :value="__('Assemble Year')" />
            <x-text-input id="motor_assemble_year" name="motor_assemble_year" type="text" class="mt-1 block w-full"
                :value="old('motor_assemble_year')" autocomplete="" />
            <x-input-error :messages="$errors->get('motor_assemble_year')" class="mt-2" />
            </div>

            <div class="mb-4">
            <x-input-label for="motor_color" :value="__('Color')" />
            <x-text-input id="motor_color" name="motor_color" type="text" class="mt-1 block w-full"
                :value="old('motor_color')" autocomplete="" />
            <x-input-error :messages="$errors->get('motor_color')" class="mt-2" />
            </div>

            <div class="mb-4">
                <x-input-label for="motor_price" :value="__('Price')" />
                <x-text-input id="motor_price" name="motor_price" type="number" class="mt-1 block w-full"
                    :value="old('motor_price')" autocomplete="" />
                <x-input-error :messages="$errors->get('motor_price')" class="mt-2" />
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
