

    @extends('template')
    @section('content')

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="container-fluid">
        <table class="talbe table-bordered  " >
            <thead>
              <tr class="thead">
                  <td>Id </td>
                  <td>Name</td>
                  <td>Birth</td>
                  <td>Description</td>
                  <td>NameDes</td>
                  <td>Image</td>
                  <td>Update</td>
                  <td>Delete</td>
              </tr>
          </thead>
            @foreach ( $students as $student )
            <tbody>
               <tr class="tbody">
                   <td>{{$student->id}}</td>
                   <td>{{$student->name}}</td>
                   <td>{{$student->birthday}}</td>
                   <td>{{$student->description}}</td>
                   <td>{{$student->NameDes()}}</td>
                   <td><img src="{{asset('storage/'.$student->avatar.'')}}" height="50px" alt="" srcset=""></td>
                   <td><button class="btn btn-primary edit" type="button" data-bs-toggle="modal" data-bs-target="#UpdateForm" >Update</button></td>
                   <td><button class="btn btn-primary delete" >Delete</button></td>
              </tr>
            </tbody>
            @endforeach
         </table>


     <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#AddForm">
        Add
     </button>

     {{$students->links()}}
    </div>



      @include('Students.StudentEdit')
      @include('Students.StudentCreate')


   <script type="text/javascript">
     $(document).ready(function() {

            $('.delete').click(function() {
               $id=$(this).parents('.tbody').children().html();
               if(confirm('Are you sure you want to delete this student?')){
                    $.ajax({
                    type: "DELETE",
                    url: "{{route('student.delete')}}",
                    data:{"_token": "{{ csrf_token() }}",id:$id} ,
                    success: function (response) {
                        alert( response)
                        window.location.reload()
                    }
                   });
               }
               else{
                return false;
               }

          })

          $('.edit').click(function() {
             $id=$(this).parents('.tbody').children().html();
              $.ajax({
                type: "get",
                url: "{{route('student.edit')}}",
                data: {id:$id},
                dataType: "json",
                success: function (response) {
                    console.log(response);
                    $('#name').val(response.students.name)
                    $('#birthday').val(response.students.birthday)
                    $('#description').val(response.students.description)
                    $('#id').val(response.students.id)
                    $('#course_id').val(response.students.course_id)
                    $('#status').val(response.students.status)
                    $('input[name=gender][value='+response.students.gender+']').attr('checked', 'checked')



                }

            });
          })

           $('#CreateStudent').submit(function (event) {
              event.preventDefault();
              var form = $(this);
              var actionUrl = form.attr('action');
              $.ajax({
                type: "POST",
                url: actionUrl,
                data: new FormData(this),
                contentType: false,
                processData: false,
                cache: false,
                success: function (response) {
                    alert('them thannh cong')
                    window.location.reload()
                },
                error: function (response) {
                    errors=response.responseJSON.errors;
                    messageError=""
                    for(error in errors){
                      messageError += errors[error][0] +'\n';
                    }

                    alert(messageError)
                }
              });
           })

           $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });

           $('#UpdateStudent').submit(function (e) {
              e.preventDefault();
              var form = $(this)
              var actionUrl = form.attr('action');
              $.ajax({
                type: "POST",
                url: actionUrl,
                data: new FormData(this),
                contentType: false,
                processData: false,
                cache: false,

                success: function (response) {
                    alert('sua thanh cong')
                    window.location.reload()
                },
                error: function (response) {
                    errors=response.responseJSON.errors;
                    messageError=""
                    for(error in errors){
                      messageError += errors[error][0] +'\n';
                    }

                    alert(messageError)
                }
              });

           })
    })


   </script>

 @endsection



