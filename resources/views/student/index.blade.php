<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Student Data</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
  <h2>Student Data</h2>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
          @foreach ($students as $student)
      <tr>
        <td>{{$student->id}}</td>
        <td>{{$student->name}}</td>
        <td>{{$student->email}}</td>
        <td>{{$student->phone}}</td>
        <td><a href="{{route('student.edit',$student->id)}}" class="btn btn-primary">Edit</a></td>
        <td><button class="delete-user danger" data-user-id="{{ $student->id }}">Delete User</button></td>
        
      </tr>
      @endforeach
      <!-- Add more rows as needed -->
    </tbody>
  </table>
</div>

<!-- Bootstrap JavaScript (optional, but needed for some features) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    jQuery(document).ready(function ($) {
        $(".delete-user").click(function (e) {
            e.preventDefault();

            var studentId = $(this).data('user-id');

            $.ajax({
                type: "DELETE",
                url: '{{ route("student.delete", $student->id) }}',
               headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },

                success: function (data) {
                    console.log(data.message);
                    // Optionally, update the UI to remove the deleted student
                },
                error: function (error) {
                    console.log('Error:', error);
                }
            });
        });
    });
</script>


</body>
</html>
