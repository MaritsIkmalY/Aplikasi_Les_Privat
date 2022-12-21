@props(['status'])

@if ($status == 'pending')
    <div class="px-4 py-2 bg-yellow-100 text-yellow-500 font-bold rounded-md">
        {{ $slot }}
    </div>
@elseif($status == 'rejected')
    <div class="px-4 py-2 bg-red-100 text-red-500 font-bold rounded-md">
        {{ $slot }}
    </div>
@elseif($status == 'accepted')
    <div class="px-4 py-2 bg-green-100 text-green-500 font-bold rounded-md">
        {{ $slot }}
    </div>
@elseif($status == 'ongoing')
    <div class="px-4 py-2 bg-blue-100 text-blue-500 font-bold rounded-md">
        {{ $slot }}
    </div>
@endif
