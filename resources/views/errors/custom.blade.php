@extends('layouts.base')

@section('body')
    <div class="relative flex items-top justify-center min-h-screen bg-base sm:items-center sm:pt-0">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="flex items-center pt-8 sm:justify-start sm:pt-0">
                <div class="px-4 text-lg text-base-content border-r border-white tracking-wider">
                    @yield('code')
                </div>

                <div class="ml-4 text-lg text-base-content uppercase tracking-wider">
                    @yield('message')
                </div>
            </div>
        </div>
    </div>
@endsection
