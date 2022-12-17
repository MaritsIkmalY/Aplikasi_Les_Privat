<x-dashboard-layout>
    <x-slot name="header">
        <div class="text-xl breadcrumbs">
            <ul>
                <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li><a class="text-blue-500 font-bold">Detail Guru</a></li>
            </ul>
        </div>
    </x-slot>

    <x-slot name="modal">
        <x-modal2 id="pesanan">
            <div class="text-2xl font-bold mb-3">
                Pesanan
            </div>
            <form action="/order/{{ $order->id }}" method="post">
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

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-16 lg:px-16">
            @if (Session::has('status'))
                <x-alert status="success">
                    {{ Session::get('status') }}
                </x-alert>
            @endif
            <div class="flex flex-col gap-5">
                <!--profil photo-->
                <div class="flex flex-col items-center gap-4">
                    <h1 class="text-2xl font-semibold">Pengajar</h1>
                    <img class="mask mask-circle w-52" src="/storage/{{ $t->user->profile_photo_path }}" />
                </div>

                {{-- Button Order --}}

                @if ($t->status == true)
                    @if (empty($order))
                        <form action="{{ route('order.store') }}" id="form" method="post">
                            @csrf
                            <input type="hidden" name="teacher_id" value="{{ $t->id }}">
                            <button class="w-full btn btn-primary btn-xs sm:btn-sm md:btn-md lg:btn-lg"
                                id="button">Pesan</button>
                        </form>
                    @else
                        @if (is_null($order->status_order))
                            <x-status status="pending">
                                <p class="text-center">Menunggu</p>
                            </x-status>
                        @elseif ($order->status_order == 1)
                            @if ($order->status_study == false)
                                <label for="pesanan" class="btn btn-primary">Belajar Selesai</label>
                                <x-status status="accepted">
                                    <p class="text-center">Sedang Berlangsung</p>
                                </x-status>
                            @else
                                <x-status status="accepted">
                                    <p class="text-center">Selesai</p>
                                </x-status>
                            @endif
                            <x-status status="accepted">
                                <p class="text-center">{{ $t->user->phone }}</p>
                            </x-status>
                            <x-status status="accepted">
                                <p class="text-center">{{ $t->user->email }}</p>
                            </x-status>
                        @endif
                    @endif
                @elseif($t->status == false)
                    <button class="btn" disabled="disabled">Pesan</button>
                @endif
                <!--Biodata-->
                <div class="flex flex-col gap-4 mt-5">
                    <div class="flex justify-between items-center">
                        <h1 class="text-2xl">Biodata</h1>
                    </div>
                    <div class="divider"></div>
                    <p>Nama : {{ $t->user->name }}</p>
                    <p>Alamat : {{ $t->user->address }}</p>
                    <p>Mengajar : {{ $t->category->name }}</p>
                    <p>Biaya : {{ $t->fee }} / jam</p>
                    <p>Jadwal : {{ $t->schedule }} </p>
                </div>
                <div class="divider"></div>

                <!--pendidikan-->
                <div class="flex flex-col gap-4 mt-5">
                    <div class="flex justify-between items-center">
                        <h1 class="text-2xl">Pendidikan</h1>
                    </div>
                    <div class="divider"></div>
                    @foreach ($t->education as $education)
                        <p>{{ $education->name }} - {{ $education->description }}</p>
                    @endforeach
                </div>
                <div class="divider"></div>

                <!--sertif-->
                <div class="flex flex-col gap-5">
                    <div class="flex justify-between items-center">
                        <h1 class="text-2xl">Sertifikat</h1>
                    </div>
                    <div class="divider"></div>
                    <div class="flex gap-4 items-stretch">
                        @foreach ($t->certificate as $certificate)
                            <div class="card w-96 bg-base-100 shadow-xl">
                                <figure><img src="/storage/{{ $certificate->file_path }}"
                                        alt="{{ $certificate->name }}" />
                                </figure>
                                <div class="card-body">
                                    <h2 class="card-title">
                                        {{ $certificate->name }}
                                    </h2>
                                    <p>{{ $certificate->description }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
</x-dashboard-layout>
