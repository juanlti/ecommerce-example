<div class="shadow-md rounded-lg border border-gray-200">
    <!-- Encabezado -->
    <div class="border-b px-6 py-4">
        <h5 class="text-lg font-bold text-gray-800">{{ $title }}</h5>
    </div>

    <!-- Cuerpo -->
    <div class="px-6 py-4">
        {{ $slot }}
    </div>
</div>
