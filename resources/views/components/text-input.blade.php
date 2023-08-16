@props(['disabled' => false, 'checked' => false])
@php $type = $attributes->get('type'); @endphp

@if ($type === 'textarea')
    <textarea
        {{ $attributes->except('type')->merge([
            'class' => 'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm',
        ]) }}>
        {{ $slot }}    
    </textarea>
@elseif ($type === 'radio')
    <input {{ $disabled ? 'disabled' : '' }} {{ $checked ? 'checked' : '' }} {!! $attributes->merge([
        'class' => 'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm',
        'type' => 'text',
    ]) !!}>
@else
    <input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
        'class' => 'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm',
        'type' => 'text',
    ]) !!}>
@endif

