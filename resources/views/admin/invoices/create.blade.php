@extends('admin.layouts.master')
@section('content')
<!-- Nav Header Component Start -->
<x-dashboard.base.nav>
    <x-slot:heading>
        الطلاب
        </x-slot>
        {{-- We are on a mission to help developers like you build successful projects for FREE. --}}
        <x-slot:link>
            {{ route('students.create') }}
            </x-slot>
</x-dashboard.base.nav>
<!-- Nav Header Component End -->
<!--Nav End-->
</div>
{{-- content --}}
<div class="conatiner-fluid content-inner mt-n5 py-0">
    <iframe id="iframe" src="" style="display:none;"></iframe>
    <div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">الطلاب</h4>
                        </div>
                    </div>
                    <div class="card-body px-0">
                        <form action="{{ route('students.index') }}" method="get" style="padding: 20px;">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <input type="text" class="form-control" placeholder="بحث" name="search"
                                        value="{{ $search }}">
                                </div>
                                <div class="col-md-4 ">
                                    <button type="submit" class="btn btn-primary"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                            <path
                                                d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                                        </svg>
                                    </button>
                                    <a class="btn btn-danger" href="{{ route('students.index')}}"><span
                                            aria-hidden="true">&times;</span></a>
                                </div>
                            </div>
                        </form>
                        <div class="table-responsive">
                            <table id="user-list-table" class="table table-striped" role="grid">
                                <thead>
                                    <tr class="ligth">
                                        <th class="text-center">#</th>
                                        <th>رقم الطالب</th>
                                        <th>اسم الطالب</th>
                                        <th>الهاتف</th>
                                        <th>المستوي</th>
                                        <th>المجموعات</th>
                                        {{-- <th>المادة</th> --}}
                                        <th style="min-width: 100px">الإعدادات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($students as $index=>$student)
                                    <tr>
                                        <td class="text-center">{{ $index+1 }}</td>
                                        <td>{{ $student->barcode }}</td>
                                        <td>{{ $student->name }}</td>
                                        <td>{{ $student->phone }}</td>
                                        <td>{{ $student->level->name }}</td>
                                        <td>
                                            @foreach ($student->studentGroups as $group)
                                            {{ $group->group->name }}&nbsp;
                                            @if ($group->dept_class_no > 0)
                                            <span class="badge bg-warning">{{ $group->dept_class_no }} </span> &nbsp;
                                            @elseif ($group->end_date == null)
                                            <span class="badge bg-danger">لم يدقع</span>
                                            <x-dashboard.a-edit
                                                href="{{ route('student_pay', [$student->id , $group->id]) }}">
                                            </x-dashboard.a-edit>&nbsp;
                                            @elseif ($group->end_date != null)
                                            <span class="badge bg-primary">تم الدفع </span> &nbsp;
                                            @endif
                                            @endforeach
                                        </td>
                                        <td>
                                            <div class="flex align-items-center list-user-action"
                                                style="display: flex;">
                                                <x-dashboard.a-show href="{{ route('pay_create', $student->id) }}">
                                                </x-dashboard.a-show>&nbsp;
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $students->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function openmodle(url){
    document.getElementById("iframe").src=url;
  }
</script>
@endsection