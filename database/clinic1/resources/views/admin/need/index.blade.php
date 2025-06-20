@extends('admin.layout')
@section('content')

<div class="title-page">
    <h3>المستلزمات</h3>
</div>

<div class="card-body table-responsive p-0 custum-table">
 <table class="table table-hover text-nowrap" id="myTable">
<thead>
<tr>
<th>ID</th>
<th>رقم العملية</th>
<th> متيريال المعمل</th>
<th>الصنف</th>
<th>العدد</th>
<th>سعر الواحد</th>
<th>اجمالي سعر</th>
<th> رقم الفاتورة</th>
<th>تاريخ الفاتورة</th>



<th>
<button type="button" class="btn btn-sm btn-primary caustum-add" data-toggle="modal" data-target="#exampleModal">
<i class="pe-7s-plus">إضافة</i>

</button>
</th>


</tr>
</thead>
<tbody>
@foreach($needs as $index=> $need)
<tr>
<td>{{++$index}}</td>
<td>{{$need->number}} </td>
<td>{{$need->material}} </td>
<td>{{$need->item}} </td>
<td>{{$need->number_b}} </td>
<td>{{$need->price}} </td>
<td>{{$need->total}} </td>
<td>{{$need->invoice}} </td>
<td>{{$need->invoice_date}} </td>


<td>
<form style="display: inline-block;" action="{{route('need.destroy',$need->id)}}" method="POST">
  @csrf
  @method('delete')
       <button type="submit" class="btn btn-danger">
       <i class="fa fa-btn fa-trash"></i>حذف
 </button>
</form>
          <a href="{{route('need.edit',$need->id)}}" class="btn btn-info">
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
      <form method="post" action="{{route('need.store')}}" >
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
        <label for="number">رقم العملية : </label>
        <input type="number" class="form-control"  name="number">
      </div>
      <div class="form-group">
        <label for="material">  ماتيريال معمل  : </label>
        <input type="number" class="form-control"  name="material">
      </div>
      <div class="form-group">
        <label for="item">  الصنف  : </label>
        <input type="text" class="form-control"  name="item">
      </div>
      <div class="form-group">
        <label for="number_b">العدد : </label>
        <input type="number" class="form-control"  name="number_b">
      </div>
      <div class="form-group">
        <label for="price">سعر الواحد : </label>
        <input type="number" class="form-control"  name="price">
      </div>
      <div class="form-group">
        <label for="total">اجمالي السعر : </label>
        <input type="number" class="form-control"  name="total">
      </div>
      <div class="form-group">
        <label for="invoice"> رقم الفتورة : </label>
        <input type="number" class="form-control"  name="invoice">
      </div>
      <div class="form-group">
        <label for="invoice_date">تاريخ الفاتورة : </label>
        <input type="text" class="form-control"  name="invoice_date">
      </div>
    <div class="card-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">رجوع</button>
      <button type="submit" class="btn">إضافة</button>
    </div>
  </form>
    </div>
  </div>
</div>
@endsection
