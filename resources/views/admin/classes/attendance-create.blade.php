@extends('admin.layouts.master')
@section('content')
<!-- Nav Header Component Start -->
<x-dashboard.base.nav>

    <x-slot:heading>
        تسجيل الحضور للحصة : ({{ $class->id }})

        </x-slot>
        {{-- We are on a mission to help developers like you build successful projects for FREE. --}}
</x-dashboard.base.nav>
<!-- Nav Header Component End -->
<!--Nav End-->
</div>
{{-- content --}}
<div class="conatiner-fluid content-inner mt-n5 py-0">
    {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
    Open modal
  </button> --}}
    @if(Session::has('paymentshowdialog'))
    <script>
        $(function() {
            $('#myModal').modal('show');
        });
    </script>
    @endif
    @include('admin.classes.paymentmodal')
    @if(Session::has('payment'))
    <script>
        $(function() {
            $('#PayModal').modal('show');
        });
    </script>
    @endif
    @include('admin.classes.paymodal')
    <div>



        <div class="row">
            <div class="col-xl-5 col-lg-4">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">الطلاب المسجلين : {{ count($students) }}</h4>
                        </div>
                    </div>
                    <hr class="hr-horizontal">
                    <div class="card-body" style="max-height: 50%;">
                        <div class="table-responsive" style="max-height: 30%;">
                            <table id="user-list-table" class="table table-striped" role="grid">
                                <thead>
                                    <tr class="ligth">
                                        <th class="text-center">#</th>
                                        <th>اسم الطالب</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($students as $index=>$student)
                                    <tr>
                                        <td class="text-center">{{ $index+1 }}</td>
                                        <td>{{ $student->student->name }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-7 col-lg-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">تسجيل الحضور</h4>
                        </div>
                    </div>
                    <hr class="hr-horizontal">
                    <div class="card-body">
                        <div class="new-user-info">
                            <form action="{{route('attendances.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" value="{{ $id }}" name="class_id">
                                <input type="hidden" value="{{ $class->group_id }}" name="group_id">
                                <input type="hidden" value="{{ $class->type }}" name="type">
                                <div class="form-group">
                                    <label class="form-label" for="email">الطالب :</label>
                                    <input type="text" class="form-control" placeholder="الباركود" name="barcode"
                                        autofocus="autofocus" value="{{ old('barcode') }}" required />
                                    @error('barcode')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">تسجيل</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div style="display: contents;">
                    <a style="float: left;" class="btn btn-danger" href="{{ route('end-class', $id)}}">غلق الحصة</a>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection