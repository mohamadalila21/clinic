@extends('admin.layout')
@section('content')

<div class="card-body">
<form method="post" action="{{route('ClinicReservations.update',$ClinicReservations->id)}}"  enctype="multipart/form-data" >
  @method('put')
    @csrf
    <div class="form-group">
        <label for="before">الاسم : </label>
        <input type="text" class="form-control"  name="name" value="{{$ClinicReservations->name}}" >
      </div>
      <div class="form-group">
        <label for="distance">رقم الجوال : </label>
        <input type="text" class="form-control"  name="mobile" value="{{$ClinicReservations->mobile}}">
      </div>
      <div class="form-group">
        <label for="image">  تاريخ الحجز:</label>
        <input type="data" class="form-control" name="date" value="{{$ClinicReservations->datetime}}" />
    </div>
    <div class="card-footer">
      <button type="submit" class="btn btn-primary">تعديل</button>
    </div>
  </form>
</div>
  @endsection
