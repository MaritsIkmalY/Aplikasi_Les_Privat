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
            <div class="flex gap-2">
                @include('dashboard.partials.order-teacher')
            </div>
        </div>
    </div>
</x-dashboard-layout>
