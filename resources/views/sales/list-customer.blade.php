<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Customer') }}
        </h2>
        <x-alert type="success"></x-alert>
    </x-slot>

    {{-- @include('partials.list-table') --}}
    <!-- List View -->
    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-8">
                <h3 class="mb-4 text-lg font-bold">Customers List</h3>

                <!-- List Navbar -->
                <livewire:customers-table />

            </div>
        </div>

    </div>
    
<script>

    const acceptButtons = document.querySelectorAll('.show-accept-alert');
    const rejectButtons = document.querySelectorAll('.show-reject-alert');

    var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    acceptButtons.forEach(button => {
        const salesId = button.getAttribute('data-sales-id');
        button.addEventListener('click', function () {
            Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, accept!'
            }).then((result) => {
            if (result.isConfirmed) {
                fetch(`/customers/${salesId}/status`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': csrfToken
                        },
                        body: JSON.stringify({ sales_status: 'accepted' }),
                    })
                    .then(response => response.json())
                    .then(data => {
                        Swal.fire(
                        'Success',
                        data.message,
                        'success'
                        )
                    })
                    .catch(error => {
                        Swal.fire('Error', 'An error occurred', 'error');
                    });
            }
            })
        });
    })

    rejectButtons.forEach(button => {
        const salesId = button.getAttribute('data-sales-id');
        button.addEventListener('click', function () {
            Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, reject!'
            }).then((result) => {
            if (result.isConfirmed) {
                fetch(`/customers/${salesId}/status`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': csrfToken
                        },
                        body: JSON.stringify({ sales_status: 'rejected' }),
                    })
                    .then(response => response.json())
                    .then(data => {
                        Swal.fire(
                        'Success',
                        data.message,
                        'success'
                        )
                    })
                    .catch(error => {
                        Swal.fire('Error', 'An error occurred', 'error');
                    });
            }
            })
        });
    });
</script>
</x-app-layout>

