@if (!$profile)
    <form action="{{ route('profile.store') }}" method="post">
        @csrf
        @method('POST')
        <input type="hidden" name="group_id" value="{{ $group->id }}">
        <div class="form-group">
            <label for="full_name">Full name</label>
            <input type="text" class="form-control" id="full_name" name="full_name" required>
            <small id="codeHelp" class="form-text text-muted d-block">Please note your full name is <strong>required</strong> to legally ship an package, however to protect your ID; you are more than welcome to use a pseudonym. But you accept liability that you may not receive your package(s)</small>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="address">Address 1</label>
                    <input type="text" class="form-control" id="address" name="address" required>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="address_opt">Address 2</label>
                    <input type="text" class="form-control" id="address_opt" name="address_opt">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="city">City</label>
                    <input type="text" class="form-control" id="city" name="city" required>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="state">State</label>
                    <input type="text" class="form-control" id="state" name="state">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-8">
                <div class="form-group">
                    <label for="country">Country</label>
                    <input type="text" class="form-control" id="country" name="country" required>
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="zip">ZIP / Postal</label>
                    <input type="text" class="form-control" id="zip" name="zip" required>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="bio">Bio</label>
            <textarea id="bio" name="bio" class="form-control" rows="6"></textarea>
        </div>
        <button type="submit" class="btn btn-success">Create Profile</button>
    </form>
@endif