<div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">هذا الطالب لم يقم بالدفع</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            {{-- <div class="modal-body">
        Modal body..
      </div> --}}

            <!-- Modal footer -->
            <div class="modal-footer">
                <form action="{{route('attend-and-skip')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" value="{{ Session::get( 'student_id' ) }}" name="student_id">
                    <input type="hidden" value="{{ Session::get( 'class_id' ) }}" name="class_id">
                    <input type="hidden" value="{{ Session::get( 'group_id' ) }}" name="group_id">
                     <button type="submit" class="btn btn-warning">حضور وتخطي</button>
                </form>
                <form action="{{route('pay-and-attend')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" value="{{ Session::get( 'student_id' ) }}" name="student_id">
                    <input type="hidden" value="{{ Session::get( 'class_id' ) }}" name="class_id">
                    <input type="hidden" value="{{ Session::get( 'group_id' ) }}" name="group_id">
                     <button type="submit" class="btn btn-success">دفع وحضور</button>
                </form>
            </div>

        </div>
    </div>
</div>