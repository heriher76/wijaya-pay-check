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
    	@if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <form method="POST" action="{{ route('password.email') }}">
	      	@csrf
	      
	      	<div class="form-group">
	      		<label for="email">Alamat Email</label>
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
	        <div class="form-group has-feedback">
	            <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-check mr-3"></i>Kirim Password Reset Link</button>
	        </div>
        </form>
    </div>
  </div>
</div>
@endsection
