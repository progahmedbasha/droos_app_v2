@extends('admin.layouts.master')
@section('content')
<!-- Nav Header Component Start -->
<x-dashboard.base.nav>
    <x-slot:heading>
        المستوي - الثاني الثانوي
        </x-slot>
        {{-- We are on a mission to help developers like you build successful projects for FREE. --}}
</x-dashboard.base.nav>
<!-- Nav Header Component End -->
<!--Nav End-->
</div>
{{-- content --}}

<div class="conatiner-fluid content-inner mt-n5 py-0">
    {{-- <div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title"></h4>
                        </div>
                    </div>
                    <div class="card-body px-0">
                        <div class="col-sm-12 col-lg-6">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between">
                                    <div class="header-title">
                                        <h4 class="card-title">تعديل سعر الحصـــة</h4>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form action="{{route('levels.update',$level->id)}}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('patch')
                                        <div class="form-group">
                                            <label class="form-label" for="email">سعر الحصة:</label>
                                            <input type="number" class="form-control" placeholder="السعر"
                                                name="one_price" value="{{ $level->one_price }}" required />
                                            @error('one_price')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
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
    </div> --}}


    <div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">بيانات الشهر</h4>
                        </div>
                    </div>
                    <div class="card-body px-0">
                        <div class="col-sm-12 col-lg-6">
                            <div class="card">
                                @if ($last_month == '' || ($last_month != '' && $last_month->days <= 2) )
                                <div class="card-header d-flex justify-content-between">
                                    <div class="header-title">
                                        <h4 class="card-title">اضافة شهر</h4>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form action="{{route('level-store-month')}}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="level_id" value="{{ $level->id }}">
                                        <div class="form-group">
                                            <label class="form-label" for="email">السعر :</label>
                                            <input type="number" class="form-control" placeholder="السعر" name="price"
                                                value="{{ old('price') }}" required />
                                            @error('price')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">تاريخ البدأ :</label>
                                            <input type="date" class="form-control" name="start_date"
                                                value="{{ old('start_date') }}" required />
                                            @error('start_date')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">تاريخ انتهاء :</label>
                                            <input type="date" class="form-control" name="end_date"
                                                value="{{ old('end_date') }}" required />
                                            @error('end_date')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <button type="submit" class="btn btn-primary">حفظ</button>
                                    </form>
                                </div>
                                @endif
                            </div>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>السعر</th>
                                        <th>تاريخ البداية</th>
                                        <th>تاريخ انتهاء</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($monthes as $index=>$month)
                                    <tr>
                                        <td>{{ $index+1 }}</td>
                                        <td>{{ $month->price }}</td>
                                        <td>{{ $month->start_date->format('Y/m/d') }}</td>
                                        <td>{{ $month->end_date->format('Y/m/d') }}</td>
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



@endsection