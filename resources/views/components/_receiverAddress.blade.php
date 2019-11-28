@if ($receiver)
    <div class="row">
        <div class="col-12">
            <label class="d-block font-weight-bold mb-0">Full name</label>
            <span>{{ $receiver->full_name }}</span>
        </div>
    </div>
    <div class="row mt-1">
        <div class="col-8">
            <label class="d-block font-weight-bold mb-0">Address 1</label>
            <span>{{ $receiver->address }}</span>
        </div>
        <div class="col-4">
            <label class="d-block font-weight-bold mb-0">Address 2</label>
            <span>{{ $receiver->address_opt }}</span>
        </div>
    </div>
    <div class="row mt-1">
        <div class="col-6">
            <label class="d-block font-weight-bold mb-0">City</label>
            <span>{{ $receiver->city }}</span>
        </div>
        <div class="col-6">
            <label class="d-block font-weight-bold mb-0">State</label>
            <span>{{ $receiver->state }}</span>
        </div>
    </div>
    <div class="row mt-1">
        <div class="col-6">
            <label class="d-block font-weight-bold mb-0">Country</label>
            <span>{{ $receiver->country }}</span>
        </div>
        <div class="col-6">
            <label class="d-block font-weight-bold mb-0">Zip / Postal</label>
            <span>{{ $receiver->zip }}</span>
        </div>
    </div>
    <div class="row mt-1">
        <div class="col">
            <label class="d-block font-weight-bold mb-0">Bio</label>
            <p>
                {!! nl2br($receiver->bio)!!}
            </p>
        </div>
    </div>
@endif