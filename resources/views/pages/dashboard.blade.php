@extends('layouts.default')

@section('title', 'Dashboard')

@section('body')
    <section class="section pb-0">
        <a href="{{ route('challenge.create') }}" class="button is-light">
            <span class="icon is-small">
                <i class="fas fa-circle-plus"></i>
            </span>
            <span>Create a new challenge</span>
        </a>
    </section>
    <section class="section">
        <h1 class="title">Active challenges</h1>
        <h2 class="subtitle">These are all your active challenges, complete them !</h2>
        @if (count($activeChallenges) === 0)
            <p class="tag is-warning is-medium">You no longer have any active challenges.</p>
        @else
            <div class="columns is-multiline">
                @foreach ($activeChallenges as $challenge)
                    <div class="column is-full">
                        @include('challenges._card', ['challenge' => $challenge, 'accepted' => true])
                    </div>
                @endforeach
            </div>
        @endif
        <div class="content mt-4 pb-0">
            <button type="button" class="button is-light" data-toggle="toggle" data-target="#completed-challenges">
                <span class="icon is-small">
                    <i class="fas fa-eye"></i>
                </span>
                <span>Show completed challenges</span>
            </button>
            <div id="completed-challenges" style="display: none;">
                <table class="mt-4 table is-full-width is-hoverable">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($completedChallenges) === 0)
                            <tr>
                                <td rowspan="2">No results found.</td>
                            </tr>
                        @else
                            @foreach ($completedChallenges as $challenge)
                                <tr>
                                    <td>{{ $challenge->title }}</td>
                                    <td>{{ $challenge->description }}</td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <hr>
    <section class="section">
        <h1 class="title">Challenges available</h1>
        <h2 class="subtitle">These are all challenges created by community !</h2>
        @if (count($inactiveChallenges) === 0)
            <p class="tag is-warning is-medium">No challenge available, come back later.</p>
        @else
            <div class="columns is-multiline">
                @foreach ($inactiveChallenges as $challenge)
                    <div class="column is-full">
                        @include('challenges._card', ['challenge' => $challenge, 'accepted' => false])
                    </div>
                @endforeach
            </div>
        @endif
    </section>
@endsection
