@props(['id', 'row'])

<div class="inline-flex align-items-center">
    <a href={{ "/customers/{$id}" }}
        class="inline-flex items-center me-4 border bg-teal-400 text-white px-4 py-2 text-xs rounded-md">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="w-6 h-6 stroke-white me-1">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
        </svg>
        <span>View</span>
    </a>
    <a href={{ "/customers/{$id}/edit" }}
        class="inline-flex items-center me-4 border bg-blue-400 text-white px-4 py-2 text-xs rounded-md">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor" class="w-4 h-4 stroke-white me-1">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
        </svg>
        <span>Edit</span>
    </a>
    @if ($row->sales_status === 'pending')
    <span id="show-accept-alert"
        class="inline-flex items-center me-4 border bg-green-400 text-white px-4 py-2 text-xs rounded-md">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 stroke-white me-1">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
          </svg>
        <span>Accept</span>
    </span>
    <span id="show-reject-alert"
        class="inline-flex items-center me-4 border bg-red-400 text-white px-4 py-2 text-xs rounded-md">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 stroke-white me-1">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        <span>Reject</span>
    </span>
    @endif
</div>


<script>
    const salesId = @json($id);
    var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    document.getElementById('show-accept-alert').addEventListener('click', function () {
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

    document.getElementById('show-reject-alert').addEventListener('click', function () {
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
</script>