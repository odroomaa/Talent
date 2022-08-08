<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Talent-hub</title>
</head>
<body>
@include('includes.auth')
@include('includes.messages')
    <nav>
        
        <a href="/upload">upload</a>
        <a href="/relog">enter</a>
            
        
    </nav>
    @yield('content')
</body>
</html>