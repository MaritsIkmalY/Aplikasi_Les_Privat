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


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="rounded-md sm:w-1/2 mx-auto p-4 shadow-sm border border-gray-200">
                @if (Auth::user()->role_id == 2)
                    <h1 class="text-2xl font-semibold text-center mb-5">Detail Pesanan #{{ $order->id }}</h1>
                    @include('dashboard.partials.detail-order-teacher')
                @else
                    @include('dashboard.partials.detail-order-student')
                @endif
            </div>
        </div>
    </div>

</x-dashboard-layout>
