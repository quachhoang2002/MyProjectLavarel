<div class="modal" id="UpdateForm">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Modal Heading</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
            <form action="{{ route('student.update') }}" method="patch" id="UpdateStudent">
                @csrf
                <input type="hidden" name="id" id="id" value="">
                Ten <input type="text" name="name" class="form-control" value="" id="name" >
                Birth <input type="date" name="birthday" class="form-control" value="" id="birthday">
                Description <input type="text" name="description" class="form-control" value="" id="description"/>
             </form>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
          <button class="btn btn-primary" type="submit" form="UpdateStudent" id="update" >Nhap</button>
        </div>

      </div>
    </div>
  </div>
