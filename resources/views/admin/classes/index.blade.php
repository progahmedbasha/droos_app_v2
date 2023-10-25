@extends('admin.layouts.master')
@section('content')
<!-- Nav Header Component Start -->
<x-dashboard.base.nav>
    <x-slot:heading>
        بدأ حصة
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
                            <h4 class="card-title">المجموعــات</h4>
                        </div>
                    </div>
                    <div class="card-body px-3">
                        <div class="col-sm-12 col-lg-6">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between">
                                    <div class="header-title">
                                        <h4 class="card-title">اختيار مجموعه</h4>
                                    </div>
                                </div>
                                <div class="card-body">
                                    {{-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vulputate, ex ac
                                        venenatis mollis, diam nibh finibus leo</p> --}}
                                    <form action="{{route('classes.store')}}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label class="form-label" for="email">المجموعه :</label>
                                            <select class="form-control" name="group_id">
                                                <option value="">المجموعه</option>
                                                @foreach ($groups as $group)
                                                <option value="{{$group->id}}">
                                                    {{$group->name}} | {{ $group->course->name }} | {{ $group->level->name }}
                                                </option>
                                                @endforeach
                                            </select>
                                            @error('group_id')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <div class="form-check d-block">
                                                <input class="form-check-input" type="radio" name="type" value="1"
                                                    id="type2" checked="">
                                                <label class="form-check-label" for="type2">
                                                    حصة عادية
                                                </label>
                                            </div>
                                            {{-- <div class="form-check d-block">
                                                <input class="form-check-input" type="radio" name="type" value="2"
                                                    id="typetwo">
                                                <label class="form-check-label" for="type2">
                                                    مراجعة
                                                </label>
                                            </div> --}}
                                            <div id="block" style="display: none" ;>
                                                <input type="number" class="form-control" name="price" value="{{ old('price') }}"
                                                    placeholder="السعر">
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary">بدأ</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready(function(){
   // start show and hide input
   $("#type2").click(function(){
        $("#block").hide(500);
      });
   $("#typetwo").click(function(){
        $("#block").show(500);
      });
});
</script>
@endsection