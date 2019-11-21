@if($profile && !$profile->confirmed)
    <form action="{{ route('profile.update', ['profile' => $profile->id]) }}" method="POST">
        @csrf
        @method('post')
        <button type="submit" class="btn btn-warning">Confirm your Profile</button>
    </form>
    @elseif ($profile && Carbon::parse(now())->lessThan('2019-11-25 23:59:59'))
    <form action="{{ route('profile.destroy', ['profile' => $profile->id]) }}" method="POST">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-danger">Bow out</button>
    </form>
@endif