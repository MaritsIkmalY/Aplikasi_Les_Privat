<x-dashboard-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __('Welcome back , ') }} {{ __(Auth::user()->role->name) }} <span
                        class="!text-blue-500 font-semibold">{{ __(Auth::user()->username) }}</span>

                </div>
            </div>
        </div>
    </div>
</x-dashboard-layout>
