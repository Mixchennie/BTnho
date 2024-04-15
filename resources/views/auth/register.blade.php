@extends('layout.master')
@section('content')
    {{-- <x-auth-validation-errors class="mb-4" :errors="$errors" /> --}}
	<div class="container">
        {{-- <x-auth-validation-errors class="mb-4" :errors="$errors" /> --}}
        <form action="#" method="post" class="beta-form-checkout">
            @csrf
            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-6">
                    <h4>Đăng kí</h4>
                    <div class="space20">&nbsp;</div>

                    
                    <div class="form-block">
                        <label for="email">Email address*</label>
                        <input type="email" id="email" name="email" :value="old('email')" >
                    </div>

                    <div class="form-block">
                        <label for="your_last_name">Name*</label>
                        <input type="text" id="your_last_name" name="name" :value="old('name')">
                    </div>

                    <div class="form-block">
                        <label for="phone">Password*</label>
                        <input type="text" id="phone" type="password" name="password" >
                    </div>
                    <div class="form-block">
                        <label for="phone">Re password*</label>
                        <input type="text" id="phone" type="password" name="password_confirmation" >
                    </div>
                    <div class="form-block">
                        <button type="submit" class="btn btn-primary">Register</button>
                    </div>
                </div>
                <div class="col-sm-3"></div>
            </div>
        </form>
    </div>

@endsection
