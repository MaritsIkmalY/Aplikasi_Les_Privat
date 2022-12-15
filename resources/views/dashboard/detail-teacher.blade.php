<x-dashboard-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Detail Guru') }}
        </h2>
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
                        <form class="" action="{{ route('teacher.store') }}" method="post">
                            @csrf
                            <input type="hidden" name="teacher_id" value="{{ $t->id }}">
                            <button class="w-full btn btn-primary btn-xs sm:btn-sm md:btn-md lg:btn-lg">Pesan</button>
                        </form>
                    @else
                        <button class="btn" disabled="disabled">Pesan</button>
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
