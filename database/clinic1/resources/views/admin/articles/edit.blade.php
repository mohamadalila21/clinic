@extends('admin.layout')
@section('content')

<div class="card-body">
<form method="post" action="{{route('articles.update',$article->id)}}"  enctype="multipart/form-data" >
  @method('put')
    @csrf 
    <div class="form-group">
        <label for="title">عنوان : </label>
        <input type="text" class="form-control"  name="title" value="{{$article->title}}" >
      </div>
      <div class="form-group">
        <label for="message">نص : </label>
        <input type="text" class="form-control"  name="message" value="{{$article->message}}">
      </div>
      <div class="form-group">
        <label for="image">  صورة:</label>
        <input type="file" class="form-control" name="image" value="{{$article->image}}" />
    </div>          
    <div class="card-footer">
      <button type="submit" class="btn btn-primary">تعديل</button>
    </div>
  </form>
</div>
  @endsection
