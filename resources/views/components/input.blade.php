@props([
'type' => 'text',
'name',
'id',
'value' => '',
'placeholder' => '',
'required' => false,
'class' => '',
'label' => '',
'wrapperClass' => '',
'dangerousHtml' => false
])

<div class="{{ $wrapperClass }}">
    @if($label)
    <label for="{{ $id }}" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
        {{ $label }}
        @if($required)
        <span class="text-red-500">*</span>
        @endif
    </label>
    @endif

    <input type="{{ $type }}" name="{{ $name }}" id="{{ $id }}" value="@if($dangerousHtml === true){!! $value !!}@else{{ old($name, $value) }}@endif" placeholder="{{ $placeholder }}" @if($required) required @endif {{ $attributes->merge(['class' => "block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-gray-800/75 focus:border-gray-800 " . $class]) }}>

    @error($name)
    <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
    @enderror
</div>
