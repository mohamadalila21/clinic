@extends('admin.layout')
@section('content')


<div class="title-page">
    <h3>المقالات</h3>
</div>
<div class="card-body table-responsive p-0 custum-table">
 <table class="table table-hover text-nowrap" id="myTable">
<thead>
<tr>
<th>ID</th>
<th> عنوان</th>
<th>نص</th>
<th> صورة</th>



<th>
<button type="button" class="btn btn-sm btn-primary caustum-add" data-toggle="modal" data-target="#exampleModal">
<i class="pe-7s-plus"></i>
إضافة
</button>
</th>


</tr>
</thead>
<tbody>
@foreach($articless as $index=> $articles)
<tr>
<td>{{++$index}}</td>
<td>{{$articles->title}} </td>
<td>{{$articles->message}} </td>
<td>{{$articles->image}} </td>






<td>
<form style="display: inline-block;" action="{{route('articles.destroy',$articles->id)}}" method="POST">
  @csrf
  @method('delete')
       <button type="submit" class="btn btn-danger">
       <i class="fa fa-btn fa-trash"></i>حذف
 </button>
</form>
          <a href="{{route('articles.edit',$articles->id)}}" class="btn btn-info">
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
      <form method="post" action="{{route('articles.store')}}"  enctype="multipart/form-data" >
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
        <label for="title">عنوان : </label>
        <input type="text" class="form-control"  name="title">
      </div>
      <div class="form-group">
      <label>رسالتك</label>
      <textarea class="form-control" rows="5" name="message"></textarea>
      </div>
      <div class="form-group">
        <label for="image">  صورة:</label>
        <input type="file" class="form-control" name="image" />
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
