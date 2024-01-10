@extends('layouts.main')

@section('content')
<section>
  <div class="container-fluid">
    <div class="row">
      <form action="{{ route('user.update', $user->id) }}" method="post">
        @method('patch')
        @csrf
        <div class="form-group">
            <input type="text" value="{{ $user->name ?? old('name') }}" name="name" class="form-control" placeholder="Name">
        </div>
        <div class="form-group">
          <input type="text" value="{{ $user->surname ?? old('surname') }}" name="surname" class="form-control" placeholder="Surname" >
        </div>
        <div class="form-group">
          <input type="text" value="{{ $user->patronymic ?? old('patronymic') }}" name="patronymic" class="form-control" placeholder="Patronymic" >
        </div>
        <div class="form-group">
          <input type="text" value="{{ $user->age ?? old('age') }}" name="age" class="form-control" placeholder="Age">
        </div>
        <div class="form-group">
          <input type="text" value="{{ $user->address ?? old('address') }}" name="address" class="form-control" placeholder="Age">
        </div>
        <div class="form-group">
          <select name="gender" class="custom-select form-control" id="exampleSelectBorder">
              <option disabled selected>Gender</option>
              <option {{ $user->gender == 1 || old('gender') == 1 ?  ' selected' : '' }} value="1">Male</option>
              <option {{ $user->gender == 2 || old('gender') == 2 ? 'selected' : '' }} value="2">Female</option>
          </select>
        </div>
        <div class="form-group">
          <input type="submit" class="btn btn-primary" value="Add">
        </div>
      </form>
  </div>
</section>
@endsection