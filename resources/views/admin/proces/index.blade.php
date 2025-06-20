@extends('admin.layout')
@section('content')
    <div class="title-page">
        <div>
            <h3>المواعيد</h3>
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
            إضيفة البيانات بنجاح
        </div>
    @endif
    <!-- Start sec-tabs -->
    <!-- Start sec-tabs -->
    <section class="sec-tabs" dir="rtl">
        <div class="container">
            <ul class="nav nav-tabs custem-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="register-tab" data-toggle="tab" href="#register-round" role="tab"
                        aria-controls="register" aria-selected="false"> جميع المواعيد </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " id="current-tab" data-toggle="tab" href="#current-round" role="tab"
                        aria-controls="current" aria-selected="true "> مواعيد اليوم</a>
                </li>
                <form method="get" action="{{url('admin/book/date')}}">
                    <div class="form-group">
                        <label for="message">صغير : </label>
                        <input type="text" name="fromdata">
                        <label for="message">كبير : </label>
                        <input type="text" name="data">
                        <button type="submit" class="btn btn-primary">بحث</button>
                    </div>
                </form>

            </ul>
            <div class="tab-content" id="myTabContent" style="margin-top: 50px">
                <div class="tab-pane fade" id="register-round" role="tabpanel" aria-labelledby="register-tab">
                    <div class="card-body table-responsive p-0 custum-table">
                        <table class="table table-hover text-nowrap" id="myTable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th> الاسم</th>
                                    <th>البريد الالكتروني</th>
                                    <th> رقم الجوال</th>
                                    <th> رسالتك</th>
                                    <th> تاريخ حجز</th>
                                    <th> </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bookeds as $index => $booked)
                                    <tr>
                                        <td>{{ ++$index }}</td>
                                        <td>{{ $booked->name }} </td>
                                        <td>{{ $booked->email }} </td>
                                        <td>{{ $booked->phone }} </td>
                                        <td>{{ $booked->message }} </td>
                                        <td>{{ $booked->date }} </td>


                                        <td>
                                            <div class="d-flex" style="display: flex; margin: 0 5px">
                                                <form style="display: inline-block;"
                                                    action="{{ route('booked.destroy', $booked->id) }}" method="POST" onsubmit="return confirm(' هل تريد ناكيد الحدف!؟ ')">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn delete-btn">
                                                        <i class="fa fa-btn fa-trash"></i>
                                                    </button>
                                                </form>
                                                <a href="{{ route('booked.edit', $booked->id) }}" class="btn edit-btn">
                                                    <i class="fa fa-btn fa-edit"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                            </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="current-round" role="tabpanel" aria-labelledby="current-tab">
                    <div class="card-body table-responsive p-0 custum-table">
                        <table class="table table-hover text-nowrap" id="myTable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th> الاسم</th>
                                    <th> رقم الجوال</th>
                                    <th> رسالتك</th>
                                    <th> تاريخ حجز</th>
                                    <th> </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($process as $index => $proces)
                                    <tr>
                                        <td>{{ ++$index }}</td>
                                        <td>{{ $proces->name }} </td>
                                        <td>{{ $proces->phone }} </td>
                                        <td>{{ $proces->message }} </td>
                                        <td>{{ $proces->date }} </td>
                                        <td>

                                        </td>
                                    </tr>
                            </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
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
                        <div class="card-body" style="padding: 15px">
                            <form method="post" action="{{ route('booked.store') }}">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name"> الاسم : </label>
                                        <input type="text" class="form-control" name="name">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">البريد الالكتروني : </label>
                                        <input type="text" class="form-control" name="email">
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">رقم جوال : </label>
                                        <input type="text" class="form-control" name="phone">
                                    </div>
                                    <div class="form-group">
                                        <label>رسالتك</label>
                                        <textarea class="form-control" rows="5" name="message"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="date">تاريخ الحجز : </label>
                                        <input type="date" class="form-control" name="date">
                                    </div>
                                    <div class="card-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">رجوع</button>
                                        <button type="submit" class="btn">إضافة</button>
                                    </div>
                            </form>

                        </div>
                    </div>

                </div>
    </section>
@endsection
