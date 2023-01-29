<div class="card">
    <div class="card-header">
        <p class="card-header-title">
            {{ $challenge->title }}
        </p>
    </div>
    <div class="card-content">
        <div class="content">
            {!! nl2br($challenge->description) !!}
        </div>
        <p>
            <i class="fas fa-user"></i> Author:
            @if (auth()->user()->id === $challenge->author_id)
                you
            @else
                {{ $challenge->author->username }}
            @endif
        </p>
        <p><i class="fas fa-calendar"></i> Created at:
            {{ $challenge->created_at }}</p>
    </div>
    <div class="card-footer">
        @if ($accepted)
            @include('challenges._complete_form', ['challenge' => $challenge])
            <a onclick="document.querySelector('#form-complete-{{ $challenge->id }}').submit()"
                class="card-footer-item">Complete</a>
            @include('challenges._give_up_form', ['challenge' => $challenge])
            <a onclick="document.querySelector('#form-give-up-{{ $challenge->id }}').submit()"
                class="card-footer-item">Give up</a>
        @else
            @include('challenges._accept_form')
        @endif
    </div>
</div>
