@extends('admin.layout')
@section('content')
    <div class="title-page">
        <div>
            <h3> تعديل على المستلزمات</h3>
        </div>
    </div>
    <div class="card-body card-edit">
        <form method="post" action="{{ route('need.update', $need->id) }}">
            @method('put')
            @csrf
            <div class="form-group">
                <label for="number">رقم العملية : </label>
                <input type="text" class="form-control" name="number" value="{{ $need->number }}">
            </div>
            <div class="form-group">
                <label for="item"> الصنف : </label>
                <input type="text" class="form-control" name="item" value="{{ $need->item }}">
            </div>
            <div class="form-group">
                <label for="number_b">العدد : </label>
                <input type="text" class="form-control" name="number_b" value="{{ $need->number_b }}">
            </div>
            <div class="form-group">
                <label for="price">سعر الواحد : </label>
                <input type="text" class="form-control" name="price" value="{{ $need->price }}">
            </div>
            <div class="form-group">
                <label for="invoice"> رقم الفاتورة : </label>
                <input type="text" class="form-control" name="invoice" value="{{ $need->invoice }}">
            </div>
            <div class="form-group">
                <label for="invoice_date">تاريخ الفاتورة : </label>
                <input type="text" class="form-control" name="invoice_date" value="{{ $need->invoice_date }}">
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">تعديل</button>
            </div>
        </form>
    @endsection
