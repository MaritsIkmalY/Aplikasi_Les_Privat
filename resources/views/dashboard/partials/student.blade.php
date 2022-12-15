<div>
    <label for="my-modal-4" class="btn btn-primary btn-sm">Filter</label>
    <div class="my-3 flex gap-3 items-center">
        @if (Request::get('daerah'))
            <div class="badge badge-lg bg-blue-600 border-none ">{{ Request::get('daerah') }}
            </div>
        @endif
        @if (Request::get('category'))
            <div class="badge badge-lg bg-blue-600 border-none "> {{ Request::get('category') }}
            </div>
        @endif
        @if (Request::get('category') || Request::get('daerah'))
            <a href="{{ route('dashboard') }}" class="badge badge-lg bg-red-500 border-none p-3"><i data-feather="x" class="mr-2"></i> Hapus</a>
        @endif
    </div>
    <!-- Put this part before </body> tag -->
    <input type="checkbox" id="my-modal-4" class="modal-toggle" />
    <label for="my-modal-4" class="modal cursor-pointer">
        <label class="modal-box relative" for="">
            <form action="{{ route('dashboard') }}" method="get">
                <h1 class="my-3 text-xl">Filter Guru</h1>
                <div class="mb-4">
                    <select name="daerah" class="select select-primary w-full max-w-xs">
                        <option disabled selected>Filter Daerah</option>
                        <option>Surabaya</option>
                        <option>Sampang</option>
                    </select>
                </div>
                <div class="mb-4">
                    <select name="category" class="select select-primary w-full max-w-xs">
                        <option disabled selected>Filter category</option>
                        @foreach ($category as $c)
                            <option>{{ $c->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button class="btn btn-primary">Terapkan filter</button>
            </form>
        </label>
    </label>
    @if (!is_null(Auth::user()->name) && !is_null(Auth::user()->student[0]->grade_id))
        <div class="flex gap-4">
            @include('dashboard.partials.card-teacher')
        </div>
    @else
        <div>
            <p>
                Isi biodata diri terlebih dahulu
                <a class="text-decoration-none" href="{{ route('profile.index') }}">Biodata
                    Diri</a>
            </p>
        </div>
    @endif
</div>
