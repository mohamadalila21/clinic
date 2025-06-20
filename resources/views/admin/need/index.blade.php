@extends('admin.layout')
@section('content')
    <div class="title-page">
        <div>
            <h3>المستلزمات</h3>
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
        <div class="alert alert-dismissible alert-dismissible-custem">
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
                    <th>الصنف</th>
                    <th>العدد</th>
                    <th>سعر الواحد</th>
                    <th>اجمالي سعر</th>
                    <th> رقم الفاتورة</th>
                    <th>تاريخ الفاتورة</th>
                    <th> </th>


                </tr>
            </thead>
            <tbody>
                @foreach ($needs as $index => $need)
                    <tr>
                        <td>{{ ++$index }}</td>
                        <td>{{ $need->number }} </td>
                        <td>{{ $need->item }} </td>
                        <td>{{ $need->number_b }} </td>
                        <td>{{ $need->price }} </td>
                        <td>{{ $need->number_b*$need->price }} </td>
                        <td>{{ $need->invoice }} </td>
                        <td>{{ $need->invoice_date }} </td>
                        <td>
                            <div class="d-flex" style="display: flex; margin: 0 5px">
                                <form style="display: inline-block;" action="{{ route('need.destroy', $need->id) }}"
                                    method="POST" onsubmit="return confirm(' هل تريد ناكيد الحدف!؟ ')">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn delete-btn">
                                        <i class="fa fa-btn fa-trash"></i>
                                    </button>
                                </form>
                                <a href="{{ route('need.edit', $need->id) }}" class="btn edit-btn">
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
                    <form method="post" action="{{ route('need.store') }}">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="number">رقم العملية : </label>
                                <input type="number" class="form-control" name="number">
                            </div>
                            <div class="form-group">
                                <label for="item"> الصنف : </label>
                                <input type="text" class="form-control" name="item">
                            </div>
                            <div class="form-group">
                                <label for="number_b">العدد : </label>
                                <input type="text" class="form-control" name="number_b">
                            </div>
                            <div class="form-group">
                                <label for="price">سعر الواحد : </label>
                                <input type="number" class="form-control" name="price">
                            </div>
                            <div class="form-group">
                                <label for="invoice"> رقم الفاتورة : </label>
                                <input type="number" class="form-control" name="invoice">
                            </div>
                            <div class="form-group">
                                <label for="invoice_date">تاريخ الفاتورة : </label>
                                <input type="date" class="form-control" name="invoice_date">
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
