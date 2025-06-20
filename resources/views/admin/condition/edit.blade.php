@extends('admin.layout')
@section('content')
    <div class="title-page">
        <div>
            <h3> تعديل على حالات قبل وبعد</h3>
        </div>
    </div>
    <div class="card-body card-edit">
        <form method="post" action="{{ route('condition.update', $condition->id) }}" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="form-group">
                <label for="before">عنوان : </label>
                <input type="text" class="form-control" name="before" value="{{ $condition->before }}">
            </div>
            <div class="form-group">
                <label for="distance">نص : </label>
                <input type="text" class="form-control" name="distance" value="{{ $condition->distance }}">
            </div>
            <div class="form-group">
                <label for="image"> صورة:</label>
                <input type="file" class="form-control" name="image" value="{{ $condition->image }}" />
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">تعديل</button>
            </div>
        </form>
    </div>
@endsection
