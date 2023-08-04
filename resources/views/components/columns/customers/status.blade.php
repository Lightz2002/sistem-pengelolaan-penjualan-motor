@props(['value'])

@php
    $chipStyle = [
        'ACCEPTED' => 'bg-green-100 text-green-800 border-green-800',
        'REJECTED' => 'bg-red-100 text-red-800 border-red-800',
        'PENDING' => 'bg-blue-100 text-blue-800 border-blue-800',
    ];
@endphp

<div class="px-4 py-1 border text-center text-sm w-28 font-bold rounded-full {{ $chipStyle[$value] }}">
    {{ $value }}
</div>
