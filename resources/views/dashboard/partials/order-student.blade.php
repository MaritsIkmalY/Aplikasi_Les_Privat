@foreach ($order as $o)
    <div class="bg-base-100 rounded-md p-5 font-semibold flex flex-col gap-2 drop-shadow-md">
        <div class="flex flex-col items-center gap-2 my-2">
            <div class="avatar">
                <div class="w-24 rounded-full ring ring-primary ring-offset-base-100 ring-offset-2">
                    <img src="/storage/{{ $o->teacher->user->profile_photo_path }}" />
                </div>
            </div>
            <div>From : {{ $o->teacher->user->name }}</div>
            <div class="text-blue-500">
                Rp. {{ $o->teacher->fee }}
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
            <x-status status="pending">
                <p class="text-center">Pesanan Diterima</p>
            </x-status>
        @endif
    </div>
@endforeach
