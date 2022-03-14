@extends('admin.admin_layouts')

@section('admin_content')


<div class="d-flex align-items-center justify-content-center bg-sl-primary ht-md-100v">

    <div class="login-wrapper wd-300 wd-xs-400 pd-25 pd-xs-40 bg-white">
      <div class="signin-logo tx-center tx-24 tx-bold tx-inverse">Fly Buy <span class="tx-info tx-normal">admin</span></div>
      {{-- <div class="tx-center mg-b-60">Professional Admin Template Design</div> --}}

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
        <div class="form-group">
            <a class="registration" href="{{route('login')}}">Already have an account</a><br>
            <button type="submit" class="btn btn-info btn-block">Signup</button>
        </div>
    </form>

      <div class="mg-t-40 tx-center">Already have an account? <a href="page-signin.html" class="tx-info">Sign In</a></div>
    </div><!-- login-wrapper -->
  </div><!-- d-flex -->

@endsection
