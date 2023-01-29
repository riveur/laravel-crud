@extends('layouts.default')

@section('title', 'New Challenge')

@section('body')
    <section class="hero">
        <div class="hero-body pb-0">
            <p class="title">
                New
            </p>
            <p class="subtitle">
                Create a new challege
            </p>
        </div>
    </section>
    <section class="section">
        <div class="content">
            <nav class="level">
                <div class="level-left">
                    <div class="level-item">
                        <a href="{{ route('challenge.index') }}" class="button is-primary">Back to list</a>
                    </div>
                </div>
            </nav>
            <div class="box">
                @include('challenges._form', ['link' => route('challenge.store'), 'edit' => false])
            </div>
        </div>
    </section>
@endsection
