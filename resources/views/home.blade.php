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
                            @foreach($groups as $group)
                                <li class="nav-item">
                                    <a class="nav-link {{ $loop->first ? 'active' : '' }}" id="pills-home-tab" data-toggle="pill" href="#tab-{{ $group->slug }}" role="tab" aria-controls="pills-home" aria-selected="true">{{ $group->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            @if($errors->any())
                                @foreach ($errors->all() as $error)
                                    <div class="alert alert-danger">{{ $error }}</div>
                                @endforeach
                            @endif
                            @foreach($groups as $group)
                            <div class="tab-pane fade show {{ $loop->first ? 'active' : '' }}" id="tab-{{ $group->slug }}" role="tabpanel" aria-labelledby="tab-{{ $group->slug }}-tab">
                                @include('components._profileForm')
                                @include('components._profileAddress')
                                @include('components._profileConfirmation')
                            </div>
                            @endforeach
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
