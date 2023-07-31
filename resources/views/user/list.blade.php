<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User') }}
        </h2>
        @if (session('status') === 'user-created' || session('status') === 'user-deleted')
            <x-alert type="success">Data Updated Successfully</x-alert>
        @endif
    </x-slot>

    {{-- @include('partials.list-table') --}}
    <!-- List View -->
    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-8">
                <h3 class="mb-4 text-lg font-bold">Users List</h3>

                <!-- List Navbar -->
                <div class="mb-4 flex items-baseline justify-evenly">
                    <x-search-bar></x-search-bar>
                    <x-primary-button type="redirect" class="ml-auto" href="/users/create">Create</x-primary-button>

                </div>

                <!-- Table -->
                <x-table :headers="$headers" :datas="$users"></x-table>

                {{-- Pagination --}}
                {{ $users->links() }}

            </div>
        </div>

    </div>

    {{-- delete modal --}}
    {{-- <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('users.destroy', ['user', $user]) }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Are you sure you want to delete your account?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
            </p>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button class="ml-3">
                    {{ __('Delete Account') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal> --}}

</x-app-layout>
