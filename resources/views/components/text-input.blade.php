@props(['readonly' => false, 'checked' => false])

@php
    $type = $attributes->get('type');
    $inputClass = 'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm';
    if ($readonly) {
        $inputClass .= ' bg-gray-200 text-gray-500';
    }
@endphp

@if ($type === 'textarea')
    <textarea {{ $attributes->except('type')->merge(['class' => $inputClass, 'readonly' => $readonly]) }}>
        {{ $slot }}
    </textarea>
@elseif ($type === 'radio')
    <input {{ $attributes->merge(['class' => $inputClass, 'type' => 'radio', 'readonly' => $readonly, 'checked' => $checked]) }}>
@else
    <input {{ $attributes->merge(['class' => $inputClass, 'type' => 'text', 'readonly' => $readonly]) }}>
@endif
