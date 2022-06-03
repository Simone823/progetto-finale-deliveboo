@extends('layouts.app')

@section('metaTitle', 'Deliveboo - Reset password')

@section('content')
<div class="lost-psw container-md d-flex justify-content-center align-items-center">
    <div class="row justify-content-center">
        <div class="col-11 col-sm-8">
            <div class="card p-2 p-sm-4">
                <h2 class="fw-bold text-center ps-2 pe-2">Invia la mail per reimpostare la password</h2>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">

                            <div class="mb-4">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <button class="btn-standard btn-green_1 w-100" type="submit" class="btn btn-primary">
                                {{ __('Invia') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
