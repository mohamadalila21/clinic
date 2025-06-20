@extends('admin.layout')
@section('content')
<div class="title-page">
    <div>
        <h3> تعديل على ملف الموظف</h3>
    </div>
</div>
<div class="card-body card-edit">
<form method="post" action="{{route('enter.update',$enter->id)}}" >
  @method('put')
    @csrf
    <div class="form-group">
        <label for="number">رقم المريض : </label>
        <input type="text" class="form-control"  name="number" value="{{$enter->number}}">
      </div>
      <div class="form-group">
        <label for="name">اسم المريض : </label>
        <input type="text" class="form-control"  name="name" value="{{$enter->name}}">
      </div>
      <div class="form-group">
        <label for="phone">رقم الجوال : </label>
        <input type="text" class="form-control"  name="phone" value="{{$enter->phone}}">
      </div>
      <div class="form-group">
        <label for="age">العمر : </label>
        <input type="text" class="form-control"  name="age" value="{{$enter->age}}">
      </div>
      <div class="form-group">
        <label for="total">مبلغ كلي : </label>
        <input type="text" class="form-control"  name="total" value="{{$enter->total}}">
      </div>
      <div class="form-group">
        <label for="payments">مدفوع : </label>
        <input type="text" class="form-control"  name="payments" value="{{$enter->payments}}">
      </div>
      {{-- <div class="form-group">
        <label for="stay">المبلغ النتبقي : </label>
        <input type="text" class="form-control"  name="stay" value="{{$enter->stay}}">
      </div> --}}
    <div class="card-footer">
      <button type="submit" class="btn btn-primary">تعديل</button>
    </div>
  </form>
</div>
@endsection
