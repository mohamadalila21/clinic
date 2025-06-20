@extends('admin.layout')
@section('content')

    <div class="title-page">
        <div>
            <h3>المقالات</h3>
        </div>
        <div>
            <button type="button" class="btn btn-sm  caustum-add" data-toggle="modal" data-target="#exampleModal">
                <i class="fa fa-plus" aria-hidden="true"></i>
                <span>إضافة</span>
            </button>
        </div>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible alert-dismissible-custem">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="pe-7s-info"></i> خطأ!</h5>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </div>
    @endif

    @if (session()->has('message'))
        <div class="alert  alert-dismissible alert-dismissible-custem">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="pe-7s-check"></i> نجاح</h5>
            تم إضافة البيانات بنجاح
        </div>
    @endif
    <div class="card-body table-responsive p-0 custum-table">
        <table class="table table-hover text-nowrap "  id="myTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th> عنوان</th>
                    <th style="width: 40px">محتوى المقال</th>
                    <th > صورة</th>
                    <th> </th>


                </tr>
            </thead>
            <tbody>
                @foreach ($articless as $index => $articles)
                    <tr>
                        <td>{{ ++$index }}</td>
                        <td>{{ $articles->title }} </td>
                        <td  style="width: 450px; display: flex; line-height: 40px; overflow: hidden; text-overflow: ellipsis;" >{{ $articles->message }} </td>
                        <td>{{ $articles->image }} </td>
                        <td>
                            <div class="d-flex" style="display: flex; margin: 0 5px">
                                <form style="display: inline-block;" action="{{ route('articles.destroy', $articles->id) }}"
                                    method="POST" onsubmit="return confirm(' هل تريد ناكيد الحدف!؟ ')">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn delete-btn">
                                        <i class="fa fa-btn fa-trash"></i>
                                    </button>
                                </form>
                                <a href="{{ route('articles.edit', $articles->id) }}" class="btn edit-btn">
                                    <i class="fa fa-btn fa-edit"></i>
                                </a>
                            </div>
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
                    <form method="post" action="{{ route('articles.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title">عنوان : </label>
                                <input type="text" class="form-control" name="title">
                            </div>
                            <div class="form-group">
                                <label>محتوى المقال</label>
                                <textarea class="form-control" rows="5" name="message"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="image"> صورة:</label>
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
