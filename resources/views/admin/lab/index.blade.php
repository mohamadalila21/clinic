@extends('admin.layout')
@section('content')


    <div class="title-page">
        <div>
            <h3>طلبات المعمل الفني</h3>
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
                    <th>ID</th>
                    <th>رقم العملية</th>
                    <th>نوع التلبيسة</th>
                    <th>العدد</th>
                    <th>السعر</th>
                    <th>اجمالي سعر</th>
                    <th>تاريخ الاستلام</th>
                    <th>الدفعات</th>
                    <th>متبقي</th>
                    <th> </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($labs as $index => $lab)
                    <tr>
                        <td>{{ ++$index }}</td>
                        <td>{{ $lab->number }} </td>
                        <td>{{ $lab->type }} </td>
                        <td>{{ $lab->number_b }} </td>
                        <td>{{ $lab->price }} </td>
                        <td>{{ $lab->number_b*$lab->price }} </td>
                        <td>{{ $lab->received_date }} </td>
                        <td>{{ $lab->payments }} </td>
                        <td>{{ $lab->number_b*$lab->price-$lab->payments }} </td>
                        <td>
                            <div class="d-flex" style="display: flex; margin: 0 5px">
                                <form style="display: inline-block;" action="{{ route('lab.destroy', $lab->id) }}"
                                    method="POST" onsubmit="return confirm(' هل تريد ناكيد الحدف!؟ ')">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn delete-btn">
                                        <i class="fa fa-btn fa-trash"></i>
                                    </button>
                                </form>
                                <a href="{{ route('lab.edit', $lab->id) }}" class="btn edit-btn">
                                    <i class="fa fa-btn fa-edit"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
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
                    <form method="post" action="{{ route('lab.store') }}">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="number">رقم العملية : </label>
                                <input type="number" class="form-control" name="number">
                            </div>
                            <div class="form-group">
                                <label for="type"> نوع التلبسية : </label>
                                <input type="text" class="form-control" name="type">
                            </div>
                            <div class="form-group">
                                <label for="number_b">العدد : </label>
                                <input type="number" class="form-control" name="number_b">
                            </div>
                            <div class="form-group">
                                <label for="price">السعر : </label>
                                <input type="number" class="form-control" name="price">
                            </div>
                            <div class="form-group">
                                <label for="received_date">تاريخ الاستلام : </label>
                                <input type="date" class="form-control" name="received_date">
                            </div>
                            <div class="form-group">
                                <label for="payments">الدفعات : </label>
                                <input type="number" class="form-control" name="payments">
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
