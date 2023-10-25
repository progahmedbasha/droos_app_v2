<div class="modal fade" id="PayModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">الدفع</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            {{-- <div class="modal-body">
        Modal body..
      </div> --}}

            <!-- Modal footer -->
            <div class="modal-footer">
                <form action="{{route('pay-per-class')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" value="{{ Session::get( 'student_id' ) }}" name="student_id">
                    <input type="hidden" value="{{ Session::get( 'class_id' ) }}" name="class_id">
                    <input type="hidden" value="{{ Session::get( 'group_id' ) }}" name="group_id">
                     <button type="submit" class="btn btn-warning">دفع بالحصة ({{ Session::get( 'one_price' ) }})</button>
                </form>
                <form action="{{route('pay-per-month')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" value="{{ Session::get( 'student_id' ) }}" name="student_id">
                    <input type="hidden" value="{{ Session::get( 'class_id' ) }}" name="class_id">
                    <input type="hidden" value="{{ Session::get( 'group_id' ) }}" name="group_id">
                    <input type="hidden" value="{{ Session::get( 'month_end_date' ) }}" name="end_date">
                     <button type="submit" class="btn btn-success">دفع بالشهر ({{ Session::get( 'month_price' ) }})</button>
                </form>
            </div>

        </div>
    </div>
</div>