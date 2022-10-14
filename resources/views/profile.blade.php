@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-5 col-xl-5">
                <div class="card">
                    <h5 class="card-header text-center">{{ __('Profile') }}</h5>

                    <div class="card-body">
                        <form id="profile_form">
                            @csrf

                            <div class="row mb-3">
                                <label for="name" class="mb-1">{{ __('Name') }}</label>

                                <div>
                                    <input id="name" type="text" class="form-control" name="name" disabled
                                        placeholder={{ Auth::user()->name }}>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email" class="mb-1">{{ __('Email Address') }}</label>

                                <div>
                                    <input id="email" type="text" class="form-control" name="email" disabled
                                        placeholder={{ Auth::user()->email }}>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="gender" class="mb-1">{{ __('Gender') }}</label>

                                <div>
                                    <input id="gender" type="text" class="form-control" name="gender" disabled
                                        placeholder={{ Auth::user()->gender }}>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="date_of_birth" class="mb-1">{{ __('Date of Birth') }}</label>

                                <div>
                                    <input id="date_of_birth" type="text" class="form-control" name="date_of_birth"
                                        disabled placeholder={{ Auth::user()->date_of_birth }}>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="country" class="mb-1">{{ __('Country') }}</label>

                                <div>
                                    <input id="country" type="text" class="form-control" name="country" disabled
                                        placeholder={{ Auth::user()->country }}>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
