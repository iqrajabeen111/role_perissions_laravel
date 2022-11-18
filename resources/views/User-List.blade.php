@extends('layout.master')
@section('content')
<div class="container mt-4">
  <div class="row mb-4">
  <a class="btn btn-success" href="{{route('users.create')}}">Add user</a>

  </div>
  <div class="row justify-content-md-center">
    <!-- <div class="row"> -->
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">name</th>
          <th scope="col">email</th>
          <th scope="col">Role</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($users as $user)
        <tr>
          <td>{{ $user->id }}</td>
          <td>{{ $user->name }}</td>
          <td>{{ $user->email }}</td>
          <td></td>
          <td>
            <form action="{{ route('users.edit', [$user->id])}}" method="GET">
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