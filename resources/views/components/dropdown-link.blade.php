@props(['active' => false])

@php
    $classes = 'block w-full px-4 py-2 text-start text-sm leading-5 text-gray-700 dark:text-gray-100 dark:hover:bg-gray-200 hover:bg-gray-400 hover:text-gray-900 focus:outline-hidden focus:bg-gray-100 transition duration-150 ease-in-out py-1 flex flex-row items-center';
    
    // Add active class if active
    if ($active) {
        $classes .= ' bg-blue-100 dark:!bg-blue-500 hover:dark:!bg-blue-600 hover:dark:!text-gray-300';
    }
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>{{ $slot }}</a>