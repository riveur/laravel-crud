@extends('layouts.default')

@section('title', 'Challenge index')

@section('body')
    <section class="hero">
        <div class="hero-body pb-0">
            <p class="title">
                Index
            </p>
            <p class="subtitle">
                List of your challenges
            </p>
        </div>
    </section>
    <section class="section">
        <nav class="level">
            <div class="level-left">
                <div class="level-item">
                    <a href="{{ route('challenge.create') }}" class="button is-primary">Create new</a>
                </div>
            </div>
        </nav>

        <div class="content">
            <div class="box">
                <table class="table is-striped is-hoverable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Point</th>
                            <th>Created at</th>
                            <th>Updated at</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    @forelse ($challenges as $challenge)
                        <tr>
                            <td>{{ $challenge->id }}</td>
                            <td>{{ $challenge->title }}</td>
                            <td>{{ $challenge->point }}</td>
                            <td>
                                {{ $challenge->created_at }}
                            </td>
                            <td>
                                {{ $challenge->updated_at }}
                            </td>
                            <td>
                                <div class="is-flex is-justify-content-center is-align-items-center">
                                    <a class="is-size-6 mx-1"
                                        href="{{ route('challenge.show', ['challenge' => $challenge]) }}">
                                        <i class="fa-regular fa-eye"></i>
                                    </a>
                                    <a class="is-size-6 mx-1"
                                        href="{{ route('challenge.edit', ['challenge' => $challenge]) }}">
                                        <i class="fa-regular fa-pen-to-square"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8">no records found</td>
                        </tr>
                    @endforelse
                </table>
            </div>
        </div>
    </section>
@endsection
