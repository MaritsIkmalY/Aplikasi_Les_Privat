<x-dashboard-layout>
    <x-slot name="header">
        <div class="text-xl breadcrumbs">
            <ul>
                <li><a>Pesanan</a></li>
            </ul>
        </div>
    </x-slot>

    <div class="py-12" data-aos="fade-up">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="my-3">
                @if (Session::has('status'))
                    <x-alert status="success">
                        {{ Session::get('status') }}
                    </x-alert>
                @endif
            </div>
            <div class="my-4 flex gap-3 items-center">
                <form action="{{ route('order.index') }}" method="get">
                    <select name="status" class="select select-bordered w-full max-w-xs" onchange="submit()">
                        <option disabled selected>Filter by</option>
                        <option value="pending" {{ Request::get('status') == 'pending' ? 'selected' : null }}>Pesanan
                            Menunggu
                        </option>
                        <option value="done" {{ Request::get('status') == 'done' ? 'selected' : null }}>Pesanan
                            Selesai</option>
                        <option value="reject"{{ Request::get('status') == 'reject' ? 'selected' : null }}>Pesanan
                            ditolak</option>
                        <option value="ongoing"{{ Request::get('status') == 'ongoing' ? 'selected' : null }}>Pesanan
                            Berlangsung</option>
                    </select>
                </form>
                @if (Request::get('status'))
                    <a href="{{ route('order.index') }}"
                        class="btn btn-xs bg-red-600 border-none hover:bg-red-500">Reset</a>
                @endif
            </div>

            <div class="flex gap-2 flex-wrap justify-center">
                @if (count($order) == 0)
                    <div class="text-yellow-600">Belum memiliki orderan</div>
                @elseif (Auth::user()->role_id == 2)
                    @include('dashboard.partials.order-teacher')
                @elseif(Auth::user()->role_id == 1)
                    @include('dashboard.partials.order-student')
                @endif
            </div>
        </div>
    </div>

</x-dashboard-layout>
