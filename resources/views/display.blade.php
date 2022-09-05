<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Display</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" 
    crossorigin="anonymous">

</head>

<body>
    
    @if(session()->has('message'))
        <div class="alert text-center alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
        
    <div class="text-center">
        
        <h1>Add Data</h1>
        <form class="form-group" action="/store" method="POST">  

            @csrf
            
            <label for="title">Title</label>  <br>
            <input type="text" name="title">  <br>
            <span class="text-danger">
                @error('title')
                    {{$message}}
                    <br>
                @enderror
            </span>     
            
            <label for="email">Email</label>  <br>
            <input type="text" name="email">  <br>
            <span class="text-danger">
                @error('email')
                    {{$message}}
                    <br>
                @enderror
            </span>

            <label for="author">Author</label>  <br>
            <input type="text" name="author">  <br>
            <span class="text-danger">
                @error('author')
                    {{$message}}
                    <br>
                @enderror
            </span>

            <label for="password">Password</label>  <br>
            <input type="password" name="password"> <br>
            <span class="text-danger">
                @error('password')
                    {{$message}}
                    <br>
                @enderror
            </span>

            <label for="password_confirmation">Confirm Password</label>  <br>
            <input type="password" name="password_confirmation"> <br>
            <span class="text-danger">
                @error('password_confirmation')
                    {{$message}}
                    <br>
                @enderror
            </span>
        
            <br>
            <input type="submit" name="insert" value="Insert" class="btn btn-success">

        </form>
    </div>


    <div id="add-div-btn" class="text-center">
        <button type="button" onclick="appear()" class="btn btn-dark">View Data</button>
    </div>

    <div id='add-div' style="display:none">

        <div id="add-div-btn" class="text-center">
            <button type="button" onclick="disappear()" class="btn btn-danger">Close</button>
        </div>

        <table class="table table-striped">
            <tr>
                <th>Title</th>
                <th>Email</th>
                <th>Author</th>
                <th>Password</th>
                <th>Functions</th>
            </tr>
            @foreach ($datas as $data)
                
            
            <tr>
                <td>
                    {{$data->title}}
                </td>
                <td>
                    {{$data->email}}
                </td>
                <td>
                    {{$data->author}}
                </td>
                <td>
                    {{$data->password}}
                </td>
                <td>
                    <a href="/delete/{{$data->id}}" class="btn btn-danger" role="button">Delete</a>
                    <a href="/edit/{{$data->id}}" class="btn btn-primary" role="button">Edit</a>
                </td>
            </tr>
    
        @endforeach
        
        </table>
    </div>

    
    <script>
        function appear(){
            document.getElementById("add-div").style.display='block';
            document.getElementById("add-div-btn").style.display='none';
        }
        function disappear(){
            document.getElementById("add-div").style.display='none';
            document.getElementById("add-div-btn").style.display='block';
        }

    </script>
</body>
</html>