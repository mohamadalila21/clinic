@extends('admin.layout')
@section('content')

<div class="card-body">
<form method="post" action="{{route('expenses.store')}}" >
    @csrf 
    <div class="form-group">
        <label for="number">رقم العملية : </label>
        <input type="text" class="form-control"  name="number">
      </div>
      <div class="form-group">
        <label for="amount">مبلغ : </label>
        <input type="text" class="form-control"  name="amount">
      </div>
      <div class="form-group">
        <label for="reason">سبب   : </label>
        <input type="text" class="form-control"  name="reason">
      </div>
      <div class="form-group">
        <label for="name"> مستفيد : </label>
        <input type="text" class="form-control"  name="name">
      </div>
    <div class="card-footer">
      <button type="submit" class="btn btn-primary">إضافة</button>
    </div>
  </form>

</div>
  @endsection
