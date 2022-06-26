
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
            <form action="{{ route('student.store') }}" method="POST"  id="CreateStudent" enctype="multipart/form-data">
                @csrf
                Ten <input type="text" name="name" class="form-control" value="{{old('name')}}" >
                Birth <input type="date" name="birthday" class="form-control">
                <label for="">Gender</label>
                <div class="form-check">
                  <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="gender" id="gender1" value="0" checked>
                      <label class="form-check-label" for="gender1"> Men </label>
                  </div>
                  <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="gender" id="gender2" value="1" checked>
                      <label class="form-check-label" for="gender2"> Women  </label>
                  </div>
                </div>

                <label>Status</label>
                <select name="status" id="" class="form-select">
                   @foreach ( $arrStudentStatus as $status=>$value )
                         @if($loop->first)
                         <option value="{{$value}}" selected> {{$status}} </option>
                         @else
                       <option value="{{$value}}"> {{$status}}  </option>
                       @endif
                   @endforeach
                </select>

                 <label for="">course</label>
                  <select name="course_id" id="" class="form-select">
                    @foreach ( $courses as $course )
                     <option value="{{$course->id}}">{{$course->name}}</option>
                    @endforeach
                  </select>



                Description <input type="text" name="description" class="form-control"/>
                <input type="file" name="avatar" id="file">

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
