


<div class="modal" id="AddForm">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Modal Heading</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
            <form action="{{ route('student.store') }}" method="POST"  id="CreateStudent">
                @csrf
                Ten <input type="text" name="name" class="form-control" >
                Birth <input type="date" name="birthday" class="form-control">
                Description <input type="text" name="description" class="form-control"/>
             </form>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
          <button class="btn btn-primary" type="submit" form="CreateStudent" >Nhap</button>
        </div>

      </div>
    </div>
  </div>
