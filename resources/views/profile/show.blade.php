@extends('layouts.appLogged')
@section('title','Profile')
@push('css')
    @livewireStyles
    <script type="module" src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"></script>
@endpush
@section('content')
    <div>
        @livewire('update-profile-information-form')


        <x-section-border />

        @livewire('update-password-form')

        <x-section-border />

        @livewire('two-factor-authentication-form')

        <x-section-border />

        @livewire('logout-other-browser-sessions-form')

        <x-section-border />

        @livewire('delete-user-form')
    </div>
@endsection
@push('script')
    @livewireScripts
    <script>
        window.livewire.on('refresh-navbar',route=>{
            $.ajax({
                'url':route,
                'method':'get',
                success:function (result){
                    let navbar=$('.navbar-custom');
                    navbar.empty();
                    navbar.html($('.navbar-custom',result).html());
                }
            })
        })
    </script>
@endpush


