@extends('admin.layout')
@section('content')

<div class="card-body">
<form method="post" action="{{route('lab.store')}}" >
    @csrf 
    <div class="form-group">
        <label for="number">رقم العملية : </label>
        <input type="text" class="form-control"  name="number">
      </div>
      <div class="form-group">
        <label for="type"> نوع التلبسية  : </label>
        <input type="text" class="form-control"  name="type">
      </div>
      <div class="form-group">
        <label for="number_b">العدد : </label>
        <input type="text" class="form-control"  name="number_b">
      </div>
      <div class="form-group">
        <label for="price">السعر : </label>
        <input type="text" class="form-control"  name="price">
      </div>
      <div class="form-group">
        <label for="total">اجمالي السعر : </label>
        <input type="text" class="form-control"  name="total">
      </div>
      <div class="form-group">
        <label for="received_date">تاريخ الاستلام : </label>
        <input type="text" class="form-control"  name="received_date">
      </div>
      <div class="form-group">
        <label for="payments">الدفعات : </label>
        <input type="text" class="form-control"  name="payments">
      </div>
    <div class="card-footer">
      <button type="submit" class="btn btn-primary">إضافة</button>
    </div>
  </form>


</div>
  @endsection
