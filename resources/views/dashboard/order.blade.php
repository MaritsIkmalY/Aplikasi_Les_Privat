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
