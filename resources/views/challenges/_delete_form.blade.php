<form method="post" action="{{ route('challenge.destroy', ['challenge' => $challenge]) }}"
    onsubmit="return confirm('Are you sure you want to delete this item?');">
    @csrf
    @method('DELETE')
    <button type="submit" class="button is-danger">Delete</button>
</form>
