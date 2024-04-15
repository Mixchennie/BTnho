@extends('layout.master')
@section('content')

<div class="container">
    <div id="content">
        {{-- <x-auth-session-status class="mb-4" :status="session('status')" /> --}}
        {{-- <x-auth-validation-errors class="mb-4" :errors="$errors" /> --}}
        <form action="#" method="post" class="beta-form-checkout">
            @csrf
            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-6">
                    <h4>Đăng nhập</h4>
                    <div class="space20">&nbsp;</div>

                    
                    <div class="form-block">
                        <label for="email">Email address*</label>
                        <input type="email" id="email" name="email" :value="old('email')">
                    </div>
                    <div class="form-block">
                        <label for="phone">Password*</label>
                        <input type="text" id="phone"  name="password" >
                    </div>
                    <div class="form-block">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                </div>
                <div class="col-sm-3"></div>
            </div>
        </form>
    </div> <!-- #content -->
</div>
       
       
@endsection