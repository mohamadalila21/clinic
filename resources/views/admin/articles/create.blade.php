@extends('admin.layout')
@section('content')

<div class="card-body">
<form method="post" action="{{route('articles.store')}}"  enctype="multipart/form-data" >
    @csrf 
    <div class="form-group">
        <label for="title">عنوان : </label>
        <input type="text" class="form-control"  name="title">
      </div>
      <div class="form-group">
        <label for="message">نص : </label>
        <input type="text" class="form-control"  name="message">
      </div>
      <div class="form-group">
        <label for="image">  صورة:</label>
        <input type="file" class="form-control" name="image" />
    </div>          
    <div class="card-footer">
      <button type="submit" class="btn btn-primary">إضافة</button>
    </div>
  </form>
</div>
  @endsection
