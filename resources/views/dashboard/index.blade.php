<x-dashboard-layout>
    <x-slot name="header">
        <div class="text-xl breadcrumbs">
            <ul>
                <li><a>Dashboard</a></li>
            </ul>
        </div>
    </x-slot>

    <!--Modal -->
    @if (Auth::user()->role_id == 1)
        <x-slot name="modal">
            <x-modal2 id="my-modal-1">
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
            </x-modal2>
        </x-slot>
    @endif

    <div class="py-12" data-aos="fade-up">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (Session::has('status'))
                <x-alert status="success">
                    {{ Session::get('status') }}
                </x-alert>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @if (Auth::user()->role_id == 2)
                    @include('dashboard.partials.teacher')
                @endif

                @if (Auth::user()->role_id == 1)
                    @include('dashboard.partials.student')
                @endif
            </div>
        </div>
    </div>
</x-dashboard-layout>
