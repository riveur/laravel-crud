@extends('layouts.default')

@section('title', 'Login')

@section('body')
    <section class="hero">
        <div class="hero-body pb-0 has-text-centered">
            <p class="title">Login</p>
            <p class="subtitle">Welcome, we are happy to see you again !</p>
        </div>
    </section>
    <section class="section">
        <div class="is-flex is-justify-content-center">
            <form method="post" class="box" style="min-width:50%">
                @csrf
                @error('username')
                    <div class="notification is-danger">
                        {{ $message }}
                    </div>
                @enderror
                <div class="field">
                    <label for="username" class="label">Username</label>
                    <div class="control">
                        <input type="text" id="username" name="username" class="input"
                            placeholder="admin, test, etc..." required>
                    </div>
                </div>
                <div class="field">
                    <label for="password" class="label">Password</label>
                    <div class="control">
                        <input type="password" id="password" name="password" class="input" placeholder="**********"
                            required>
                    </div>
                </div>
                <span>No account ?
                    <a href="{{ route('register') }}">Sign up</a>
                </span>
                <button type="submit" class="button is-primary is-pulled-right">Log in</button>
            </form>
        </div>
    </section>
@endsection
