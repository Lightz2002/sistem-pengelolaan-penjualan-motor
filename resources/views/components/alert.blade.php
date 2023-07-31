@php
    $alert = (object) [
        'bgColor' => 'green',
        'color' => 'green',
        'icon' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 me-2">
  <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
</svg>
',
    ];
    
    switch (strtolower($type)) {
        case 'info':
            $alert->bgColor = 'blue';
            $alert->color = 'blue';
            $alert->icon = '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
      stroke="currentColor" class="w-6 h-6 me-2">
      <path stroke-linecap="round" stroke-linejoin="round"
          d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
          </svg>';
            break;
        case 'error':
            $alert->bgColor = 'red';
            $alert->color = 'red';
            $alert->icon = '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
      stroke="currentColor" class="w-6 h-6 me-2">
      <path stroke-linecap="round" stroke-linejoin="round"
          d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
          </svg>';
            break;
        case 'warning':
            $alert->bgColor = 'orange';
            $alert->color = 'orange';
            $alert->icon = '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 me-2">
  <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
</svg>
';
            break;
        default:
            /* success alert */
            break;
    }
    
@endphp

<div
    class="alert py-1 flex items-center rounded-md text-sm px-4 ml-auto text-{{ $alert->color }}-800 bg-{{ $alert->bgColor }}-100">
    {!! $alert->icon !!}

    {{ $slot }}
</div>

<script>
    const alert = document.querySelector('.alert');
    setTimeout(() => {
        alert.classList.add('hidden');
    }, 2000);
    console.log('1');
</script>
