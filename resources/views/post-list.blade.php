<!DOCTYPE html>
<html lang="en">
<head>
   <title>Posts</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    
<div class="container">
    <h2>Bootstrap List Example</h2>

    <div class="container mt-4">
        <h1>Data Listing</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Actions</th>
                    @role('writer|admin')
                    <th><a href="#" class="btn btn-primary">Add</a></th>
                    @endrole
                </tr>
            </thead>
            <tbody>
                <!-- Loop through your data and generate table rows -->
                @foreach($posts as $key => $post)
               <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$post->name}}</td>
                    <td>{{$post->description}}</td>  

                    @can('edit post')  
                    <td>
                       <a href="#" class="btn btn-danger">Edit</a>
                    </td>
                    @endrole
                    <td><a href="#" class="btn btn-danger">Delete</a></td>
                </tr>
                @endforeach
                <!-- Add more rows as needed -->
            </tbody>
        </table>
    </div>
</div>
</body>
</html>