@if ($group->profile)
    <div class="row">
        <div class="col-12">
            <label class="d-block font-weight-bold mb-0">Full name</label>
            <span>{{ $group->profile->full_name }}</span>
        </div>
    </div>
    <div class="row mt-1">
        <div class="col-4">
            <label class="d-block font-weight-bold mb-0">Address 1</label>
            <span>{{ $group->profile->address }}</span>
        </div>
        <div class="col-4">
            <label class="d-block font-weight-bold mb-0">Address 2</label>
            <span>{{ $group->profile->address_opt }}</span>
        </div>
    </div>
    <div class="row mt-1">
        <div class="col-4">
            <label class="d-block font-weight-bold mb-0">City</label>
            <span>{{ $group->profile->city }}</span>
        </div>
        <div class="col-4">
            <label class="d-block font-weight-bold mb-0">State</label>
            <span>{{ $group->profile->state }}</span>
        </div>
    </div>
    <div class="row mt-1">
        <div class="col-4">
            <label class="d-block font-weight-bold mb-0">Country</label>
            <span>{{ $group->profile->address }}</span>
        </div>
        <div class="col-4">
            <label class="d-block font-weight-bold mb-0">Zip / Postal</label>
            <span>{{ $group->profile->zip }}</span>
        </div>
    </div>
    <div class="row mt-1">
        <div class="col">
            <label class="d-block font-weight-bold mb-0">Bio</label>
            <p>
                {{ $group->profile->bio }}
            </p>
        </div>
    </div>
@endif