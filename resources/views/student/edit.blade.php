<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Edit Student</title>
</head>
<body>

<div class="container mt-5">
    <h2>Edit Form</h2>
    <form id="myForm" enctype="multipart/form-data">
        @csrf
         @method('PUT')
        <div class="form-row">
       <div class="form-group col-md-6">
    <label for="name">Name:</label>
    <input type="text" class="form-control" id="name" name="name" value = "{{$data->name}}">
    @error('name')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
        <div class="form-group col-md-6">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" value ="{{$data->email}}">
        </div>
        </div>
        <div class="form-row">
             <div class="form-group col-md-6">
            <label for="phone">Phone:</label>
            <input type="tel" class="form-control" id="phone" name="phone" value ="{{$data->phone}}">
        </div>
          <div class="form-row">
           <div class="mb-3">
         
        
     <div class="pull-right">
        <label for="image">Choosen Image:</label>
            <img src="{{Storage::disk('local')->url($data->image)}}" alt="">
                <label for="image">Choose data</label>
                <input type="file" name="image" id="image" class="form-control"/>
    </div>
       
    <div class="form-group col-md-6">
            <label for="message">Address:</label>
            <textarea class="form-control" id="address" rows="4" name="address" >{{$data->address}} </textarea>
        </div>
        <div class="text-center"> <!-- Center the button -->
            <button type="submit" class="btn btn-primary">Update</button>
            

        </div>
    </form>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function(){
            
        $("#myForm").submit(function(e){
            e.preventDefault();
             var formData = new FormData($(this)[0]);
             var csrfToken = '{{ csrf_token() }}';
            $.ajax({
                data:formData,
                method:'POST',
                 url: '{{ route("student.update", $data->id) }}',
                 headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
               contentType: false,
                processData: false,
                success: function (data) {
                    console.log('Updation was successful.');
                    console.log(data); // You can handle the response here
                },
                error: function (data) {
                    console.log('An error occurred.');
                    console.log(data); // You can handle the error response here
                }
            })
        });
    });

</script>
      

</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</body>
</html>
