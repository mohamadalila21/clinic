@extends('admin.layout')
@section('content')

<div class="card-body">
<form method="post" action="{{route('revenues.update',$revenue->id)}}" >
  @method('put')
    @csrf 
    <div class="form-group">
        <label for="number">رقم العملية : </label>
        <input type="text" class="form-control"  name="number" value="{{$revenue->number}}">
      </div>
      <div class="form-group">
        <label for="name"> اسم مسدد : </label>
        <input type="text" class="form-control"  name="name" value="{{$revenue->name}}">
      </div>
      <div class="form-group">
        <label for="amount">مبلغ : </label>
        <input type="text" class="form-control"  name="amount" value="{{$revenue->amount}}">
      </div>
      <div class="form-group">
        <label for="reason">سبب   : </label>
        <input type="text" class="form-control"  name="reason" value="{{$revenue->reason}}">
      </div>
   
  
     
    
    <div class="card-footer">
      <button type="submit" class="btn btn-primary">تعديل</button>
    </div>
  </form>

@endsection
