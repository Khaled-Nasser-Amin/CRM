@extends('layouts.app')
@section('title','Two Factor Authentication')
@push('css')
    @livewireStyles
    <script type="module" src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"></script>
@endpush
@section('content')
        <x-authentication-card>
            <div class="text-center account-logo-box">
                <div class="mt-2 mb-2">
                    <a href="index.html" class="text-success">
                        <span><img src="{{asset('images/logo.png')}}" alt="" height="36"></span>
                    </a>
                </div>
            </div>

            <div class="card-body">
                <x-input-error for="code"></x-input-error>
                <x-input-error for="recovery_code"></x-input-error>

                <div x-data="{ recovery: false }">
                    <div class="mb-3" x-show="! recovery">
                        {{ __('Please confirm access to your account by entering the authentication code provided by your authenticator application.') }}
                    </div>

                    <div class="mb-3" x-show="recovery">
                        {{ __('Please confirm access to your account by entering one of your emergency recovery codes.') }}
                    </div>
                    @include('partials.errors')
                    <form method="POST" action="{{ route('two-factor.login') }}">
                        @csrf

                        <div class="form-group" x-show="! recovery">
                            <x-label value="{{ __('Code') }}" />
                            <x-input class="{{ $errors->has('code') ? 'is-invalid' : '' }}" type="text"
                                         inputmode="numeric" name="code" autofocus x-ref="code" autocomplete="one-time-code" />
                            @error('code')
                            <span class = "invalid-feedback"  role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group" x-show="recovery">
                            <x-label value="{{ __('Recovery Code') }}" />
                            <x-input class="{{ $errors->has('recovery_code') ? 'is-invalid' : '' }}" type="text"
                                         name="recovery_code" x-ref="recovery_code" autocomplete="one-time-code" />
                            @error('recovery_code')
                            <span class = "invalid-feedback"  role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-end mt-3">
                            <button id="showRecovery"  type="button" class="btn btn-outline-secondary"
                                    x-show="! recovery"
                                    x-on:click="
                                                recovery = true;
                                                $nextTick(() => { $refs.recovery_code.focus() })
                                            ">
                                {{ __('Use a recovery code') }}
                            </button>

                            <button id="showCode" type="button" class="btn btn-outline-secondary"
                                    x-show="recovery"
                                    x-on:click="
                                                recovery = false;
                                                $nextTick(() => { $refs.code.focus() })
                                            ">
                                {{ __('Use an authentication code') }}
                            </button>

                            <x-button id="btnTwoFactor">
                                {{ __('Log in') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </x-authentication-card>
@endsection
@push('script')
    @livewireScripts

    @if ($errors->has('code'))
        <script>
            $(window).on('load',function (){
                $('#showCode').click();
            })
        </script>
    @elseif($errors->has('recovery_code'))
        <script>
            $(window).on('load',function (){
                $('#showRecovery').click();
            })
        </script>
    @endif
@endpush
