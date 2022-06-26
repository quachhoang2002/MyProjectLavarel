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
            <form action="{{ route('student.update') }}" method="patch" id="UpdateStudent" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <input type="hidden" name="id" id="id" value="">
                Ten <input type="text" name="name" class="form-control" value="{{old('name')}}"  id="name">
                Birth <input type="date" name="birthday" class="form-control" id="birthday">
                <label for="">Gender</label>
                <div class="form-check">
                  <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="gender" id="gender1" class="gender" value="0" >
                      <label class="form-check-label" for="gender1"> Men </label>
                  </div>
                  <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="gender" id="gender2"  class="gender" value="1" >
                      <label class="form-check-label" for="gender2"> Women  </label>
                  </div>
                </div>

                <label>Status</label>
                <select name="status" class="form-select" id="status">
                   @foreach ( $arrStudentStatus as $status=>$value )
                       <option value="{{$value}}"> {{$status}}  </option>
                   @endforeach
                </select>

                 <label for="">course</label>
                  <select name="course_id" class="form-select" id="course_id">
                    @foreach ( $courses as $course )
                     <option value="{{$course->id}}">{{$course->name}}</option>
                    @endforeach
                  </select>

                Description <input type="text" name="description" class="form-control" id="description"/>
                <input type="file" name="avatar" id="file">


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
