@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center text-center">
        <div class="col-8">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
                @if (session('warning'))
                    <div class="alert alert-warning" role="alert">
                        {{ session('warning') }}
                    </div>
                @endif
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-header">Join a group</div>
                <div class="card-body">
                    <form action="{{ route('group.store') }}" method="post">
                        @csrf
                        @method('POST')
                        <label for="code" class="d-block">Group Code</label>
                        <div class="input-group mb-2">
                            <input type="text" name="code" id="code" class="form-control" placeholder="a30df9a7-1a83-4b61...">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="submit">Join</button>
                            </div>
                        </div>
                        <small id="codeHelp" class="form-text text-muted d-block">Enter the group ID given to you.</small>
                    </form>
                </div>
            </div>

        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Your Groups</div>
                <div class="card-body">
                @if(sizeof($groups) === 0) You do not belong to any groups @endif
                    <ul class="nav nav-tabs mb-3" id="pills-tab" role="tablist">
                        @foreach($groups as $item)
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('dashboard/'. $item->slug) ? 'active' : '' }}" href="{{ route('dashboard.groups', ['slug' => $item->slug]) }}">{{ $item->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        @if($errors->any())
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger">{{ $error }}</div>
                            @endforeach
                        @endif
                        <div class="tab-pane fade show {{ ($group->id === $group->id)? 'active' : '' }}" role="tabpanel" aria-labelledby="tab-{{ $group->slug }}-tab">
                            <div class="row">
                                <div class="col-6">
                                    <h4 class="font-weight-bold text-uppercase">Address</h4>
                                    <hr>
                                    @include('components._profileForm')
                                    @include('components._profileAddress')
                                    @include('components._profileConfirmation')
                                </div>
                                <div class="col-6">
                                    <h4 class="font-weight-bold text-uppercase">Wishlist</h4>
                                    <hr>
                                    @include('components._profileWishlist')
                                    @if($profile)
                                        @foreach($profile->wishlists as $wishlist)
                                            <p class="mb-1"><small>URL: </small><a href="{{ $wishlist->url }}">{{ $wishlist->url }}</a></p>
                                            <p><small>NOTES: </small>{{ $wishlist->notes }}</p>

                                        @endforeach
                                    @endif
                                </div>
                                @if($receiver)
                                <div class="col-12">
                                    <hr>
                                </div>
                                <div class="col-12">
                                    <h2>Your sending to:</h2>
                                    @include('components._receiverAddress')
                                    <hr>
                                    <h3>Their wishlist</h3>
                                    @if($receiver)
                                        @foreach($receiver->wishlists as $wishlist)
                                            <p class="mb-1"><small>URL: </small><a href="{{ $wishlist->url }}">{{ $wishlist->url }}</a></p>
                                            <p><small>NOTES: </small>{{ $wishlist->notes }}</p>

                                        @endforeach
                                    @endif
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
