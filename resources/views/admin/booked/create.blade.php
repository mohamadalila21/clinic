@extends('admin.layout')
@section('content')

<div class="card-body">
<form method="post" action="{{route('booked.store')}}" >
@csrf 
    <div class="card-body">
    @if($errors->any())
    <div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h5><i class="pe-7s-info"></i> خطأ!</h5>
    @foreach($errors->all() as $error)
    <li>{{$error}}</li>
    @endforeach
    </div>
    @endif

    @if(session()->has('message'))
    <div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h5><i class="pe-7s-check"></i> نجاح</h5>
    إضيفة البيانات بنجاح
    </div>
    @endif
    <div class="form-group">
        <label for="name"> الاسم : </label>
        <input type="text" class="form-control"  name="name">
      </div>
      <div class="form-group">
        <label for="email">البريد الالكتروني : </label>
        <input type="text" class="form-control"  name="email">
      </div>
      <div class="form-group">
        <label for="phone">رقم جوال   : </label>
        <input type="text" class="form-control"  name="phone">
      </div>
      <div class="form-group">
      <label>رسالتك</label>
      <textarea class="form-control" rows="5" name="message"></textarea>
      </div>
    <div class="card-footer">
      <button type="submit" class="btn btn-primary">إضافة</button>
    </div>
  </form>

</div>
  @endsection
