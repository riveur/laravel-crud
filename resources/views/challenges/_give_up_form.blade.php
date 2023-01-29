<form id="form-give-up-{{ $challenge->id }}" class="is-hidden" method="post"
    action="{{ route('challenge.give_up', ['challenge' => $challenge]) }}"
    onsubmit="return confirm('Are you sure you want to give up this challenge ?');">
    @csrf
</form>
