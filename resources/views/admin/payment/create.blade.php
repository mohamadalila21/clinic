@extends('admin.layout')
@section('content')

<div class="card-body">
<form method="post" action="{{route('payment.store')}}" >
    @csrf 
    <div class="form-group">
        <label for="number">رقم العملية : </label>
        <input type="text" class="form-control"  name="number">
      </div>
      <div class="form-group">
        <label for="batch">   الدفعة  : </label>
        <input type="text" class="form-control"  name="batch">
      </div>
      <div class="form-group">
        <label for="number_b">رقم الفاتورة : </label>
        <input type="text" class="form-control"  name="number_b">
      </div>
      <div class="form-group">
        <label for="invoice_date">تاريخ الفاتورة : </label>
        <input type="text" class="form-control"  name="invoice_date">
      </div>
      <div class="form-group">
        <label for="condition"> الحالة : </label>
        <input type="text" class="form-control"  name="condition">
      </div> 
    <div class="card-footer">
      <button type="submit" class="btn btn-primary">إضافة</button>
    </div>
  </form>

</div>
  @endsection
