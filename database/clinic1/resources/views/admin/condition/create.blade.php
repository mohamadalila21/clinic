@extends('admin.layout')
@section('content')

<div class="card-body">
<form method="post" action="{{route('condition.store')}}"  enctype="multipart/form-data" >
    @csrf 
    <div class="form-group">
        <label for="before">قبل : </label>
        <input type="text" class="form-control"  name="before">
      </div>
      <div class="form-group">
        <label for="distance">بعد : </label>
        <input type="text" class="form-control"  name="distance">
      </div>
      <div class="form-group">
        <label for="image">  صورة:</label>
        <input type="file" class="form-control" name="image" />
    </div>          
    <div class="card-footer">
      <button type="submit" class="btn btn-primary">إضافة</button>
    </div>
  </form>
</div>
  @endsection
