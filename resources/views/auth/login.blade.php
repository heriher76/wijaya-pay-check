@extends('layouts.app')

@section('content')
<div class="login-box">
  <div class="login-logo">
    <a href="{{ route('welcome') }}">Selamat Datang</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
  	<div class="card-header text-center">
        <h3>Silakan Login </h3>
    </div>
    <div class="card-body login-card-body">
      @if ($errors->has('forbidden'))
          <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('forbidden') }}</strong>
          </span>
      @endif
      <form method="POST" action="{{ route('login') }}">
      	@csrf
      
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
			    <input type="password" name="password" id="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Password">

			    @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
			</div>
		</div>

        <div class="form-group has-feedback">
            <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-unlock mr-3"></i>Masuk</button>
        </div>
      </form>
        <hr>
    </div>
  </div>
</div>
@endsection
