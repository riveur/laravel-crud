<form name="challenge" method="post" action="{{ $link }}">
    @csrf
    @if ($edit)
        @method('PUT')
    @endif
    <div class="field">
        <label for="challenge_title" class="label required">Title</label>
        <div class="control">
            <input type="text" id="challenge_title" name="title" class="input @error('title') is-danger @enderror"
                value="{{ $challenge->title ?? '' }}">
        </div>
        @error('title')
            <p class="help is-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="field">
        <label for="challenge_description" class="label required">Description</label>
        <div class="control">
            <textarea class="textarea @error('description') is-danger @enderror" id="challenge_description" name="description">{{ $challenge->description ?? '' }}</textarea>
        </div>
        @error('description')
            <p class="help is-danger">{{ $message }}</p>
        @enderror
    </div>

    <div class="field">
        <label for="challenge_point" class="label required">Point</label>
        <div class="control">
            <input type="number" id="challenge_point" name="point" class="input @error('point') is-danger @enderror"
                value="{{ $challenge->point ?? '' }}">
        </div>
        @error('point')
            <p class="help is-danger">{{ $message }}</p>
        @enderror
    </div>
    <button class="button is-success">{{ $buttonLabel ?? 'Save' }}</button>
</form>
