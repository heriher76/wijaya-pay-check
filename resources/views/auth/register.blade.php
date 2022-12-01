@extends('layouts.app')

@section('content')
<div class="register-box">

    <div class="card">
        <div class="card-header text-center">
            <h3>Silakan Daftar</h3>
        </div>
        <div class="card-body register-card-body">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="form-group">
                    <label for="nrp">NRP</label>
                    <div class="input-group mb-3 has-feedback">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-user"></i></span>
                        </div>
                        <input type="text" name="nrp" id="nrp"
                            class="form-control{{ $errors->has('nrp') ? ' is-invalid' : '' }}" placeholder="NRP"
                            value="{{ old('nrp') }}" autofocus>

                        @if ($errors->has('nrp'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('nrp') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label for="nama">Nama Lengkap</label>
                    <div class="input-group mb-3 has-feedback">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-user"></i></span>
                        </div>
                        <input type="text" name="nama" id="nama"
                            class="form-control{{ $errors->has('nama') ? ' is-invalid' : '' }}"
                            placeholder="Nama Lengkap" value="{{ old('nama') }}" autofocus>

                        @if ($errors->has('nama'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('nama') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <div class="input-group mb-3 has-feedback">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                        </div>
                        <input type="email" name="email" id="email"
                            class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Email"
                            value="{{ old('email') }}" autofocus>

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
                        <input type="password" name="password" id="password"
                            class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                            placeholder="Password" value="{{ old('password') }}" autofocus>

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
                        <input type="password" name="password_confirmation" id="password_confirmation"
                            class="form-control" placeholder="Confirm Password" required>
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">
                        <!-- <i class="fa fa-check mr-3"></i> -->
                        Daftar
                    </button>
                </div>
            </form>

            <hr>
            <div class="social-auth-links text-center mb-3">
                <a href="{{ route('login') }}" class="btn btn-block btn-success">
                    Sudah Memiliki Akun ? Login klik Disini
                </a>
            </div>

        </div>
    </div>
</div>
@endsection