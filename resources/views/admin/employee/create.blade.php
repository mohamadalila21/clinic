@extends('admin.layout')
@section('content')

<div class="card-body">
<form method="post" action="{{route('employee.store')}}" >
    @csrf 
    <div class="form-group">
        <label for="number">رقم موظف : </label>
        <input type="text" class="form-control"  name="number">
      </div>
      <div class="form-group">
        <label for="name">اسم موظف : </label>
        <input type="text" class="form-control"  name="name">
      </div>
      <div class="form-group">
        <label for="level">مستوى موظف  : </label>
        <input type="text" class="form-control"  name="level">
      </div>
      <div class="form-group">
        <label for="job">عمل الموظف : </label>
        <input type="text" class="form-control"  name="job">
      </div>
      <div class="form-group">
        <label for="pay">راتب موظف : </label>
        <input type="text" class="form-control"  name="pay">
      </div>
     
    
    <div class="card-footer">
      <button type="submit" class="btn btn-primary">إضافة</button>
    </div>
  </form>
  
</div>

  @endsection
