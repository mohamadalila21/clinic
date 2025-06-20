@extends('admin.layout')
@section('content')
<div class="title-page">
    <div>
        <h3> تعديل على طلبيات المعمل الفني</h3>
    </div>
</div>
  <div class="card-body card-edit">
  <form method="post" action="{{route('lab.update',$lab->id)}}" >
    @method('put')
      @csrf
      <div class="form-group">
          <label for="number">رقم العملية : </label>
          <input type="text" class="form-control"  name="number" value="{{$lab->number}}">
        </div>
        <div class="form-group">
          <label for="type"> نوع التلبسية  : </label>
          <input type="text" class="form-control"  name="type" value="{{$lab->type}}">
        </div>
        <div class="form-group">
          <label for="number_b">العدد : </label>
          <input type="text" class="form-control"  name="number_b" value="{{$lab->number_b}}">
        </div>
        <div class="form-group">
          <label for="price">السعر : </label>
          <input type="text" class="form-control"  name="price" value="{{$lab->price}}">
        </div>

        <div class="form-group">
          <label for="received_date">تاريخ الاستلام : </label>
          <input type="text" class="form-control"  name="received_date" value="{{$lab->received_date}}">
        </div>
        <div class="form-group">
          <label for="payments">الدفعات : </label>
          <input type="text" class="form-control"  name="payments" value="{{$lab->payments}}">
        </div>



      <div class="card-footer">
        <button type="submit" class="btn btn-primary">تعديل</button>
      </div>
  </form>
  </div>
@endsection
