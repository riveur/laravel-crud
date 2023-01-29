@extends('layouts.default')

@section('title', 'Register')

@section('body')
    <section class="hero">
        <div class="hero-body pb-0 has-text-centered">
            <p class="title">Register</p>
            <p class="subtitle">Welcome, we are happy to see you !</p>
        </div>
    </section>
    <section class="section">
        <div class="is-flex is-justify-content-center">
            <form method="post" class="box" style="min-width:50%">
                @csrf
                <div class="field">
                    <label for="username" class="label">Username</label>
                    <div class="control">
                        <input type="text" id="username" name="username"
                            class="input @error('username') is-danger @enderror" placeholder="admin, test, etc..." required>
                    </div>
                    @error('username')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="field">
                    <label for="password" class="label">Password</label>
                    <div class="control">
                        <input type="password" id="password" name="password"
                            class="input @error('password') is-danger @enderror" placeholder="**********" required>
                    </div>
                    @error('password')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="field">
                    <label for="password-confirm" class="label">Confirm password</label>
                    <div class="control">
                        <input type="password" id="password-confirm" name="password_confirmation" class="input"
                            placeholder="**********" required>
                    </div>
                </div>
                <span>Already have an account ?
                    <a href="{{ route('login') }}">Log in</a>
                </span>
                <button type="submit" class="button is-primary is-pulled-right">Sign up</button>
            </form>
        </div>
    </section>
@endsection
