@if($group->profile)
    <form action="{{ route('wishlist.store') }}" method="POST">
        @csrf
        @method('post')
        <input type="hidden" name="profile_id" value="{{ $group->profile->id }}">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="url">URL</label>
                    <input type="text" class="form-control" id="url" name="url" required>
                </div>
            </div>
            <div class="col-md-12">
                <label for="url">Notes</label>
                <div class="input-group mb-2">
                    <input type="text" name="notes" id="notes" class="form-control" placeholder="I want this but make sure its a xl...">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit">Add item</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endif