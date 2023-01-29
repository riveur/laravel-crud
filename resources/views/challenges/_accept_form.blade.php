<form id="form-accept-{{ $challenge->id }}" class="is-hidden" method="post"
    action="{{ route('challenge.accept', ['challenge' => $challenge]) }}"
    onsubmit="return confirm('Are you sure you want to accept this challenge ?');">
    @csrf
</form>
<a onclick="document.querySelector('#form-accept-{{ $challenge->id }}').submit()" class="card-footer-item">Accept</a>
