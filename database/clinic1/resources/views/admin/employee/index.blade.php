@extends('admin.layout')
@section('content')


<div class="title-page">
    <h3>ملف الموظف</h3>
</div>
<div class="card-body table-responsive p-0 custum-table">
 <table class="table table-hover text-nowrap" id="myTable">
<thead>
<tr>
<th>ID</th>
<th>رقم موظف</th>
<th>اسم موظف</th>
<th>مستوى تعليمي</th>
<th>عمل موظف</th>
<th> راتب موظف</th>

<th>
<button type="button" class="btn btn-sm btn-primary caustum-add" data-toggle="modal" data-target="#exampleModal">
    <i class="pe-7s-plus"></i>
    إضافة
</button>
</th>


</tr>
</thead>
<tbody>
@foreach($employees as $index=> $employee)
<tr>
<td>{{++$index}}</td>
<td>{{$employee->number}} </td>
<td>{{$employee->name}} </td>
<td>{{$employee->level}} </td>
<td>{{$employee->job}} </td>
<td>{{$employee->pay}} </td>





<td>
<form style="display: inline-block;" action="{{route('employee.destroy',$employee->id)}}" method="POST">
  @csrf
  @method('delete')
       <button type="submit" class="btn btn-danger">
       <i class="fa fa-btn fa-trash"></i>حذف
 </button>
</form>
          <a href="{{route('employee.edit',$employee->id)}}" class="btn btn-info">
        <i class="fa fa-btn fa-edit"></i>تعديل
 </td>
 </tr>
</tbody>
@endforeach
</table>
</div>




<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header custem-add-data">
        <h5 class="modal-title" id="exampleModalLabel">إضافة البيانات</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="post" action="{{route('employee.store')}}" >
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
        <label for="number">رقم موظف : </label>
        <input type="number" class="form-control"  name="number">
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
        <input type="number" class="form-control"  name="job">
      </div>
      <div class="form-group">
        <label for="pay">راتب موظف : </label>
        <input type="number" class="form-control"  name="pay">
      </div>
    <div class="card-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">رجوع</button>
      <button type="submit" class="btn ">إضافة</button>
    </div>
  </form>
    </div>
  </div>
</div>
@endsection
