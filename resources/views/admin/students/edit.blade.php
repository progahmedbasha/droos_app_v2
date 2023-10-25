@extends('admin.layouts.master')
@section('content')
<!-- Nav Header Component Start -->
<x-dashboard.base.nav>
    <x-slot:heading>
        الطلاب
        </x-slot>
        {{-- We are on a mission to help developers like you build successful projects for FREE. --}}
</x-dashboard.base.nav>
<!-- Nav Header Component End -->
<!--Nav End-->
</div>
{{-- content --}}

<div class="conatiner-fluid content-inner mt-n5 py-0">
    <div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">الطلاب</h4>
                        </div>
                    </div>
                    <div class="card-body px-3">
                        <div class="col-sm-12 col-lg-6">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between">
                                    <div class="header-title">
                                        <h4 class="card-title">تعديل بيانات طالب</h4>
                                    </div>
                                </div>
                                <div class="card-body">
                                    {{-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vulputate, ex ac
                                        venenatis mollis, diam nibh finibus leo</p> --}}
                                    <form action="{{route('students.update',$student->id)}}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('patch')
                                        <div class="form-group">
                                            <label class="form-label" for="email">اسم الطالب :</label>
                                            <input type="text" class="form-control" placeholder="الاسم" name="name"
                                                value="{{ $student->name }}" required />
                                            @error('name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="email">رقم الهاتف :</label>
                                            <input type="text" class="form-control" placeholder="الرقم" name="phone"
                                                value="{{ $student->phone }}" required />
                                            @error('phone')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="email"> المستوي :</label>
                                            <select class="form-control" name="level_id">
                                                <option value="">المستوي</option>
                                                @foreach ($levels as $level)
                                                <option value="{{$level->id}}" {{($student->level_id ==
                                                    $level->id)?'selected':''}}>
                                                    {{$level->name}}
                                                </option>
                                                @endforeach
                                            </select>
                                            @error('level_id')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">صورة الطالب :</label>
                                            <div class="row">
                                                <div class="col">
                                                    <input type="file" class="form-control" name="photo"
                                                        accept="image/*">
                                                </div>
                                                <div class="col-3">
                                                    @if(!empty($student->photo))
                                                    <img src="{{url($student->image)}}/{{$student->photo }}"
                                                        class="w3-round" width="100px" alt="Norway">
                                                    @else
                                                    <img src="{{url('/data/error.png')}}" class="w3-round" width="100px"
                                                        alt="Norway">
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary">حفظ</button>
                                    </form>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header d-flex justify-content-between">
                                    <div class="header-title">
                                        <h4 class="card-title"> المجموعات :</h4>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>الماده</th>
                                                    <th>المجموعه</th>
                                                    {{-- <th>اعدادات</th> --}}
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($courses as $course)
                                                <tr>
                                                    <td>{{ $course->name }}</td>
                                                    @if (count($course->groups) > 0)
                                                    <td>{{$course->groups[0]->name}}</td>
                                                    @else
                                                    <td>-</td>
                                                    @endif
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection