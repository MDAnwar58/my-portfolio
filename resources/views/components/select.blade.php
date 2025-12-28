@props([
'name',
'id',
'options' => [],
'value' => '',
'placeholder' => '',
'required' => false,
'class' => '',
'label' => '',
'wrapperClass' => '',
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

    <select name="{{ $name }}" id="{{ $id }}" @if($required) required @endif {{ $attributes->merge(['class' => "block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-gray-800/75 focus:border-gray-800 " . $class]) }}>
        @if($placeholder)
        <option value="">{{ $placeholder }}</option>
        @endif

        @foreach($options as $optionValue => $optionLabel)
        <option value="{{ $optionValue }}" @if(old($name, $value)==$optionValue) selected @endif>
            {{ $optionLabel }}
        </option>
        @endforeach
    </select>

    @error($name)
    <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
    @enderror
</div>
