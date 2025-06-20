@extends('admin.layout')
@section('content')
    <div class="title-page">
        <div>
            <h3> تعديل على الدفعات</h3>
        </div>
    </div>
    <div class="card-body card-edit">
        <form method="post" action="{{ route('payment.update', $payment->id) }}">
            @method('put')
            @csrf
            <div class="form-group">
                <label for="number">رقم العملية : </label>
                <input type="text" class="form-control" name="number" value="{{ $payment->number }}">
            </div>
            <div class="form-group">
                <label for="batch"> الدفعة : </label>
                <input type="text" class="form-control" name="batch" value="{{ $payment->batch }}">
            </div>
            <div class="form-group">
                <label for="number_b">رقم الفاتورة : </label>
                <input type="text" class="form-control" name="number_b" value="{{ $payment->number_b }}">
            </div>
            <div class="form-group">
                <label for="invoice_date">تاريخ الفاتورة : </label>
                <input type="text" class="form-control" name="invoice_date" value="{{ $payment->invoice_date }}">
            </div>
            <div class="form-group">
                <label for="condition"> الحالة : </label>
                <input type="text" class="form-control" name="condition" value="{{ $payment->condition }}">
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">تعديل</button>
            </div>
        </form>
    @endsection
