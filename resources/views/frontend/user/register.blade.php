@extends('frontend.layout.frontend_master')
@section('main')
    <style>


        .form-signin {
            width: 100%;
            max-width: 330px;
            padding: 15px;
            margin: auto;
        }
        .form-signin .checkbox {
            font-weight: 400;
        }
        .form-signin .form-control {
            position: relative;
            box-sizing: border-box;
            height: auto;
            padding: 10px;
            font-size: 16px;
        }
        .form-signin .form-control:focus {
            z-index: 2;
        }
        .form-signin input[type="email"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }
        .form-signin input[type="password"] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }
    </style>
    <form class="form-signin">
        <img class="mb-4" src="{{asset('img/bootstrap-solid.svg')}}" alt="" width="72" height="72" style="margin-left: 104px">
        <h1 class="h3 mb-3 font-weight-normal text-center">Please Register</h1>
        <label for="name" class="sr-only">Your Name</label>
        <input type="text" id="name" name="name" class="form-control" placeholder="Your Name" required autofocus>
        <label for="phone_number" class="sr-only">Your Mobile</label>
        <input type="number" id="phone_number" name="phone_number" class="form-control" placeholder="Your Phone Number" required autofocus>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <div class="checkbox mb-3">
            <label>
                <input type="checkbox" value="remember-me"> Remember me
            </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
    </form>
@stop
