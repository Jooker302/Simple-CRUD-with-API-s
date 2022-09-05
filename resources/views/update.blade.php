<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Insert</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" 
rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" 
crossorigin="anonymous">
</head>
<body>

    <div class="text-center">

        <h1>Update Data</h1>
        <form class="form-group" action="/update/{{$datas->id}}" method="POST">  

            <label for="title">Title</label>  <br>
            <input type="text" name="title" value="{{$datas->title}}">  <br>
            @csrf
            <label for="des">Email</label>  <br>
            <input type="text" name="des" value="{{$datas->email}}">  <br>

            <label for="author">Author</label>  <br>
            <input type="text" name="author" value="{{$datas->author}}">  <br>

            <label for="author">Password</label>  <br>
            <input type="password" name="author" value="">  <br>

            <br>
            <input type="submit" name="update" value="Update" class="btn btn-warning">
            <a href="/display" class="btn btn-success" role="button">Back</a>
        </form>

    </div>

</body>
</html>