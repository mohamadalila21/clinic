@extends('admin.layout')
@section('content')
    <div class="title-page">
        <div>
            <h3>ملف المريض</h3>
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
        <table class="table table-hover text-nowrap" id="myTable">
            <thead>
                <tr>
                    <th>ID </th>
                    <th>رقم المريض</th>
                    <th>اسم المريض</th>
                    <th>رقم جوال</th>
                    <th>العمر</th>
                    <th>مبلغ كلي</th>
                    <th>المدفوع</th>
                    <th>مبلغ متبقي</th>
                    <th>حذف / نعديل</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($enters as $index => $enter)
                    <tr>
                        <td>{{ ++$index }}</td>
                        <td>{{ $enter->number }} </td>
                        <td>{{ $enter->name }} </td>
                        <td>{{ $enter->phone }} </td>
                        <td>{{ $enter->age }} </td>
                        <td>{{ $enter->total }} </td>
                        <td>{{ $enter->payments }} </td>
                        <td>{{ $enter->total-$enter->payments }} </td>

                        <td>
                            <div class="d-flex" style="display: flex; margin: 0 5px">
                                <!-- Button trigger modal -->

                                <button type="button" class="btn delete-btn" data-toggle="modal" onclick="openModal()">
                                    <i class="fa fa-btn fa-trash"></i>
                                </button>
                                <!-- The Modal Delete -->
                                <div class="modal" id="myModal">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <!-- Modal Header -->
                                            <div class="modal-header"
                                                style="display: flex; align-items: center; justify-content: space-between">
                                                <h4 class="modal-title">رسالة تأكيد</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <!-- Modal body -->
                                            <div class="modal-body">
                                                هل انت متأكد من الحذف ؟
                                            </div>
                                            <!-- Modal footer -->
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default"
                                                    data-dismiss="modal">رجوع</button>
                                                <form style="display: inline-block;"
                                                    action="{{ route('enter.destroy', $enter->id) }}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn "
                                                        style="color: red; border-color:red " >
                                                        حذف
                                                    </button>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <a href="{{ route('enter.edit', $enter->id) }}" class="btn edit-btn">
                                    <i class="fa fa-btn fa-edit"></i>
                                </a>
                            </div>
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
                    <form method="post" action="{{ route('enter.store') }}">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="number">رقم المريض : </label>
                                <input type="number" class="form-control" name="number">
                            </div>
                            <div class="form-group">
                                <label for="name">اسم المريض : </label>
                                <input type="text" class="form-control" name="name">
                            </div>
                            <div class="form-group">
                                <label for="phone">رقم الجوال : </label>
                                <input type="text" class="form-control" name="phone">
                            </div>
                            <div class="form-group">
                                <label for="age">العمر : </label>
                                <input type="number" class="form-control" name="age">
                            </div>
                            <div class="form-group">
                                <label for="total">مبلغ كلي : </label>
                                <input type="number" class="form-control" name="total">
                            </div>
                            <div class="form-group">
                                <label for="payments">مدفوع : </label>
                                <input type="number" class="form-control" name="payments">
                            </div>
                            {{-- <div class="form-group">
                                <label for="stay">المبلغ المتبقي : </label>
                                <input type="number" class="form-control" name="stay">
                            </div> --}}
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">رجوع</button>
                                <button type="submit" class="btn ">إضافة</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>



    @endsection
