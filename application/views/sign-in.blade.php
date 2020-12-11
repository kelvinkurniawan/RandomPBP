@extends('layouts.authentication')

@section('content')
    <div class="container d-flex align-items-center justify-content-center h-100 pt-3 mt-5">
        <div class="row col-md-10">
            <div class="col-md-6 bg-randomize-2 py-4 elevation d-flex">
                <div class="w-100 d-flex flex-column justify-content-center align-items-center px-2">
                    <h2 class="mb-3 text-center text-white">Welcome, dude!</h2>
                    <p class="lead text-white text-center">Enter your personal details, and start journey with us</p>
                    <a href="{{base_url('session/createaccount')}}" class="btn btn-randomize btn-ghost">Sign Up</a>
                </div>
            </div>
            <div class="col-md-6 bg-white elevation py-4">
                <div class="px-2">
                    <div class="py-3">
                        <h2>{{ $title }}</h2>
                    </div>
                    <form action="<?=base_url('/authentication/perform_login')?>" method="post">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Check me out</label>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block btn-randomize">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection