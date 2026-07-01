@extends('layouts.guest')

@section('title', 'Login')

@section('content')

<div class="login-page">

    <div class="glass-card">

        <div class="text-center mb-4">
            <h2>Employee Work Update</h2>
            <p>Sign in to continue</p>
        </div>

        <form>

       <div class="mb-3">
    <label class="form-label">Email</label>

    <div class="input-group">

        <span class="input-group-text">
            <i class="bi bi-envelope-fill"></i>
        </span>

        <input
            type="email"
            class="form-control"
            placeholder="Enter your email">

    </div>
</div>

          <div class="mb-3">

    <label class="form-label">Password</label>

    <div class="input-group">

        <span class="input-group-text">
            <i class="bi bi-lock-fill"></i>
        </span>

        <input
            type="password"
            id="password"
            class="form-control"
            placeholder="Enter your password">

        <button
            class="btn btn-light"
            type="button"
            id="togglePassword">

            <i class="bi bi-eye"></i>

        </button>

    </div>

</div>

            <div class="d-flex justify-content-between mb-4">

                <div>
                    <input type="checkbox">
                    Remember Me
                </div>

                <a href="#">Forgot Password?</a>

            </div>

            <button class="btn btn-primary w-100">
                Login
            </button>

<div class="text-center mt-4">

    <p class="mb-2 text-white">
        Don't have an account?
    </p>

    <a href="{{ route('register') }}" class="btn btn-outline-light w-100">
        <i class="bi bi-person-plus-fill"></i>
        Create Account
    </a>

</div>

        </form>

    </div>

</div>

@endsection