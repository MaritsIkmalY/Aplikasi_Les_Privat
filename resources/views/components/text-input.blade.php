@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 text-base-content focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm bg-base-100']) !!}>
