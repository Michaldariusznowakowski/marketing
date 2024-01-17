@if (session('success'))
    <div class="flex items-center justify-center">
        <div class="bg-green-500 text-white px-4 py-2 rounded-md">{{ session('success') }}</div>
    </div>
@endif
@if (session('error'))
    <div class="flex items-center justify-center">
        <div class="bg-red-500 text-white px-4 py-2 rounded-md">{{ session('error') }}</div>
    </div>
@endif
