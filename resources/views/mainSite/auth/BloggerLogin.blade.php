@extends('layouts.mainSiteAuth')

@section('content')
    {{--    Login--}}
    <section class="Form my-4 mx-5">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-lg-5">
                    <img src="{{asset('img/login.jpg')}}" class="img-fluid" alt="">
                </div>
                <div class="col-lg-7 px-5 pt-5 mt-5">
                    <h1 class="fw-bold py-3">Blogger</h1>
                    <h4>Sign in into your account</h4>
                    <form method="POST" action="{{route('blogger.signin')}}">
                    @csrf
                        <div class="form-row">
                            <div class="col-lg-7">
                                <input type="email"  name="email" class="form-control my-3 p-3" placeholder="Enter your email address">
                                @if($errors->has('email'))
                                    <div class="alert alert-danger">{{ $errors->first('email') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-lg-7">
                                <input type="password"  name="password" class="form-control my-3 p-3" placeholder="Enter your password">
                                @if($errors->has('password'))
                                    <div class="alert alert-danger">{{ $errors->first('password') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-lg-7">
                                <button type="submit" class="btn1 mb-5">Login</button>
                            </div>
                        </div>
                        <a href="#" class="link1">Forgot Password?</a>
                        <p>Don't have an account? <a href="{{route('blogger.register')}}" class="link1">You can register here.</a></p>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection
