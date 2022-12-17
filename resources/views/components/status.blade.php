@props(['status'])

@if ($status == 'pending')
    <div class="px-4 py-2 bg-yellow-100 text-yellow-500 font-bold rounded-md">
        {{ $slot }}
    </div>
@endif
