<div class="flex flex-col items-center my-5 gap-10">
    <div class="avatar">
        <div class="w-24 rounded-full ring ring-primary ring-offset-base-100 ring-offset-2">
            <img src="/storage/{{ $order->student->user->profile_photo_path }}" />
        </div>
    </div>

    <div class="flex flex-col gap-4">
        <div>
            <div class="text-sm opacity-90">Nama</div>
            <div class="font-bold">{{ $order->student->user->name }}</div>
        </div>
        <div>
            <div class="text-sm opacity-90">Kelas</div>
            <div class="font-bold">{{ $order->student->grade->name }}</div>
        </div>
        <div>
            <div class="text-sm opacity-90">Lokasi / Domisili</div>
            <div class="font-bold">{{ $order->student->user->location->name }}</div>
        </div>
        <div>
            <div class="text-sm opacity-90">Tanggal Pemesanan</div>
            <div class="font-bold">{{ $order->created_at->format('d-M-Y') }}</div>
        </div>
        <div>
            <div class="text-sm opacity-90">Tagihan / jam</div>
            <div class="font-bold">Rp . {{ $order->teacher->fee }}</div>
        </div>

        @if (is_null($order->status_order) && Auth::user()->role_id == 2)
            <div>
                <label for="order-form" class="btn btn-sm btn-primary mr-4">Terima</label>
                <label for="order-form-2" class="btn btn-sm btn-secondary">Tolak</label>
            </div>
        @elseif($order->status_order == '0')
            <x-status status="rejected">
                <p class="text-center">Pesanan Ditolak</p>
            </x-status>
        @elseif($order->status_order)
            @if ($order->status_study == 0)
                <x-status status="ongoing">
                    <p class="text-center">Sedang berlangsung</p>
                </x-status>
                <a href="https://wa.me/{{ $order->student->user->phone }}"
                    class="text-center rounded-full bg-green-600 text-white  p-2 font-bold"><i
                        class="fab fa-whatsapp"></i> {{ $order->student->user->phone }}</a>
                <a href="mailto:{{ $order->student->user->email }}"
                    class="text-center rounded-full bg-green-100 text-green-500 p-2 font-bold"><i
                        class="far fa-envelope"></i> {{ $order->student->user->email }}</a>
            @else
                <x-status status="accepted">
                    <p class="text-center">Selesai</p>
                </x-status>
            @endif
        @endif
    </div>
</div>
