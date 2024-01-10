@extends('layouts.main')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <form action="{{ route('user.store') }}" method="post">
        @csrf
        <div class="form-group">
          <input type="text" value="{{ old('name') }}" name="name" class="form-control" placeholder="Name">
        </div>
        <div class="form-group">
          <input type="email" value="{{ old('email') }}" name="email" class="form-control" placeholder="Email">
        </div>
        <div class="form-group">
          <input type="password" value="{{ old('password') }}" name="password" class="form-control" placeholder="Password">
        </div>
        <div class="form-group">
          <input type="password" value="{{ old('password_confirmation') }}" name="password_confirmation" class="form-control" placeholder="Confirm password">
        </div>
        <div class="form-group">
          <input type="text" value="{{ old('surname') }}" name="surname" class="form-control" placeholder="Surname">
        </div>
        <div class="form-group">
          <input type="text" value="{{ old('patronymic') }}" name="patronymic" class="form-control" placeholder="Patronymic">
        </div>
        <div class="form-group">
          <input type="text" value="{{ old('age') }}" name="age" class="form-control" placeholder="Age">
        </div>
        <div class="form-group">
          <input type="text" value="{{ old('address') }}" name="address" class="form-control" placeholder="Address">
        </div>
        <div class="form-group">
          <select name="gender" class="custom-select form-control" id="exampleSelectBorder">
            <option disabled selected>Gender</option>
            <option {{ old('gender') == 1 ? 'selected' : '' }} value="1">Male</option>
            <option {{ old('gender') == 2 ? 'selected' : '' }} value="2">Female</option>
          </select>
        </div>
        <div class="form-group">
          <input type="submit" class="btn btn-primary" value="Add">
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
