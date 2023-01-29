<form id="form-complete-{{ $challenge->id }}" class="is-hidden" method="post"
    action="{{ route('challenge.complete', ['challenge' => $challenge]) }}">
    @csrf
</form>
