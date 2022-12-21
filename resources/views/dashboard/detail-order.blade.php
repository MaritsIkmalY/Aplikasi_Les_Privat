<x-dashboard-layout>
    <x-slot name="header">
        <div class="text-xl breadcrumbs">
            <ul>
                <li><a href="{{ route('order.index') }}">Pesanan</a></li>
                <li><a class="font-bold text-blue-600">Detail Pesanan</a></li>
            </ul>
        </div>
    </x-slot>

    <x-slot name="modal">
        <x-modal2 id="order-form">
            <h1 class="text-xl font-semibold mb-5">Pesan kepada murid</h1>
            <form action="/order/{{ $order->id }}" method="post" class="w-full">
                @csrf
                @method('put')
                <textarea class="textarea textarea-primary w-full" placeholder="Tuliskan pesanmu disini"></textarea>
                <x-primary-button class="mt-5 w-full" name="status_order" value="1">Terima Pesanan
                </x-primary-button>
            </form>
        </x-modal2>

        <x-modal2 id="order-form-2">
            <h1 class="text-xl font-semibold mb-5">Pesan kepada murid</h1>
            <form action="/order/{{ $order->id }}" method="post" class="w-full">
                @csrf
                @method('put')
                <textarea class="textarea textarea-primary w-full" placeholder="Tuliskan pesanmu disini"></textarea>
                <x-secondary-button class="mt-5 w-full" name="status_order" value="0">Tolak Pesanan
                </x-secondary-button>
            </form>
        </x-modal2>
    </x-slot>



    <div class="py-12" data-aos="fade-up">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="rounded-md sm:w-1/2 mx-auto p-4 shadow-sm border border-gray-200">
                <h1 class="text-2xl font-semibold text-center mb-5">Detail Pesanan #{{ $order->id }}</h1>
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
                            <div class="text-sm opacity-90">Tagihan / jam</div>
                            <div class="font-bold">Rp . {{ $order->teacher->fee }}</div>
                        </div>
                        @if (is_null($order->status_order))
                            <div>
                                <label for="order-form" class="btn btn-sm btn-primary mr-4">Terima</label>
                                <label for="order-form-2" class="btn btn-sm btn-secondary">Tolak</label>
                            </div>
                        @elseif($order->status_order == false)
                            <x-status status="rejected">
                                <p class="text-center">Pesanan Ditolak</p>
                            </x-status>
                        @elseif($order->status_order == true)
                            @if ($order->status_study == 0)
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
        </div>
    </div>

</x-dashboard-layout>
