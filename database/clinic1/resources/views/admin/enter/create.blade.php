@extends('admin.layout')
@section('content')

<div class="card-body">
<form method="post" action="{{route('enter.store')}}" >
    @csrf
    <div class="form-group">
        <label for="number">رقم المريض : </label>
        <input type="text" class="form-control"  name="number">
      </div>
      <div class="form-group">
        <label for="name">اسم المريض : </label>
        <input type="text" class="form-control"  name="name">
      </div>
      <div class="form-group">
        <label for="phone">رقم الجوال : </label>
        <input type="text" class="form-control"  name="phone">
      </div>
      <div class="form-group">
        <label for="age">العمر : </label>
        <input type="text" class="form-control"  name="age">
      </div>
      <div class="form-group">
        <label for="total">مبلغ كلي : </label>
        <input type="text" class="form-control"  name="total">
      </div>
      <div class="form-group">
        <label for="payments">مدفوع : </label>
        <input type="text" class="form-control"  name="payments">
      </div>
      <div class="form-group">
        <label for="stay">المبلغ النتبقي : </label>
        <input type="text" class="form-control"  name="stay">
      </div>
    <div class="card-footer">
      <button type="submit" class="btn btn-primary">إضافة</button>
    </div>
  </form>

@endsection
