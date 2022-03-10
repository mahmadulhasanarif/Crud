<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
     integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Crud App</title>
    <style>
        .container{
            border: 2px solid aqua;
            color: rgb(0, 255, 21);
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="row clearfix">
            <div class="col-md-3">
                <h3>Students Crud System</h3><br/>
                @yield('sidebar')
            </div>
            <div class="col-md-6">
                @yield('content')
            </div>
        </div>
    </div>
</body>
</html>
