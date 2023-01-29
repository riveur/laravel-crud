@extends('layouts.default')

@section('title', 'Challenge')

@section('body')
    <section class="hero">
        <div class="hero-body pb-0">
            <p class="title">Show</p>
            <p class="subtitle">
                Detail of challenge
                {{ $challenge->id }}</p>
        </div>
    </section>
    <section class="section">
        <nav class="level">
            <div class="level-left">
                <div class="level-item">
                    <a href="{{ route('challenge.index') }}" class="button is-primary">Back to list</a>
                </div>
            </div>
            <div class="level-right">
                <div class="level-item">
                    <a href="{{ route('challenge.edit', ['challenge' => $challenge]) }}" class="button is-info">Edit</a>
                </div>
                <div class="level-item">@include('challenges._delete_form', ['challenge' => $challenge])</div>
            </div>
        </nav>

        <div class="content">
            <div class="box">
                <table class="table is-striped is-hoverable">
                    <tbody>
                        <tr>
                            <td>#</td>
                            <td>{{ $challenge->id }}</td>
                        </tr>
                        <tr>
                            <td>Title:</td>
                            <td>{{ $challenge->title }}</td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <div class="content">
                                    <h5>Description:</h5>
                                    <p>{!! nl2br($challenge->description) !!}</p>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Point:</td>
                            <td>{{ $challenge->point }}</td>
                        </tr>
                        <tr>
                            <td>Created by:</td>
                            <td>{{ $challenge->author->username }}</td>
                        </tr>
                        <tr>
                            <td>Created at:</td>
                            <td>{{ $challenge->created_at }}</td>
                        </tr>
                        <tr>
                            <td>Updated at:</td>
                            <td>{{ $challenge->updated_at }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
