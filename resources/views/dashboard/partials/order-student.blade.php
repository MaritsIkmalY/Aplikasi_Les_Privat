@foreach ($order as $o)
    <div class="bg-base-100 rounded-md p-5 font-semibold flex flex-col gap-2 drop-shadow-md w-96">
        <div class="flex flex-col items-center gap-2 my-2">
            <div class="avatar">
                <div class="w-24 rounded-full ring ring-primary ring-offset-base-100 ring-offset-2">
                    <img src="/storage/{{ $o->teacher->user->profile_photo_path }}" />
                </div>
            </div>
            <div class="text-xl font-bold mt-2">{{ $o->teacher->user->name }}</div>
            <div class="flex gap-3 items-center">
                <div class="badge p-3 bg-blue-200 font-bold text-blue-700 border-none">
                    {{ $o->teacher->category->name }}
                </div>
            </div>
            <a href="/order/{{ $o->id }}" class="btn btn-sm btn-primary">Detail Pesanan</a>
            <div>
                {{ $o->created_at->format('D , d - M - Y') }}
            </div>
        </div>
        @if (is_null($o->status_order))
            <x-status status="pending">
                <p class="text-center">Pesanan Diproses</p>
            </x-status>
        @elseif($o->status_order == false)
            <x-status status="rejected">
                <p class="text-center">Pesanan Ditolak</p>
            </x-status>
        @elseif($o->status_order == true)
            @if ($o->status_study == false)
                <x-status status="ongoing">
                    <p class="text-center">Sedang Berlangsung</p>
                </x-status>
            @else
                <x-status status="accepted">
                    <p class="text-center">Selesai</p>
                </x-status>
            @endif
        @endif
    </div>
@endforeach
