@extends('admin.layout')
@section('content')

<div class="card-body">
<form method="post" action="{{route('booked.update',$booked->id)}}">
    @method('put')
    @csrf
    <div class="card-body">
    <div class="form-group">
        <label for="name"> الاسم : </label>
        <input type="text" class="form-control"  name="name" value="{{$booked->name}}">
      </div>
      <div class="form-group">
        <label for="email">البريد الالكتروني : </label>
        <input type="text" class="form-control"  name="email" value="{{$booked->email}}">
      </div>
      <div class="form-group">
        <label for="phone">رقم جوال   : </label>
        <input type="text" class="form-control"  name="phone" value="{{$booked->phone}}">
      </div>
      <div class="form-group">
        <label for="message"> رسالتك   : </label>
        <input type="textarea" class="form-control"  name="message" value="{{$booked->message}}">
      </div>
      <div class="form-group">
        <label for="date">تاريخ الحجز  : </label>
        <input type="date" class="form-control"  name="date" value="{{$booked->date}}">
      </div>
    <div class="card-footer">
      <button type="submit" class="btn btn-primary">تعديل</button>
    </div>
  </form>

</div>
  @endsection
