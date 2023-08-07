<form method="post" action="{{ route('sales.storeAdminDataSales') }}" class="p-6" enctype="multipart/form-data">
    @csrf

    {{-- Customer Data --}}
    <div class="mx-auto sm:px-6 lg:px-8 space-y-6 mb-4">
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <section>
                <h2 class="text-lg font-medium text-gray-900 mb-6">
                    {{ __('Customer Data') }}
                </h2>

                {{-- Name --}}
                <div class="mb-4">
                    <x-input-label for="customer_name" :value="__('Name')" />
                    <x-text-input id="customer_name" name="customer_name" type="text" class="mt-1 block w-full"
                        :value="old('customer_name', $sales->customer_name)" />
                    <x-input-error :messages="$errors->get('customer_name')" class="mt-2" />
                </div>

                {{-- Nickname --}}
                <div class="mb-4">
                    <x-input-label for="customer_nickname" :value="__('Nickname')" />
                    <x-text-input id="customer_nickname" name="customer_nickname" type="text"
                        class="mt-1 block w-full" :value="old('customer_nickname', $sales->customer_nickname)" />
                    <x-input-error :messages="$errors->get('customer_nickname')" class="mt-2" />
                </div>

                {{-- Age --}}
                <div class="mb-4">
                    <x-input-label for="customer_age" :value="__('Age')" />
                    <x-text-input id="customer_age" name="customer_age" type="number" class="mt-1 block w-full"
                        :value="old('customer_age')" />
                    <x-input-error :messages="$errors->get('customer_age', $sales->age)" class="mt-2" />
                </div>

                {{-- Gender --}}
                <div class="mb-4">
                    <x-input-label for="customer_gender" :value="__('Gender')" class="mb-2" />

                    <div class="flex">
                        <x-text-input id="Male" name="customer_gender" type="radio" class="mt-1 me-1 block"
                            autocomplete="Male" value="Male" :checked="old('customer_gender', $sales->customer_gender) === 'Male'" />

                        <x-input-label for="Male" :value="__('Male')" />
                    </div>

                    <div class="flex">
                        <x-text-input id="Single" name="customer_gender" type="radio" class="mt-1 me-1 block"
                            autocomplete="Female" value="Female" :checked="old('customer_gender', $sales->customer_gender) === 'Female'" />
                        <x-input-label for="Female" :value="__('Female')" />
                    </div>

                    <x-input-error :messages="$errors->get('customer_gender')" class="mt-2" />
                </div>

                {{-- Phone --}}
                <div class="mb-4">
                    <x-input-label for="customer_phone_no" :value="__('Phone No')" />
                    <x-text-input id="customer_phone_no" name="customer_phone_no" type="text"
                        class="mt-1 block w-full" :value="old('customer_phone_no', $sales->customer_phone_no)" />
                    <x-input-error :messages="$errors->get('customer_phone_no')" class="mt-2" />
                </div>

                {{-- Customer Address --}}
                <div class="mb-4">
                    <x-input-label for="customer_full_address" :value="__('Full Address')" />
                    <x-text-input id="customer_full_address" name="customer_full_address" type="textarea"
                        class="mt-1 block w-full" :value="old('customer_full_address', $sales->customer_full_address)" autocomplete="customer_full_address" />
                    <x-input-error :messages="$errors->get('customer_full_address')" class="mt-2" />
                </div>

                {{-- Status --}}
                <div class="mb-4">
                    <x-input-label for="customer_status" :value="__('Status')" class="mb-2" />

                    <div class="flex">
                        <x-text-input id="Married" name="customer_status" type="radio" class="mt-1 me-1 block"
                            autocomplete="Married" value="Married" :checked="old('customer_status', $sales->customer_status) === 'Married'" />

                        <x-input-label for="Married" :value="__('Married')" />
                    </div>

                    <div class="flex">
                        <x-text-input id="Single" name="customer_status" type="radio" class="mt-1 me-1 block"
                            autocomplete="Single" value="Single" :checked="old('customer_status', $sales->customer_status) === 'Single'" />
                        <x-input-label for="Single" :value="__('Single')" />
                    </div>

                    <x-input-error :messages="$errors->get('customer_status')" class="mt-2" />
                </div>

                {{-- Dependents --}}
                <div class="mb-4">
                    <x-input-label for="customer_dependents" :value="__('Dependents (Family Members)')" />
                    <x-text-input id="customer_dependents" name="customer_dependents" type="number"
                        class="mt-1 block w-full" :value="old('customer_dependents', $sales->customer_dependents)" />
                    <x-input-error :messages="$errors->get('customer_dependents')" class="mt-2" />
                </div>

                {{-- Workplace --}}
                <div class="mb-4">
                    <x-input-label for="customer_workplace_name" :value="__('Workplace')" />
                    <x-text-input id="customer_workplace_name" name="customer_workplace_name" type="text"
                        class="mt-1 block w-full" :value="old('customer_workplace_name', $sales->customer_workplace_name)" />
                    <x-input-error :messages="$errors->get('customer_workplace_name')" class="mt-2" />
                </div>

                {{-- Workplace Address --}}
                <div class="mb-4">
                    <x-input-label for="customer_workplace_address" :value="__('Workplace Address')" />
                    <x-text-input id="customer_workplace_address" name="customer_workplace_address" type="text"
                        class="mt-1 block w-full" :value="old('customer_workplace_address', $sales->customer_workplace_address)" />
                    <x-input-error :messages="$errors->get('customer_workplace_address')" class="mt-2" />
                </div>

                {{-- Workplace Position --}}
                <div class="mb-4">
                    <x-input-label for="customer_workplace_position" :value="__('Workplace Position')" />
                    <x-text-input id="customer_workplace_position" name="customer_workplace_position" type="text"
                        class="mt-1 block w-full" :value="old('customer_workplace_position')" />
                    <x-input-error :messages="$errors->get('customer_workplace_position', $sales->customer_workplace_position)" class="mt-2" />
                </div>
            </section>
        </div>
    </div>

    {{-- Income Data --}}
    <div class="mx-auto sm:px-6 lg:px-8 space-y-6 mb-4">
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <section>

                <h2 class="text-lg font-medium text-gray-900 mb-6">
                    {{ __('Income Data') }}
                </h2>

                <div class="mb-4">
                    <x-input-label for="customer_fix_income" :value="__('Type')" />
                    <x-text-input id="customer_fix_income" name="customer_fix_income" type="number"
                        class="mt-1 block w-full" :value="old('customer_fix_income', $sales->customer_fix_income)" />
                    <x-input-error :messages="$errors->get('customer_fix_income')" class="mt-2" />
                </div>

                <div class="mb-4">
                    <x-input-label for="customer_fix_income" :value="__('Fix Income')" />
                    <x-text-input id="customer_fix_income" name="customer_fix_income" type="number"
                        class="mt-1 block w-full" :value="old('customer_fix_income', $sales->customer_fix_income)" />
                    <x-input-error :messages="$errors->get('customer_fix_income')" class="mt-2" />
                </div>

                <div class="mb-4">
                    <x-input-label for="customer_additional_income" :value="__('Additional Income')" />
                    <x-text-input id="customer_additional_income" name="customer_additional_income" type="number"
                        class="mt-1 block w-full" :value="old('customer_additional_income', $sales->customer_additional_income)" />
                    <x-input-error :messages="$errors->get('customer_additional_income')" class="mt-2" />
                </div>

                <div class="mb-4">
                    <x-input-label for="customer_fix_expense" :value="__('Fix Expense')" />
                    <x-text-input id="customer_fix_expense" name="customer_fix_expense" type="number"
                        class="mt-1 block w-full" :value="old('customer_fix_expense', $sales->customer_fix_expense)" />
                    <x-input-error :messages="$errors->get('customer_fix_expense')" class="mt-2" />
                </div>

                <div class="mb-4">
                    <x-input-label for="customer_additional_expense" :value="__('Additional Expense')" />
                    <x-text-input id="customer_additional_expense" name="customer_additional_expense" type="number"
                        class="mt-1 block w-full" :value="old('customer_additional_expense', $sales->customer_additional_expense)" />
                    <x-input-error :messages="$errors->get('customer_additional_expense')" class="mt-2" />
                </div>
            </section>
        </div>
    </div>

    {{-- Guarantor Data --}}
    <div class="mx-auto sm:px-6 lg:px-8 space-y-6 mb-4">
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <section>

                <h2 class="text-lg font-medium text-gray-900 mb-6">
                    {{ __('Guarantor Data') }}
                </h2>

                <div class="mb-4">
                    <x-input-label for="guarantor_name" :value="__('Name')" />
                    <x-text-input id="guarantor_name" name="guarantor_name" type="text" class="mt-1 block w-full"
                        :value="old('guarantor_name', $sales->guarantor_name)" />
                    <x-input-error :messages="$errors->get('guarantor_name')" class="mt-2" />
                </div>

                <div class="mb-4">
                    <x-input-label for="guarantor_relationship" :value="__('Relationship')" />
                    <x-text-input id="guarantor_relationship" name="guarantor_relationship" type="text"
                        class="mt-1 block w-full" :value="old('guarantor_relationship', $sales->guarantor_relationship)" />
                    <x-input-error :messages="$errors->get('guarantor_relationship')" class="mt-2" />
                </div>

                <div class="mb-4">
                    <x-input-label for="guarantor_phone_no" :value="__('Phone No')" />
                    <x-text-input id="guarantor_phone_no" name="guarantor_phone_no" type="text"
                        class="mt-1 block w-full" :value="old('guarantor_phone_no', $sales->guarantor_phone_no)" />
                    <x-input-error :messages="$errors->get('guarantor_phone_no')" class="mt-2" />
                </div>

                <div class="mb-4">
                    <x-input-label for="guarantor_full_address" :value="__('Address')" />
                    <x-text-input id="guarantor_full_address" name="guarantor_full_address" type="textarea"
                        class="mt-1 block w-full" :value="old('guarantor_full_address', $sales->guarantor_full_address)" />
                    <x-input-error :messages="$errors->get('guarantor_full_address')" class="mt-2" />
                </div>

                <div class="mb-4">
                    <x-input-label for="guarantor_occupation" :value="__('Occupation')" />
                    <x-text-input id="guarantor_occupation" name="guarantor_occupation" type="text"
                        class="mt-1 block w-full" :value="old('guarantor_occupation', $sales->guarantor_occupation)" />
                    <x-input-error :messages="$errors->get('guarantor_occupation')" class="mt-2" />
                </div>

                <div class="mb-4">
                    <x-input-label for="guarantor_workplace_address" :value="__('Workplace Address')" />
                    <x-text-input id="guarantor_workplace_address" name="guarantor_workplace_address" type="text"
                        class="mt-1 block w-full" :value="old('guarantor_workplace_address', $sales->guarantor_workplace_address)" />
                    <x-input-error :messages="$errors->get('guarantor_workplace_address')" class="mt-2" />
                </div>

                <div class="mb-4">
                    <x-input-label for="motor_front_photo" :value="__('Motor Front Photo')" />
                    <x-text-input id="motor_front_photo" name="motor_front_photo" type="file"
                        class="mt-1 block w-full" />
                    <x-input-error :messages="$errors->get('motor_front_photo')" class="mt-2" />
                </div>

                <div class="mb-4">
                    <x-input-label for="motor_back_photo" :value="__('Motor Back Photo')" />
                    <x-text-input id="motor_back_photo" name="motor_back_photo" type="file"
                        class="mt-1 block w-full" />
                    <x-input-error :messages="$errors->get('motor_back_photo')" class="mt-2" />
                </div>

                <div class="mb-4">
                    <x-input-label for="motor_left_photo" :value="__('Motor Left Photo')" />
                    <x-text-input id="motor_left_photo" name="motor_left_photo" type="file"
                        class="mt-1 block w-full" />
                    <x-input-error :messages="$errors->get('motor_left_photo')" class="mt-2" />
                </div>

                <div class="mb-4">
                    <x-input-label for="motor_right_photo" :value="__('Motor Right Photo')" />
                    <x-text-input id="motor_right_photo" name="motor_right_photo" type="file"
                        class="mt-1 block w-full" />
                    <x-input-error :messages="$errors->get('motor_right_photo')" class="mt-2" />
                </div>

                <div class="mb-4">
                    <x-input-label for="house_photo" :value="__('House Photo')" />
                    <x-text-input id="house_photo" name="house_photo" type="file" class="mt-1 block w-full" />
                    <x-input-error :messages="$errors->get('house_photo')" class="mt-2" />
                </div>

                <div class="mb-4">
                    <x-input-label for="customer_photo" :value="__('Customer Photo')" />
                    <x-text-input id="customer_photo" name="customer_photo" type="file"
                        class="mt-1 block w-full" />
                    <x-input-error :messages="$errors->get('customer_photo')" class="mt-2" />
                </div>
            </section>
        </div>

        <div class="mt-6 flex justify-end">
            <x-secondary-button type="redirect" href="/customers">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-primary-button class="ml-3">
                {{ __('Save') }}
            </x-primary-button>
        </div>
    </div>
</form>
