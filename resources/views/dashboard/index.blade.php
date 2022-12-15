<x-dashboard-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
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
