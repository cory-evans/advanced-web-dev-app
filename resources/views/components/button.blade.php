@php

if (!isset($variant)) {
    $variant = "primary";
}

$className = 'px-4 py-2 border border-transparent rounded-md font-semibold text-xs uppercase tracking-widest focus:outline-none focus:ring disabled:opacity-25 transition ease-in-out duration-150';
if ($variant == 'danger') {
    $className = $className . ' text-white bg-red-800 hover:bg-red-700 active:bg-red-900 focus:border-red-900 ring-red-300';
} elseif ($variant == 'secondary') {
    $className = $className . ' text-black bg-gray-200 hover:bg-gray-300 active:bg-gray-400 focus:border-gray-400 ring-gray-300';
} else {
    $className = $className . ' text-white bg-blue-600 hover:bg-blue-700 active:bg-blue-900 focus:border-blue-900 ring-blue-300';
}

@endphp

<button {{ $attributes->merge([
    'type' => 'button',
    'class' => $className
]) }}>
    {{ $slot }}
</button>
