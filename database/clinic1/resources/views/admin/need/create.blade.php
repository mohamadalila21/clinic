@extends('admin.layout')
@section('content')

<div class="card-body">
<form method="post" action="{{route('need.store')}}" >
    @csrf 
    <div class="form-group">
        <label for="number">رقم العملية : </label>
        <input type="text" class="form-control"  name="number">
      </div>
      <div class="form-group">
        <label for="material">  ماتيريال معمل  : </label>
        <input type="text" class="form-control"  name="material">
      </div>
      <div class="form-group">
        <label for="item">  الصنف  : </label>
        <input type="text" class="form-control"  name="item">
      </div>
      <div class="form-group">
        <label for="number_b">العدد : </label>
        <input type="text" class="form-control"  name="number_b">
      </div>
      <div class="form-group">
        <label for="price">سعر الواحد : </label>
        <input type="text" class="form-control"  name="price">
      </div>
      <div class="form-group">
        <label for="total">اجمالي السعر : </label>
        <input type="text" class="form-control"  name="total">
      </div>
      <div class="form-group">
        <label for="invoice"> رقم الفتورة : </label>
        <input type="text" class="form-control"  name="invoice">
      </div>
      <div class="form-group">
        <label for="invoice_date">تاريخ الفاتورة : </label>
        <input type="text" class="form-control"  name="invoice_date">
      </div>
    <div class="card-footer">
      <button type="submit" class="btn btn-primary">إضافة</button>
    </div>
  </form>


</div>  @endsection
