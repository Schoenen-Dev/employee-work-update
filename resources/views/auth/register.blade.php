@extends('layouts.guest')

@section('title', 'Register')

@section('content')

<div class="login-page">

    <div class="glass-card">

        <div class="text-center mb-4">
            <h2>Create Account</h2>
            <p>Employee Work Update System</p>
        </div>

        <form>

            <div class="mb-3">
                <label class="form-label">Full Name</label>

                <div class="input-group">
                    <span class="input-group-text">
                        <i class="bi bi-person-fill"></i>
                    </span>

                    <input
                        type="text"
                        class="form-control"
                        placeholder="Enter your full name">
                </div>
            </div>

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
                        class="form-control"
                        placeholder="Create password">
                </div>
            </div>

            <div class="mb-4">
                <label class="form-label">Confirm Password</label>

                <div class="input-group">
                    <span class="input-group-text">
                        <i class="bi bi-shield-lock-fill"></i>
                    </span>

                    <input
                        type="password"
                        class="form-control"
                        placeholder="Confirm password">
                </div>
            </div>

            <button class="btn btn-primary w-100 mb-3">
                <i class="bi bi-person-plus-fill"></i>
                Register
            </button>

            <a href="{{ route('login') }}" class="btn btn-outline-light w-100">
                <i class="bi bi-box-arrow-in-right"></i>
                Already have an account? Login
            </a>

        </form>

    </div>

</div>

@endsection