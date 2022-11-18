@extends('layout.master')

@section('content')

<div class="container mt-4">

    <div class="row col-lg-12">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Assigned Permissions</h2>
            </div>
            <div class="pull-right">

            </div>
        </div>
    </div>
    @if (session('message'))
    <h5 class="alert alert-success">{{ session('message') }}</h5>
    @endif


    <form method="Post" action="{{route('roles.update',$role->id)}}">
        @method('PATCH')
        @csrf

        <div class="row col-lg-12">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Role:</strong>
                    <input type="text" name="name" class="form-control" value="{{ $role->name }}" placeholder="Title">
                    @if ($errors->has('name'))
                    <strong style="color:red;">{{ $errors->first('name') }}.</strong>
                    @endif
                </div>
            </div>
          
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>permissions:</strong>
                    <select  id="permission" name="permission[]" class="js-example-basic-multiple form-control" multiple="multiple">
                        <option value="0">select</option>
                        @foreach($permissions as $permission)
                        <option value="{{$permission->id}}" {{$role->permissions->where('id', $permission->id)->first() ? 'selected' : ''}}>{{$permission->name}}</option>
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