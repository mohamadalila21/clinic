@extends('admin.layout')
@section('content')
    <div class="title-page">
        <div>
            <h3> تعديل على ملف الموظف</h3>
        </div>
    </div>
    <div class="card-body card-edit">
        <form method="post" action="{{ route('employee.update', $employee->id) }}">
            @method('put')
            @csrf
            <div class="form-group">
                <label for="number">رقم موظف : </label>
                <input type="number" class="form-control" name="number" value="{{ $employee->number }}">
            </div>
            <div class="form-group">
                <label for="name">اسم موظف : </label>
                <input type="text" class="form-control" name="name" value="{{ $employee->name }}">
            </div>
            <div class="form-group">
                <label for="level">مستوى موظف : </label>
                <input type="text" class="form-control" name="level" value="{{ $employee->level }}">
            </div>
            <div class="form-group">
                <label for="job">عمل الموظف : </label>
                <input type="number" class="form-control" name="job" value="{{ $employee->job }}">
            </div>
            <div class="form-group">
                <label for="pay">راتب موظف : </label>
                <input type="number" class="form-control" name="pay" value="{{ $employee->pay }}">
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">تعديل</button>
            </div>
        </form>
    @endsection
