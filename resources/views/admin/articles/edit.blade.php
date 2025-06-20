@extends('admin.layout')  
@section('content')
<div class="title-page">
    <div>
        <h3> تعديل على المقالات</h3>
    </div>
</div>
<div class="card-body  card-edit">
<form method="post" action="{{route('articles.update',$article->id)}}"  enctype="multipart/form-data" >
  @method('put')
    @csrf
    <div class="form-group">
        <label for="title">عنوان : </label>
        <input type="text" class="form-control"  name="title" value="{{$article->title}}" >
      </div>
      <div class="form-group">
        <label for="message">نص : </label>
        {{-- <input type="text" class="form-control"  name="message" value="{{$article->message}}"> --}}
        <textarea class="form-control" rows="5" name="message" value="{{$article->message}}">{{$article->message}}</textarea>

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
