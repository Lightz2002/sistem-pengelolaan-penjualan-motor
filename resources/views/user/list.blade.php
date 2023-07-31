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
                <div id="output">
                    <x-table :headers="$headers" :datas="$users"></x-table>
                </div>

                {{-- Pagination --}}
                {{ $users->links() }}

            </div>
        </div>

    </div>
</x-app-layout>

<script>
    const data = @json($users);
    const headers = @json($headers);
    const route = '/users';
</script>
