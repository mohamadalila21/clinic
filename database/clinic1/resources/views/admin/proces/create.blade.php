@extends('admin.layout')
@section('content')

<div class="card-body">
<form method="post" action="{{route('proces.store')}}" >
    @csrf 
    <div class="form-group">
        <label for="name">الاسم : </label>
        <input type="text" class="form-control"  name="name">
      </div>
      <div class="form-group">
        <label for="message">نص : </label>
        <input type="text" class="form-control"  name="message">
      </div>
      <div class="form-group">
        <label for="time">وقت العملية : </label>
        <input type="text" class="form-control"  name="time">
      </div>  
    <div class="card-footer">
      <button type="submit" class="btn btn-primary">إضافة</button>
    </div>
  </form>
</div>
  @endsection
