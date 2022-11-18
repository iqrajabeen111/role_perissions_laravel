@extends('layout.master')
@section('content')
<div class="container mt-4">
  <div class="row mb-4">
    
  </div>
  <div class="row justify-content-md-center">
    <!-- <div class="row"> -->
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Permission name</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($permissions as $permission)
        <tr>
          <td>{{ $permission->id }}</td>
          <td>{{ $permission->name }}</td>
          <td></td>
        
        </tr>
        @endforeach
        @stop
      </tbody>
    </table>
  </div>
</div>