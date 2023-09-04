<form method="post" action="{{ route('sales.updateCreditSales', ['sales' => $sales->id]) }}" class="p-6 grid grid-cols-2"
enctype="multipart/form-data">
@csrf
@method('put')
{{-- Customer Data --}}
<div class="sm:px-6 lg:px-8 space-y-6 mb-4">
    <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
        <section>
            <h2 class="text-lg font-medium text-gray-900 mb-6">
                {{ __('Customer Data') }}
            </h2>

            {{-- Name --}}
            <div class="mb-4">
                <x-input-label for="customer_name" :value="__('Name')" />
                <x-text-input disabled id="customer_name" name="customer_name" type="text" class="mt-1 block w-full bg-gray-200 text-gray-500"
                    :value="old('customer_name', $sales->customer_name)" />
                <x-input-error :messages="$errors->get('customer_name')" class="mt-2" />
            </div>

        {{-- Identity Card --}}
        <div class="mb-4">
            <x-input-label for="customer_identity_card_no" :value="__('Identity Card No')" />
            <x-text-input disabled id="customer_identity_card_no" name="customer_identity_card_no" type="text"
                class="mt-1 block w-full bg-gray-200 text-gray-500" :value="old('customer_identity_card_no', $sales->customer_identity_card_no)" />
            <x-input-error :messages="$errors->get('customer_identity_card_no')" class="mt-2" />
        </div>

        {{-- Phone --}}
        <div class="mb-4">
            <x-input-label for="customer_phone_no" :value="__('Phone No')" />
            <x-text-input disabled id="customer_phone_no" name="customer_phone_no" type="text"
                class="mt-1 block w-full bg-gray-200 text-gray-500" :value="old('customer_phone_no', $sales->customer_phone_no)" />
            <x-input-error :messages="$errors->get('customer_phone_no')" class="mt-2" />
        </div>

        {{-- Sales Date --}}
        <div class="mb-4">
            <x-input-label for="sales_date" :value="__('Sales Date')" />
            <x-text-input disabled id="sales_date" name="sales_date" type="date"
                class="mt-1 block w-full bg-gray-200 text-gray-500" :value="old('sales_date', $sales->sales_date)" />
            <x-input-error :messages="$errors->get('sales_date')" class="mt-2" />
        </div>

        {{-- Sales Code --}}
        <div class="mb-4">
            <x-input-label for="sales_code" :value="__('Sales Code')" />
            <x-text-input disabled id="sales_code" name="sales_code" type="text"
                class="mt-1 block w-full bg-gray-200 text-gray-500" :value="old('sales_code', $sales->sales_code)" />
            <x-input-error :messages="$errors->get('sales_code')" class="mt-2" />
        </div>
        </section>
    </div>
</div>

{{-- Survey Data --}}
<div class="sm:px-6 lg:px-8 space-y-6 mb-4">
    <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
        <section>

        <h2 class="text-lg font-medium text-gray-900 mb-6">
            {{ __('Survey Data') }}
        </h2>

        <div class="mb-4">
            <x-input-label for="sales_collector" :value="__('Collector')" />
            <x-text-input disabled id="sales_collector" name="sales_collector" type="text"
                class="mt-1 block w-full bg-gray-200 text-gray-500" :value="old('sales_collector', $sales->sales_collector)" />
            <x-input-error :messages="$errors->get('sales_collector')" class="mt-2" />
        </div>

        <div class="mb-4">
            <x-input-label for="surveyor" :value="__('Surveyor')" />
            <x-text-input disabled id="surveyor" name="surveyor" type="text"
                class="mt-1 block w-full bg-gray-200 text-gray-500" :value="old('surveyor', $sales->surveyor->username)" />
            <x-input-error :messages="$errors->get('surveyor')" class="mt-2" />
        </div>

        <div class="mb-4">
            <x-input-label for="sales_person" :value="__('Sales')" />
            <x-text-input disabled id="sales_person" name="sales_person" type="text"
                class="mt-1 block w-full bg-gray-200 text-gray-500" :value="old('sales_person', $sales->sales_person)" />
            <x-input-error :messages="$errors->get('sales_person')" class="mt-2" />
        </div>
        </section>
    </div>
</div>

{{-- Motor Data --}}
<div class="sm:px-6 lg:px-8 space-y-6 mb-4">
    <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
        <section>

            <h2 class="text-lg font-medium text-gray-900 mb-6">
                {{ __('Motor Data') }}
            </h2>

            {{-- Plate Number --}}
            <div class="mb-4">
                <x-input-label for="motor_plate_number" :value="__('Plate Number')" />
                <x-text-input disabled id="motor_plate_number" name="motor_plate_number" type="text"
                    class="mt-1 block w-full bg-gray-200 text-gray-500" :value="old('motor_plate_number', $sales->motor_plate_number)" />
                <x-input-error :messages="$errors->get('motor_plate_number')" class="mt-2" />
            </div>

            {{-- Motor Type --}}
            <div class="mb-4">
                <x-input-label for="motor_type" :value="__('Motor Type')" />
                <x-text-input disabled id="motor_type" name="motor_type" type="text"
                    class="mt-1 block w-full bg-gray-200 text-gray-500" :value="old('motor_type', $sales->motor_type)" />
                <x-input-error :messages="$errors->get('motor_type')" class="mt-2" />
            </div>

            {{-- Frame Number --}}
            <div class="mb-4">
                <x-input-label for="motor_frame_number" :value="__('Frame Number')" />
                <x-text-input disabled id="motor_frame_number" name="motor_frame_number" type="text"
                    class="mt-1 block w-full bg-gray-200 text-gray-500" :value="old('motor_frame_number', $sales->motor_frame_number)" />
                <x-input-error :messages="$errors->get('motor_frame_number')" class="mt-2" />
            </div>

            {{-- Engine Number --}}
            <div class="mb-4">
                <x-input-label for="motor_engine_number" :value="__('Engine Number')" />
                <x-text-input disabled id="motor_engine_number" name="motor_engine_number" type="text"
                    class="mt-1 block w-full bg-gray-200 text-gray-500" :value="old('motor_engine_number', $sales->motor_engine_number)" />
                <x-input-error :messages="$errors->get('motor_engine_number')" class="mt-2" />
            </div>

            {{-- Assemble Year --}}
            <div class="mb-4">
                <x-input-label for="motor_assemble_year" :value="__('Assemble Year')" />
                <x-text-input disabled id="motor_assemble_year" name="motor_assemble_year" type="text"
                    class="mt-1 block w-full bg-gray-200 text-gray-500" :value="old('motor_assemble_year', $sales->motor_assemble_year)" />
                <x-input-error :messages="$errors->get('motor_assemble_year')" class="mt-2" />
            </div>

            {{-- Color --}}
            <div class="mb-4">
                <x-input-label for="motor_color" :value="__('Color')" />
                <x-text-input disabled id="motor_color" name="motor_color" type="text"
                    class="mt-1 block w-full bg-gray-200 text-gray-500" :value="old('motor_color', $sales->motor_color)" />
                <x-input-error :messages="$errors->get('motor_color')" class="mt-2" />
            </div>
        </section>
    </div>
</div>

{{-- Credit Details --}}
<div class="sm:px-6 lg:px-8 space-y-6 mb-4">
    <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
        <section>

        <h2 class="text-lg font-medium text-gray-900 mb-6">
            {{ __('Credit Details') }}
        </h2>

        {{-- Motor Price --}}
        <div class="mb-4">
            <x-input-label for="motor_price" :value="__('Price')" />
            <x-text-input disabled id="motor_price" name="motor_price" type="number" class="mt-1 block w-full bg-gray-200 text-gray-500"
                :value="old('motor_price', $sales->motor_price)" autocomplete="" />
            <x-input-error :messages="$errors->get('motor_price')" class="mt-2" />
        </div>

        <div class="mb-4">
            <x-input-label for="motor_dp" :value="__('DP')" />
            <x-text-input disabled id="motor_dp" name="motor_dp" type="number" class="mt-1 block w-full bg-gray-200 text-gray-500"
                :value="old('motor_dp', $sales->motor_dp)" autocomplete="" />
            <x-input-error :messages="$errors->get('motor_dp')" class="mt-2" />
        </div>

        <div class="mb-4">
            <x-input-label for="motor_administration_fee" :value="__('Administration Fee')" />
            <p class="text-red-800">Rp 150,000</p>
            <x-input-error :messages="$errors->get('motor_administration_fee')" class="mt-2" />
        </div>

        <div class="mb-4">
            <x-input-label for="motor_installment_amount" :value="__('Installment Amount')" />
            <x-text-input disabled id="motor_installment_amount" name="motor_installment_amount" type="number" class="mt-1 block w-full bg-gray-200 text-gray-500"
                :value="old('motor_installment_amount', $sales->motor_installment_amount)" autocomplete="" />
            <x-input-error :messages="$errors->get('motor_installment_amount')" class="mt-2" />
        </div>

        <div class="mb-4">
            <x-input-label for="motor_installment_period" :value="__('Installment Period')" />
            <x-text-input disabled id="motor_installment_period" name="motor_installment_period" type="text"
                class="mt-1 block w-full bg-gray-200 text-gray-500" :value="old('motor_installment_period', $sales->motor_installment_period)" />
            <x-input-error :messages="$errors->get('motor_installment_period')" class="mt-2" />
        </div>

        <div class="mb-4">
            <x-input-label for="dealer_id" :value="__('Dealer')" />
            <x-select disabled class="bg-gray-200 text-gray-500" name="dealer_id" :options="$dealers" :selected="old('dealer_id', $dealers[0]->id)" />
            <x-input-error :messages="$errors->get('dealer_id')" class="mt-2" />
        </div>

        <div class="mb-4">
            <x-input-label for="note" :value="__('Note')" />
            <x-text-input readonly id="note" name="note" type="textarea"
                class="mt-1 block w-full" :value="old('note', $sales->note)" autocomplete="note">
                {{ old('note', $sales->note) }}
            </x-text-input>
            <x-input-error :messages="$errors->get('note')" class="mt-2" />
        </div>
        </section>
    </div>
    
</div>

{{-- Installment History--}}
<div class="col-span-2 mt-4 sm:px-6 lg:px-8">
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-8">
        <h1 class="mb-6 text-2xl font-bold">Installment History</h1>

        <livewire:sales-installment-table :sales="$sales" createUrl="{{ auth()->user()->hasRole('cashier') ?route('salesinstallment.create', ['sales' => $sales->id]) : '' }}" />
    </div>
</div>

</form>


<script>
document.addEventListener('trix-file-accept', function(e) {
    e.preventDefault();
})

function previewImage(imageId, imgPreviewId) {
    console.log(1);
    const image = document.querySelector(`#${imageId}`);
    const imgPreview = document.querySelector(`#${imgPreviewId}`);

    imgPreview.style.display = 'block';

    if (image.files && image.files[0]) {
        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    } else {
        // Handle the case where no file is selected
        imgPreview.src = ''; // Clear the image source
    }
}
</script>