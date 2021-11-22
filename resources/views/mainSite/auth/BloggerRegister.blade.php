@extends('layouts.mainSiteAuth')

@section('content')
{{--Register--}}
<section class="Form my-4 mx-5">
    <div class="container">
        <div class="row no-gutters">
            <div class="col-lg-5">
                <img src="{{asset('img/login.jpg')}}" class="img-fluid" alt="">
            </div>
            <div class="col-lg-7 px-5 pt-5 mt-5">
                <h1 class="fw-bold py-3">Blogger</h1>
                <h4>Create your account</h4>
                <form  method="POST" action="{{route('blogger.signup')}}">
                @csrf
                    <div class="form-row">
                        <div class="col-lg-7">
                            <input type="name" class="form-control my-3 p-3" placeholder="Enter your name" name="name">
                            @if($errors->has('name'))
                                <div class="alert-danger">{{ $errors->first('name') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-lg-7">
                            <input type="email" class="form-control my-3 p-3" placeholder="Enter your email address" name="email">
                            @if($errors->has('email'))
                                <div class="alert-danger">{{ $errors->first('email') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-lg-7">
                            <input type="password" class="form-control my-3 p-3" placeholder="Enter your password" name="password">
                            @if($errors->has('password'))
                                <div class="alert-danger">{{ $errors->first('password') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-lg-7">
                            <input type="password" class="form-control my-3 p-3" placeholder="Confirm password" name="ConfirmationPassword">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-lg-7">
{{--                            <button type="submit" class="">Register</button>--}}
                            <input type="submit" value="Register" class="btn1 mb-5">
                        </div>
                    </div>
                    <p>Already have an account? <a href="{{route('blogger.login')}}" class="link1">You can go back and login.</a></p>
                </form>
            </div>
        </div>
    </div>
</section>


@endsection
