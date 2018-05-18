@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Register') }}
                </div>

                <div class="card-body">
                    <form method="POST" class="row" action="{{ route('register') }}">
                        @csrf
                        
                        <div class="col-md-6">
                            <h3 class="offset-md-4 pl-2 mb-2"><b>Account Details</b></h3>
                            <div class="form-group row">
                                <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>
    
                                <div class="col-md-7">
                                    <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required autofocus>
    
                                    @if ($errors->has('username'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('username') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="email_address" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
    
                                <div class="col-md-7">
                                    <input id="email_address" type="email_address" class="form-control{{ $errors->has('email_address') ? ' is-invalid' : '' }}" name="email_address" value="{{ old('email_address') }}" required>
    
                                    @if ($errors->has('email_address'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('email_address') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
    
                                <div class="col-md-7">
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
    
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
    
                                <div class="col-md-7">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <h3 class="offset-md-2 mb-2"><b>Shop Details</b></h3>

                            <div class="form-group row">
                                <label for="shop_name" class="col-md-2 px-0 col-form-label">{{ __('Shop Name') }}</label>
    
                                <div class="col-md-9 pl-1">
                                    <input id="shop_name" type="text" class="form-control{{ $errors->has('shop_name') ? ' is-invalid' : '' }}" name="shop_name" value="{{ old('shop_name') }}" required autofocus>
    
                                    @if ($errors->has('shop_name'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('shop_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="shop_address" class="col-md-2 px-0 col-form-label">{{ __('Address') }}</label>
    
                                <div class="col-md-9 pl-1">
                                    <input id="shop_address" type="text" class="form-control{{ $errors->has('shop_address') ? ' is-invalid' : '' }}" name="shop_address" value="{{ old('shop_address') }}" required autofocus>
    
                                    @if ($errors->has('shop_address'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('shop_address') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="contact_number" class="col-md-2 px-0 col-form-label">{{ __('Contact No.') }}</label>
    
                                <div class="col-md-9 pl-1">
                                    <input id="contact_number" type="text" class="form-control{{ $errors->has('contact_number') ? ' is-invalid' : '' }}" name="contact_number" value="{{ old('contact_number') }}" required autofocus>
    
                                    @if ($errors->has('contact_number'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('contact_number') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="Shop Logo" class="col-md-2 px-0 col-form-label">{{ __('Shop Logo') }}</label>
                            </div>
    
                            
                        </div>
                        
    
                        <div class="form-group col-md-12 text-right" style="padding-right: 60px">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
