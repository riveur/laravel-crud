@extends('layouts.default')

@section('title', 'Edit Challenge')

@section('body')
    <section class="hero">
        <div class="hero-body pb-0">
            <p class="title">
                Edit
            </p>
            <p class="subtitle">
                Details of challenge
                {{ $challenge->id }}
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
                @include('challenges._form', [
                    'buttonLabel' => 'Update',
                    'edit' => true,
                    'link' => route('challenge.update', ['challenge' => $challenge]),
                    'challenge' => $challenge,
                ])
            </div>
        </div>
    </section>
@endsection
