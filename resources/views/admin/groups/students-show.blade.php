@extends('admin.layouts.master')
@section('content')
<!-- Nav Header Component Start -->
<x-dashboard.base.nav>
    <x-slot:heading>
        اسم المجموعه : ({{ $group->name }}) <br>
        المستوي : ({{ $group->level->name }}) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        الماده : ({{ $group->course->name }})
        </x-slot>
        {{-- We are on a mission to help developers like you build successful projects for FREE. --}}
        {{-- <x-slot:link>
            {{ route('create_group_students', $group->id) }}
            </x-slot> --}}
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
                        <div class="table-responsive">
                            <table id="user-list-table" class="table table-striped" role="grid">
                                <thead>
                                    <tr class="ligth">
                                        <th class="text-center">#</th>
                                        <th>رقم الطالب</th>
                                        <th>اسم الطالب</th>
                                        <th>الهاتف</th>
                                        <th>حالة الدفع</th>
                                        <th style="min-width: 100px">الإعدادات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($students as $index=>$student)
                                    <tr>
                                        <td class="text-center">{{ $index+1 }}</td>
                                        <td>{{ $student->student->barcode }}</td>
                                        <td>{{ $student->student->name }}</td>
                                        <td>{{ $student->student->phone }}</td>
                                        @if($student->end_date == null)
                                        <td><span class="badge bg-danger">لم يدفع</span></td>
                                        @else
                                        <td><span class="badge bg-primary">تم الدقع</span></td>
                                        @endif

                                        <td>
                                            <div class="flex align-items-center list-user-action"
                                                style="display: flex;">
                                                {{-- <x-dashboard.a-edit href="{{ route('students.edit', $student->id) }}">
                                                </x-dashboard.a-edit>&nbsp; --}}
                                                {{-- <form action="{{ route('students.destroy', $student->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <x-dashboard.delete-button></x-dashboard.delete-button>
                                                </form> --}}
                                                <button type="button" class="btn btn-info btn-sm"
                                                    onclick='openmodle("{{route("printbarcode",["id" => $student->student->id] ) }}")'>
                                                    <svg xmlns="http://www.w3.org/2000/svg" height="1em"
                                                        viewBox="0 0 512 512">
                                                        <path
                                                            d="M128 0C92.7 0 64 28.7 64 64v96h64V64H354.7L384 93.3V160h64V93.3c0-17-6.7-33.3-18.7-45.3L400 18.7C388 6.7 371.7 0 354.7 0H128zM384 352v32 64H128V384 368 352H384zm64 32h32c17.7 0 32-14.3 32-32V256c0-35.3-28.7-64-64-64H64c-35.3 0-64 28.7-64 64v96c0 17.7 14.3 32 32 32H64v64c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V384zM432 248a24 24 0 1 1 0 48 24 24 0 1 1 0-48z" />
                                                    </svg></button>
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