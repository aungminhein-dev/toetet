<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Hello</h1>
    <h2>{{Auth::user()->nrc}}</h2>
    <h2>{{Auth::user()->parent_code}}</h2>

    <form action="{{route('logout')}}" method="post">
        @csrf
        <button type="submit">Log out</button>
    </form>
</body>
</html>
