@extends('layouts.app')

@section('content')
<div class="login-box">
  <div class="login-logo">
    <a href="{{ route('welcome') }}">{{ config('app.name') }}</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
  	<div class="card-header text-center">
        <h3>Reset Password</h3>
    </div>
    <div class="card-body login-card-body">
      <form method="POST" action="{{ route('password.update') }}">
      	@csrf

      	<input type="hidden" name="token" value="{{ $token }}">
      
      	<div class="form-group">
      		<label for="email">Email</label>
	      	<div class="input-group mb-3 has-feedback">
			    <div class="input-group-prepend">
			        <span class="input-group-text"><i class="fa fa-envelope"></i></span>
			    </div>
			    <input type="email" name="email" id="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Email" value="{{ old('email') }}" autofocus>

			    @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
			</div>
      	</div>
        
        <div class="form-group">
      		<label for="password">Password</label>
	      	<div class="input-group mb-3 has-feedback">
			    <div class="input-group-prepend">
			        <span class="input-group-text"><i class="fa fa-lock"></i></span>
			    </div>
			    <input type="password" name="password" id="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Password" value="{{ old('password') }}" autofocus>

			    @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
			</div>
      	</div>

      	<div class="form-group">
      		<label for="password_confirmation">Confirm Password</label>
	      	<div class="input-group mb-3 has-feedback">
			    <div class="input-group-prepend">
			        <span class="input-group-text"><i class="fa fa-lock"></i></span>
			    </div>
			    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Confirm Password" required>
			</div>
      	</div>
        <div class="form-group has-feedback">
            <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-unlock mr-3"></i>Reset Password</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
