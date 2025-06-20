@extends('admin.layout')
@section('content')
<div class="title-page">
    <h3>ملف المريض</h3>
</div>
<div class="card-body table-responsive p-0 custum-table">
 <table class="table table-hover text-nowrap" id="myTable" >
<thead >
<tr>
<th>ID </th>
<th>رقم مريض</th>
<th>اسم مريض</th>
<th>رقم جوال</th>
<th>العمر</th>
<th>مبلغ كلي</th>
<th>المدفوع</th>
<th>مبلغ متبقي</th>
<th>
<button type="button" class="btn btn-sm btn-primary caustum-add" data-toggle="modal" data-target="#exampleModal">
<i class="pe-7s-plus"></i>
إضافة
</button>
</th>

</tr>
</thead>
<tbody>
@foreach($enters as $index=> $enter)
<tr>
<td>{{++$index}}</td>
<td>{{$enter->number}} </td>
<td>{{$enter->name}} </td>
<td>{{$enter->phone}} </td>
<td>{{$enter->age}} </td>
<td>{{$enter->total}} </td>
<td>{{$enter->payments}} </td>
<td>{{$enter->stay}} </td>

<td>
<!-- Button trigger modal -->

<form style="display: inline-block;" action="{{route('enter.destroy',$enter->id)}}" method="POST">
  @csrf
  @method('delete')
       <button type="submit" class="btn btn-danger">
       <i class="fa fa-btn fa-trash"></i>حذف
 </button>
</form>
          <a href="{{route('enter.edit',$enter->id)}}" class="btn btn-info">
        <i class="fa fa-btn fa-edit"></i>تعديل
 </td>
 </tr>
</tbody>

@endforeach

</table>

</div>


<!-- Modal -->
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
      <form method="post" action="{{route('enter.store')}}" >
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
    تم إضافة البيانات بنجاح
    </div>
    @endif
    <div class="form-group">
        <label for="number">رقم المريض : </label>
        <input type="number" class="form-control"  name="number">
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
        <input type="number" class="form-control"  name="age">
      </div>
      <div class="form-group">
        <label for="total">مبلغ كلي : </label>
        <input type="number" class="form-control"  name="total">
      </div>
      <div class="form-group">
        <label for="payments">مدفوع : </label>
        <input type="number" class="form-control"  name="payments">
      </div>
      <div class="form-group">
        <label for="stay">المبلغ النتبقي : </label>
        <input type="number" class="form-control"  name="stay">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">رجوع</button>
        <button type="submit" class="btn ">إضافة</button>
      </div>
  </form>
    </div>
  </div>
</div>

@endsection
