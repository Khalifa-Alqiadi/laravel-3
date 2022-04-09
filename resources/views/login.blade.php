@extends('layout.home')
@section('login')
<div class="container login-page">
        <h1 class="text-center">
            <span class="selected" data-class="login">Login</span> | 
            <span data-class="signup">Signup</span>
        </h1>
        <!-- Start Login Form -->
        <form class="login" action="{{route('login')}}" method="post">
        @csrf
            <div class="form-login-page">
                <input
                    title="Username Must Be 4 Characters"
                    class="form-control"
                    type="text" 
                    name="username"
                    autocomplete="off"
                    required
                    placeholder="Type Your Name" />
                    <div class='masg'>user name be empty</div>
            </div>
            <div class="form-login-page">
                <input 
                    class="form-control" 
                    type="password"
                    name="password"
                    autocomplete="new-password"
                    required
                    placeholder="Type Your Password" />
                    <div class='masg'>user name be empty</div>
            </div>
            <input class="btn btn-primary btn-block" type="submit" name="login" value="Login">
        </form>
        <!-- End Login Form -->
        <!-- Start Signup Form -->
        <form class="signup" action="{{route('register')}}" method="post">
        @csrf
            <div class="form-login-page">
                <input
                    class="form-control"
                    type="text" 
                    name="username"
                    autocomplete="off"
                    required
                    placeholder="Enter Your Name" />
            </div>
            <div class="form-login-page">
                <input
                    class="form-control" 
                    type="text"
                    name="email"
                    required
                    placeholder="Enter Your Email" />
            </div>
            <div class="form-login-page">
                <input 
                    class="form-control" 
                    type="password"
                    name="password"
                    autocomplete="new-password"
                    required
                    placeholder="Enter Complex Password" />
            </div>
            <input class="btn btn-success btn-block" id="send" type="submit" name="signup" value="Signup">
        </form>
        <!-- End Signup Form -->
        <div class="the-errors text-center">
        @if ($errors->any())
        @foreach ($errors->all() as $err)
        <p class="alert alert-danger">{{ $err }}</p>
            
        @endforeach
            
    @endif
        </div>
    </div>

@stop