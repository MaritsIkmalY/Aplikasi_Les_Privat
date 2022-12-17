@foreach ($order as $o)
    <x-slot name="modal">
        <x-modal2 id="my-modal-form">
            <div class="text-2xl font-bold mb-3">
                Pesanan
            </div>
            <form action="/order/{{ $o->id }}" method="post">
                @csrf
                @method('put')
                <div class="my-3">
                    <x-input-label for="pesan">Pesan</x-input-label>
                    <textarea id="pesan" class="textarea textarea-bordered w-full" placeholder="Pesan" name="massage">
                </textarea>
                </div>
                <div class="my-3 flex gap-2">
                    <input type="radio" id="acc" name="status_order" class="radio" value="1" />
                    <x-input-label for="acc">Terima</x-input-label>
                </div>
                <div class="my-3 flex gap-2">
                    <input type="radio" id="reject" name="status_order" class="radio" value="0" />
                    <x-input-label for="reject">Tolak</x-input-label>
                </div>
                <div class="flex justify-end">
                    <button class="btn btn-primary">Kirim</button>
                </div>
            </form>
        </x-modal2>
    </x-slot>

    <div class="bg-base-100 rounded-md p-5 font-semibold flex flex-col gap-2 drop-shadow-md w-96">
        <div class="flex flex-col items-center gap-2 my-2">
            <div class="avatar">
                <div class="w-24 rounded-full ring ring-primary ring-offset-base-100 ring-offset-2">
                    <img src="/storage/{{ $o->student->user->profile_photo_path }}" />
                </div>
            </div>
            <div>From : {{ $o->student->user->name }}</div>
            <div class="text-blue-500">
                Rp. {{ $o->teacher->fee }}
            </div>
        </div>
        <div>
            <button class="btn btn-primary w-full">Detail Murid</button>
        </div>
        <div>
            @if (is_null($o->status_order))
                <label for="my-modal-form" class="btn btn-secondary w-full">Pesanan</label>
            @elseif($o->status_order == false)
                <x-status status="rejected">
                    <p class="text-center">Pesanan Ditolak</p>
                </x-status>
            @elseif($o->status_order == true)
                @if ($o->status_study == 0)
                    <x-status status="pending">
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
@endforeach
