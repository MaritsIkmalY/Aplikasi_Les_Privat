@foreach ($order as $o)
    <div class="bg-base-100 rounded-md p-5 font-semibold flex flex-col gap-2 drop-shadow-md w-96">
        <div class="flex flex-col items-center gap-4 my-2">
            <div>
                Pesanan Murid
            </div>
            <div class="avatar">
                <div class="w-24 rounded-full ring ring-primary ring-offset-base-100 ring-offset-2">
                    <img src="/storage/{{ $o->student->user->profile_photo_path }}" />
                </div>
            </div>
            <div>{{ $o->student->user->name }}</div>
            <div class="bg-blue-200 font-bold p-2  rounded-md text-blue-500">
                {{ $o->student->grade->name }}
            </div>
            <div>
                <a href="/order/{{ $o->id }}" id="order-button" class="btn btn-xs btn-primary">Detail Pesanan</a>
            </div>
            <div class="w-full">
                @if (is_null($o->status_order))
                    <x-status status="pending">
                        <p class="text-center">Menunggu</p>
                    </x-status>
                @elseif($o->status_order == false)
                    <x-status status="rejected">
                        <p class="text-center">Pesanan Ditolak</p>
                    </x-status>
                @elseif($o->status_order == true)
                    @if ($o->status_study == 0)
                        <x-status status="ongoing">
                            <p class="text-center">Sedang berlangsung</p>
                        </x-status>
                    @else
                        <x-status status="accepted">
                            <p class="text-center">Selesai</p>
                        </x-status>
                    @endif
                @endif
            </div>
        </div>
    </div>
@endforeach
