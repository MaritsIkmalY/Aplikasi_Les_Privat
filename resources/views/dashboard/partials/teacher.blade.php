<div>
    @if (!is_null(Auth::user()->name) && !is_null(Auth::user()->teacher->category_id))
        <h1 class="text-2xl">Terima Pesanan</h1>
        <p class="text-sm opacity-90">Note : Apabila status diaktifkan maka murid dapat memesan anda. Sebaliknya apabila
            status dinonaktifkan maka murid tidak akan bisa memesan anda</p>
        <!--status ready-->
        <div class="my-5">
            <form action="{{ route('teacher.status') }}" method="post">
                @csrf
                @method('put')
                <button name="status" value="true" class="btn btn-primary">Aktif</button>
                <button name="status" value="false" class="btn btn-secondary">Non Aktif</button>
            </form>
        </div>
        <div class="my-5">
            <p>Status : </p>
            @if (Auth::user()->teacher->status)
                <x-status status="accepted">Aktif</x-status>
            @else
                <x-status status="rejected">Non Aktif</x-status>
            @endif
        </div>
        <div class="divider"></div>
        <div>

        </div>

        @if (count($order) == 0)
            <p>Belum Ada Pesanan</p>
        @else
            <div class="flex justify-between items-center">
                <h1 class="text-2xl">Pesanan</h1>
                <a class="p-4 flex gap-2 items-center text-blue-500 hover:underline" href="/order">Tampilkan
                    lebih banyak</a>
            </div>
            <div class="my-5 flex justify-center">
                @include('dashboard.partials.order-teacher')
            </div>
        @endif
    @else
        <div>
            <p>
                Isi biodata diri terlebih dahulu
                <a class="text-decoration-none" href="{{ route('profile.index') }}">Biodata Diri</a>
            </p>
        </div>
    @endif
</div>
