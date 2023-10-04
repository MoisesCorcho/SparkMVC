<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Hi! I'm blade template and im working well. To prove that, just look, I'm gonna output a variable with my syntax</h1>
    <h2>{{$test}}</h2>
    <ul>
        @foreach($colours as $color)
            <li>{{$color}}</li>
        @endforeach
    </ul>
</body>
</html>