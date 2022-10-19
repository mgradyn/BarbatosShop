@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-5 col-xl-5">
                <div class="card">
                    <h5 class="card-header text-center">{{ __('Register') }}</h5>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}" id="registration_form">
                            @csrf

                            <div class="row mb-3">
                                <label for="name" class="mb-1">{{ __('Name') }}</label>

                                <div>
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" autocomplete="name" autofocus
                                        placeholder="Enter Your Name">

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email" class="mb-1">{{ __('Email Address') }}</label>

                                <div>
                                    <input id="email" type="text"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" autocomplete="email" placeholder="Enter Your Email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password" class="mb-1">{{ __('Password') }}</label>

                                <div>
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        autocomplete="new-password" placeholder="Enter Your Password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password-confirm" class="mb-1">{{ __('Confirm Password') }}</label>

                                <div>
                                    <input id="password-confirm" type="password"
                                        class="form-control @error('password') is-invalid @enderror"
                                        name="password_confirmation" autocomplete="new-password"
                                        placeholder="Re-type Your Password">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="gender" class="mb-1">{{ __('Gender') }}</label>
                                <div>
                                    <div class="input-group-prepend @error('gender') is-invalid @enderror">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="gender" id="male"
                                                value="male" autocomplete="gender" />
                                            <label class="form-check-label" for="male">Male</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="gender" id="female"
                                                value="female" autocomplete="gender" />
                                            <label class="form-check-label" for="female">Female</label>
                                        </div>
                                    </div>
                                    @error('gender')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="date_of_birth" class="mb-1">{{ __('Date of Birth') }}</label>
                                <div>
                                    <input type="date" class="form-control @error('date_of_birth') is-invalid @enderror"
                                        autocomplete="date_of_birth" name="date_of_birth" id="date_of_birth">
                                    @error('date_of_birth')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                            </div>

                            <div class="row mb-3">
                                <label for="country" class="mb-1">{{ __('Country') }}</label>
                                <div>
                                    <div class="input-group @error('country') is-invalid @enderror">
                                        <select id="inputState" class="form-select" name="country" autocomplete="country"
                                            form="registration_form">
                                            <option selected disabled value="">Choose a country</option>
                                            <option value="...">...</option>
                                        </select>
                                    </div>
                                    @error('country')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="row mb-3">
                                <div class="col text-center">
                                    <button type="submit" class="btn btn-outline-secondary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>



                            <div class="row mb-0">
                                <p>Have an account? <a href="{{ route('login') }}">Login
                                        Here</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
