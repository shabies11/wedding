<x-guest-layout>
    <x-application-logo/>
    <x-auth-card>
        <form action="{{ route('login') }}" method="POST" class="wow fadeInRight" ata-wow-duration="1s" data-wow-delay="1s">
            @csrf
{{--            {!! RecaptchaV3::field('authforms') !!}--}}
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label>
                        <p class="label-txt label-active">Email Address</p>
                        <img class="img-fluid log-icon" src="{{ asset('img/Account.svg') }}" alt="">
                        <input id="emailfield" type="email" class="input input-active" name="email" required autofocus>
                    </label>
                </div>
                <div class="form-group col-md-12">
                    <label>
                        <p class="label-txt label-active">Password</p>
                        <img class="img-fluid log-icon" src="{{ asset('img/lock.svg') }}" alt="">
                        <input id="passwodfield" type="password" class="input input-active" name="password" required>
                        <img class="img-fluid show-eye" src="{{ asset('img/Eye.svg') }}" alt="">
                        <img class="img-fluid hide-eye" src="{{ asset('img/eyeclose.svg') }}" alt="">
                    </label>
                </div>
                <div class="form-group col-md-12">
                    @if (Route::has('password.request'))
                        <a class="forgot" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
                </div>
            </div>
            <button type="submit" class="send-btn">{{__('Log In')}}</button>
        </form>
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
    </x-auth-card>
</x-guest-layout>
