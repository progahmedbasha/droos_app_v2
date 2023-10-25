@extends('admin.layouts.master')
@section('content')
<!-- Nav Header Component Start -->
<x-dashboard.base.nav>
    <x-slot:heading>
        اضافة طالب
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
                                        <h4 class="card-title">بيانات الطالب</h4>
                                    </div>
                                </div>
                                    <form action="{{route('students.store')}}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                <div class="card-body">
                                    {{-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vulputate, ex ac
                                        venenatis mollis, diam nibh finibus leo</p> --}}
                                        <div class="form-group">
                                            <label class="form-label" for="email">اسم الطالب :</label>
                                            <input type="text" class="form-control" placeholder="الاسم" name="name"
                                                value="{{ old('name') }}" required />
                                            @error('name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="email">رقم الهاتف :</label>
                                            <input type="text" class="form-control" placeholder="الرقم" name="phone"
                                                value="{{ old('phone') }}" required />
                                            @error('phone')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="email"> المستوي :</label>
                                            <select class="form-control" name="level_id">
                                                <option value="">المستوي</option>
                                                @foreach ($levels as $level)
                                                <option value="{{$level->id}}">
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
                                            <input type="file" class="form-control" name="photo" accept="image/*">
                                        </div>
                                        
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header d-flex justify-content-between">
                                    <div class="header-title">
                                        <h4 class="card-title">المجموعات :</h4>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="new-user-info">
                                        @foreach ($courses as $course)
                                        <div class="form-group">
                                            <label class="form-label">{{ $course->name }}</label>
                                            <select class="form-control" name="group_id[]">
                                                <option value="" selected disabled>المجموعه</option>
                                                @foreach ($course->groups as $group)
                                                <option value="{{$group->id}}">
                                                    {{$group->name}} | {{$group->level->name}}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">حفظ</button>
                                    </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection