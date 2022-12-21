<x-dashboard-layout>
    <x-slot name="header">
        <div class="text-xl breadcrumbs">
            <ul>
                <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li><a class="text-blue-500 font-bold">Detail Guru</a></li>
            </ul>
        </div>
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
                                {{-- Form feedback --}}
                                @include('dashboard.partials.form-feedback')

                                <label for="selesai" class="btn btn-primary">Belajar Selesai</label>
                                <x-status status="ongoing">
                                    <p class="text-center">Sedang Berlangsung</p>
                                </x-status>
                            @else
                                <x-status status="accepted">
                                    <p class="text-center">Selesai</p>
                                </x-status>
                            @endif
                            <a href="https://wa.me/{{ $t->user->phone }}"
                                class="text-center rounded-full bg-green-100 text-green-500 py-2 font-bold"><i
                                    class="fab fa-whatsapp"></i> {{ $t->user->phone }}</a>
                            <a href="mailto:{{ $t->user->email }}"
                                class="text-center rounded-full bg-green-100 text-green-500 py-2 font-bold"><i
                                    class="far fa-envelope"></i> {{ $t->user->email }}</a>
                        @endif
                    @endif
                @elseif($t->status == false)
                    <button class="btn" disabled="disabled">Pesan</button>
                @endif

                <!--feedback-->
                <div class="my-5">
                    <h1 class="text-2xl">Feedback Pengajar</h1>
                    <div class="divider"></div>
                    @if (count($feedback) == 0)
                        <div class="font-bold text-blue-600">
                            Belum ada feedback...
                        </div>
                    @else
                        <div class="inline-flex gap-2 flex-wrap w-full">
                            @foreach ($feedback as $f)
                                <div class="card w-full bg-base-100 shadow-xl">
                                    <div class="card-body">
                                        <div class="font-bold">{{ $f->student->user->name }}</div>
                                        <p>{{ $f->message }}</p>
                                        <div class="card-actions justify-end gap-5">
                                            <div class="flex gap-1 items-center"><i
                                                    data-feather="clock"></i>{{ $f->created_at->diffForHumans() }}
                                            </div>
                                            <button class="badge badge-primary p-3">⭐ {{ $f->rate }}</button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    @endif
                    <div class="mt-5">
                        {{ $feedback->links() }}
                    </div>

                </div>

                <!--Biodata-->
                <div class="flex flex-col gap-4 mt-5">
                    <div class="flex justify-between items-center">
                        <h1 class="text-2xl">Biodata</h1>
                    </div>
                    <div class="divider"></div>
                    <p>Nama : {{ $t->user->name }}</p>
                    <p>Alamat : {{ $t->user->location->name }}</p>
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
