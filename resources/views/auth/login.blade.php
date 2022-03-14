<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/styles/contact_styles.css')}} ">
<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/sstyles/contact_responsive.css')}}">
@extends('layouts.app')

@section('content')
<style>
  bor{
    border: 2px, solid;
    color: gray;
    border-radius: 10px;
    
  }
</style>

<div class="contact_form">
  <div class="container">
    <div class="row">
      <div class="col-lg-5 offset-lg-1" style="border-radius: 10px; border:2px solid gray; padding:20px;">
        <div class="contact_form_container ">
          <div class="contact_form_title text-center">Sign In</div>

          <form action="{{route('login')}} " method="POST" id="contact_form">
            @csrf
            <div class="form-group icon_parent">
              <label for="email">E-mail</label>
              <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email Address">
  
              @error('email')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
              <span class="icon_soon_bottom_right"><i class="fas fa-envelope"></i></span>
          </div>
          <div class="form-group icon_parent">
            <label for="password">Password</label>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <span class="icon_soon_bottom_right"><i class="fas fa-unlock"></i></span>
        </div>
              <a href="{{route('password.request')}} ">I forgot my password</a>
          
            <div class="contact_form_button">
              <button type="submit" class="button contact_submit_button">Log In</button>

              <br>
              <br>
              {{-- <button class="btn btn-primary btn-block"> <i class="fab fa-facebook"></i> LogIn with Facebook</button> --}}
              <a href="{{ url('auth/redirect/google') }}" class="btn btn-danger btn-block"> <i class="fab fa-google"></i> LogIn with Google</a> 
            </div>
            {{-- url('/auth/redirect/google')  --}}
          </form>

        </div>
      </div>
      <div class="col-lg-5 offset-lg-1" style="border-radius: 10px; border:2px solid gray; padding:20px;">
        <div class="contact_form_container">
          <div class="contact_form_title text-center">Sign Up</div>
          <form action="{{route('register')}}" method="post">
            @csrf
            <div class="form-group icon_parent">
                <label for="uname">Username</label>
               <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Full Name">
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <span class="icon_soon_bottom_right"><i class="fas fa-user"></i></span>
            </div>
            <div class="form-group icon_parent">
                <label for="email">E-mail</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email Address">
    
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <span class="icon_soon_bottom_right"><i class="fas fa-envelope"></i></span>
            </div>
            <div class="form-group icon_parent">
                <label for="email">Phone</label>
                <input id="phone" type="tel" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" placeholder="Email Phone">
    
                @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <span class="icon_soon_bottom_right"><i class="fas fa-envelope"></i></span>
            </div>
         
            <div class="form-group icon_parent">
                <label for="password">Password</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
    
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <span class="icon_soon_bottom_right"><i class="fas fa-unlock"></i></span>
            </div>
            <div class="form-group icon_parent">
                <label for="rtpassword">Re-type Password</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                <span class="icon_soon_bottom_right"><i class="fas fa-unlock"></i></span>
            </div>
            {{-- <div class="form-group icon_parent">
              <label for="password" class="bold">Avatar</label> <br>
              <input type="file" name="avatar" placeholder="Choose Avatar">

            </div> --}}

            <div class="form-group">
                <button type="submit" class="btn btn-info btn-block">Signup</button>
            </div>
        </form>

        </div>
      </div>
    </div>
  </div>
  <div class="panel"></div>
</div>
@endsection
