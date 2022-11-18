@extends('layout.master')

@section('content')

<div class="container mt-4">

    <div class="row col-lg-12">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add User</h2>
            </div>
            <div class="pull-right">
            </div>
        </div>
    </div>
    @if (session('message'))
    <h5 class="alert alert-success">{{ session('message') }}</h5>
    @endif


    <form action="{{ route('users.store') }}" method="POST">

        @csrf
        <div class="row col-lg-12">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" class="form-control" placeholder="Title">
                    @if ($errors->has('name'))
                    <strong style="color:red;">{{ $errors->first('name') }}.</strong>
                    @endif
                </div>
                <div class="form-group">
                    <strong>Email:</strong>
                    <input type="text" name="email" class="form-control" placeholder="Title">
                    @if ($errors->has('email'))
                    <strong style="color:red;">{{ $errors->first('email') }}.</strong>
                    @endif
                </div>
            </div>
            <div class="row col-lg-12">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Roles:</strong>
              
                        <select name="role" id="role">
                            <option value="0">select</option>
                            @foreach ($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                
                    </div>
                </div>


                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </div>

    </form>
</div>
@endsection