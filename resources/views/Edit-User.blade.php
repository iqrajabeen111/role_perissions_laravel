@extends('layout.master')

@section('content')

<div class="container mt-4">

    <div class="row col-lg-12">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>User Edit</h2>
            </div>
            <div class="pull-right">

            </div>
        </div>
    </div>
    @if (session('message'))
    <h5 class="alert alert-success">{{ session('message') }}</h5>
    @endif


    <form method="Post" action="{{route('users.update',$user->id)}}">
        @method('PATCH')
        @csrf

        <div class="row col-lg-12">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" class="form-control" value="{{ $user->name }}" placeholder="Title">
                    @if ($errors->has('name'))
                    <strong style="color:red;">{{ $errors->first('name') }}.</strong>
                    @endif
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Email:</strong>
                    <input type="text" name="email" class="form-control" value="{{ $user->email }}" placeholder="Title">
                    @if ($errors->has('email'))
                    <strong style="color:red;">{{ $errors->first('email') }}.</strong>
                    @endif
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Roles:</strong>
                    <select  id="role" name="role[]" class="js-example-basic-multiple form-control" multiple="multiple">
                        <option value="0">select</option>
                        @foreach($roles as $role)
                        <option value="{{$role->id}}" {{$user->roles->where('id', $role->id)->first() ? 'selected' : ''}}>{{$role->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-success">Update</button>
            </div>
        </div>

    </form>
</div>
@endsection