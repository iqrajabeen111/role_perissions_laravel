@extends('layout.master')
@section('content')
<div class="container mt-4">
  <div class="row mb-4">
  <a class="btn btn-success" href="{{route('roles.create')}}">Add Role</a>

  </div>
  <div class="row justify-content-md-center">
    <!-- <div class="row"> -->
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Role name</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($roles as $role)
        <tr>
          <td>{{ $role->id }}</td>
          <td>{{ $role->name }}</td>
          <td>
            <form action="{{ route('roles.edit', [$role->id])}}" method="GET">
              @csrf
              <button class="btn btn-danger" type="submit">Edit</button>
            </form>
          </td>
        </tr>
        @endforeach
        @stop
      </tbody>
    </table>
  </div>
</div>