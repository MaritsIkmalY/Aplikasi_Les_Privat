<x-dashboard-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Informasi Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col gap-5">
                <!--profil photo-->
                <div class="flex flex-col items-center gap-4">
                    <h1 class="text-2xl font-semibold">Halaman Profile</h1>
                    @if (is_null(Auth::user()->profile_photo_path))
                        <img class="mask mask-circle w-52" src="/storage/default.jpg" />
                    @else
                        <img class="mask mask-circle w-52" src="/storage/{{ Auth::user()->profile_photo_path }}" />
                    @endif
                </div>

                <!--Biodata-->
                <div class="flex flex-col gap-4 mt-5">
                    <div class="flex justify-between items-center">
                        <h1 class="text-2xl">Biodata</h1>
<<<<<<< HEAD
                        <a class="btn btn-success" href="{{ route('profile.edit') }}">Edit Biodata</a>
=======
                        <a class="btn btn-success" href="{{ route('profile.edit') }}">
                            Edit Biodata
                        </a>
>>>>>>> ba9a7db18d9583d4bb0834ee1833641157da155d
                    </div>
                    <p>Nama : {{ Auth::user()->name }}</p>
                    <p>Email : {{ Auth::user()->email }}</p>
                    <p>Address : {{ Auth::user()->address }}</p>
                    <p>Phone : {{ Auth::user()->phone }}</p>
                </div>

<<<<<<< HEAD
                <div class="flex flex-col gap-4 mt-5">
                    <div class="flex justify-between items-center">
                        <h1 class="text-2xl">Pendidikan</h1>
                        <button class="btn btn-success">Edit Pendidikan</button>
                    </div>
                    @foreach ($teacher->education as $education)
                        <p>{{ $education->name }} - {{ $education->description }}</p>
                    @endforeach
                </div>


                <!--pendidikan-->
                <!--sertif-->
                <div class="flex flex-col gap-5">
                    <div class="flex justify-between items-center">
                        <h1 class="text-2xl">Sertifikat</h1>
                        <button class="btn btn-success">Edit Sertifikat</button>
                    </div>
                    <div class="flex gap-4 items-stretch">
                        @foreach ($teacher->certificate as $certificate)
                            <div class="card w-96 bg-base-100 shadow-xl">
                                <figure><img src="/storage/{{ $certificate->file_path }}" alt="Shoes" /></figure>
                                <div class="card-body">
                                    <h2 class="card-title">
                                        {{ $certificate->name }}
                                    </h2>
                                    <p>{{ $certificate->description }}</p>
                                </div>
                            </div>
=======
                @if (Auth::user()->role_id == 2)
                    {{-- Pendidikan --}}
                    <div class="flex flex-col gap-4 mt-5">
                        <div class="flex justify-between items-center">
                            <h1 class="text-2xl">Pendidikan</h1>
                            <button class="btn btn-success">Edit Pendidikan</button>
                        </div>
                        @foreach ($teacher->education as $education)
                            <p>{{ $education->name }} - {{ $education->description }}</p>
>>>>>>> ba9a7db18d9583d4bb0834ee1833641157da155d
                        @endforeach
                    </div>


                    <!--pendidikan-->
                    <!--sertif-->
                    <div class="flex flex-col gap-5">
                        <div class="flex justify-between items-center">
                            <h1 class="text-2xl">Sertifikat</h1>
                            <button class="btn btn-success">Edit Sertifikat</button>
                        </div>
                        <div class="flex gap-4 items-stretch">
                            @foreach ($teacher->certificate as $certificate)
                                <div class="card w-96 bg-base-100 shadow-xl">
                                    <figure><img src="/storage/{{ $certificate->file_path }}" alt="Shoes" /></figure>
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
                @endif
            </div>
        </div>
    </div>
</x-dashboard-layout>
