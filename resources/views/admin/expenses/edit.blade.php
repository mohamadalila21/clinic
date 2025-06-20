@extends('admin.layout')
@section('content')
<div class="title-page">
    <div>
        <h3> تعديل على المصروفات</h3>
    </div>
</div>
<div class="card-body card-edit">
<form method="post" action="{{route('expenses.update',$expense->id)}}" >
  @method('put')
    @csrf
    <div class="form-group">
        <label for="number">رقم العملية : </label>
        <input type="text" class="form-control"  name="number" value="{{$expense->number}}">
      </div>
      <div class="form-group">
        <label for="amount">مبلغ : </label>
        <input type="text" class="form-control"  name="amount" value="{{$expense->amount}}">
      </div>
      <div class="form-group">
        <label for="reason">سبب   : </label>
        <input type="text" class="form-control"  name="reason" value="{{$expense->reason}}">
      </div>
      <div class="form-group">
        <label for="name"> مستفيد : </label>
        <input type="text" class="form-control"  name="name" value="{{$expense->name}}">
      </div>
    <div class="card-footer">
      <button type="submit" class="btn btn-primary">تعديل</button>
    </div>
  </form>
</div>
  @endsection
