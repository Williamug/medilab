@props(['disabled' => false])

<textarea {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'form-input rounded-md shodow-sm']) !!} rows="6"> {{ $slot }}</textarea>
