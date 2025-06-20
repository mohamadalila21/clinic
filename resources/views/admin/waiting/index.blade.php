@extends('admin.layout')
@section('content')
    <div class="title-page">
        <h3>حجوزات الموقع</h3>
    </div>
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
                    <th> حالة</th>
                    <th> جذف</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($waitings as $index => $waiting)
                    <tr>
                        <td>{{ ++$index }}</td>
                        <td>{{ $waiting->name }} </td>
                        <td>{{ $waiting->email }} </td>
                        <td>{{ $waiting->phone }} </td>
                        <td>{{ $waiting->message }} </td>
                        <td>{{ $waiting->date }} </td>
                        <td>{{ $waiting->selection }} </td>

                        <td>
                            <form style="display: inline-block;" action="{{ route('waiting.destroy', $waiting->id) }}"
                                method="POST" onsubmit="return confirm(' هل تريد ناكيد الحدف!؟ ')">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn delete-btn">
                                    <i class="fa fa-btn fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
            </tbody>
            @endforeach
        </table>
    </div>
@endsection
