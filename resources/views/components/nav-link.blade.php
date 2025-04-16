@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 border-b-2 border-blue-400 text-sm font-medium leading-5 !text-gray-900 dark:!text-white focus:outline-hidden focus:border-indigo-700 focus:text-indigo-700 transition duration-150 ease-in-out !no-underline' 
            : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 !text-gray-500 dark:!text-gray-100 hover:text-gray-700 dark:hover:text-blue-200 focus:outline-hidden focus:text-gray-700 transition duration-150 ease-in-out !no-underline';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
