<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Contact Form</title>
</head>
<body>

<div class="container mt-5">
    <h2>Contact Form</h2>
    <form id="myForm" enctype="multipart/form-data">
        @csrf
        <div class="form-row">
       <div class="form-group col-md-6">
    <label for="name">Name:</label>
    <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name">
    @error('name')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
        <div class="form-group col-md-6">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" >
        </div>
        </div>
        <div class="form-row">
             <div class="form-group col-md-6">
            <label for="phone">Phone:</label>
            <input type="tel" class="form-control" id="phone" name="phone" placeholder="Enter your phone number" >
        </div>
          <div class="form-row">
           <div class="mb-3">
            <label for="formFile" class="form-label">Default file input example</label>
            <input class="form-control" type="file" name = "image"  id="image">
            </div>
    </div>
    <div class="form-group col-md-6">
            <label for="message">Address:</label>
            <textarea class="form-control" id="address" rows="4" name="address" placeholder="Enter your message" ></textarea>
        </div>
        <div class="text-center"> <!-- Center the button -->
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function(){
        $('#myForm').submit(function(event){
            event.preventDefault();
            var formData = new FormData($('#myForm')[0]);
            //   var formData = $('#yourForm').serialize();
        $.ajax({
            type:"POST",
            data:formData,
            contentType: false,
            processData: false,
            url: "{{route('student.store')}}",
             success: function (data) {
                    console.log('Submission was successful.');
                    console.log(data); // You can handle the response here
                },
                error: function (data) {
                    console.log('An error occurred.');
                    console.log(data); // You can handle the error response here
                }
        });
      
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
