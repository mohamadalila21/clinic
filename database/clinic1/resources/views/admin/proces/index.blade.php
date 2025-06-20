@extends('admin.layout')
@section('content')
    <!-- Start sec-tabs -->
    <!-- Start sec-tabs -->
    <section class="sec-tabs" dir="rtl">
        <div class="container">




            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="register-tab" data-toggle="tab" href="#register-round" role="tab"
                        aria-controls="register" aria-selected="false"> حجزات </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " id="current-tab" data-toggle="tab" href="#current-round" role="tab"
                        aria-controls="current" aria-selected="true"> عمليات اليوم</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade" id="register-round" role="tabpanel" aria-labelledby="register-tab">
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap" id="myTable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th> الاسم</th>
                                    <th>البريد الالكتروني</th>
                                    <th> رقم الجوال</th>
                                    <th> رسالتك</th>
                                    <th> تاريخ حجز</th>
                                    <th><button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#exampleModal">
                                        <i class="pe-7s-plus">إضافة</i>
                                        </button>
                                    </th>
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
                                            <form style="display: inline-block;"
                                                action="{{ route('booked.destroy', $booked->id) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fa fa-btn fa-trash"></i>حذف
                                                </button>
                                            </form>
                                            <a href="{{route('booked.edit',$booked->id)}}" class="btn btn-info">
                                                <i class="fa fa-btn fa-edit"></i>تعديل

                                        </td>
                                    </tr>
                            </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">إضافة البيانات</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                  <div class="card-body">
                  <form method="post" action="{{route('booked.store')}}" >
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
                          <label for="name"> الاسم : </label>
                          <input type="text" class="form-control"  name="name">
                        </div>
                        <div class="form-group">
                          <label for="email">البريد الالكتروني : </label>
                          <input type="text" class="form-control"  name="email">
                        </div>
                        <div class="form-group">
                          <label for="phone">رقم جوال   : </label>
                          <input type="text" class="form-control"  name="phone">
                        </div>
                        <div class="form-group">
                        <label>رسالتك</label>
                        <textarea class="form-control" rows="5" name="message"></textarea>
                        </div>
                        <div class="form-group">
                          <label for="date">تاريخ الحجز  : </label>
                          <input type="date" class="form-control"  name="date">
                        </div>
                      <div class="card-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">رجوع</button>
                        <button type="submit" class="btn btn-primary">إضافة</button>
                      </div>
                    </form>

                  </div>
                  
                <div class="tab-pane fade" id="current-round" role="tabpanel" aria-labelledby="current-tab">
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap" id="myTable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th> الاسم</th>
                                    <th> رقم الجوال</th>
                                    <th> رسالتك</th>
                                    <th> تاريخ حجز</th>
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








        </div>
    </section>
@endsection
