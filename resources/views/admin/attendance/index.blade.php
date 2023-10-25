@extends('admin.layouts.master')
@section('content')
<!-- Nav Header Component Start -->
<x-dashboard.base.nav>
    <x-slot:heading>
        الغياب
        </x-slot>
        {{-- We are on a mission to help developers like you build successful projects for FREE. --}}
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
                            <h4 class="card-title">الغياب</h4>
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
                                    <form action="{{route('attendance_show')}}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label class="form-label" for="email">المجموعه :</label>
                                            <select class="form-control" id="group" name="group_id">
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
                                            <label class="form-label" for="email">الشهر :</label>
                                            <select class="form-control" id="month" name="month_id">
                                                <option value="">الشهر</option>
                                                @foreach ($monthes as $month)
                                                <option class="group_id" value="{{$month->id}}">
                                                    {{$month->start_date->format('M')}}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        
                                        <button type="submit" class="btn btn-primary">عرض</button>
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

<script>
    	  ////////////////////for fetch branch////////////
	   $(document).ready(function () {
          $('#group').on('change', function () {
              var group_id = $('.group_id').val();
              $.ajax({
                  url: "{{route('fetch-monthes')}}",
                  type: "POST",
                  data: {
                      group_id: group_id,
                      _token: '{{csrf_token()}}'
                  },
                 success:function(response){
					      $('#month').html(response.result);
                  },
              });
          });  	
      });
 ////////////////////for fetch branch////////////
</script>
@endsection