@extends('layouts.template')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header bg-primary-subtle">
                        <h4 class="mb-0">Ayo Login Sekarang!</h4>
                    </div>
                    <div class="card-body p-6 d-flex align-items-center">
                        <form action="{{ route('login.auth') }}" method="POST" class="w-100">
                            @csrf
                            @if (Session::get('failed'))
                                <div class="alert alert-danger">{{ Session::get('failed') }}</div>
                            @endif
                            @if (Session::get('logout'))
                                <div class="alert alert-primary">{{ Session::get('logout') }}</div>
                            @endif
                            @if (Session::get('canAccess'))
                                <div class="alert alert-danger">{{ Session::get('canAccess') }}</div>
                            @endif
                            <div class="mb-4">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" id="email" class="form-control" required>
                                @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" id="password" class="form-control" required>
                                @error('password')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            {{-- <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                                <label class="form-check-label" for="remember">Remember me</label>
                            </div> --}}
                            <button type="submit" class="btn bg-primary-subtle w-100">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
