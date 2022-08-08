<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relog</title>
</head>
<body>
    <div class="border-dark-500">
        <h3>Register</h3>
        <form action="/register" method="POST">
            @csrf
            {{$errors}}
            <input type="text" name="name" placeholder="Example: Jesus"><br><br>
            <input type="email" name="email" placeholder="me@example.com"><br><br>
            <input type="password" name="password" placeholder="password"><br><br>
            <input type="password" name="password_confirmation" placeholder="confirm password"><br><br>
            <button type="submit">Register</button><br><br>

        </form>
    </div>

    <div class="border-dark-500">
        <h3>Login</h3>
        <form action="/login" method="POST">
            @csrf
            
            <input type="email" name="email" placeholder="me@example.com"><br><br>
            <input type="password" name="password" placeholder="password"><br><br>
            <button type="submit">Login</button><br><br>

        </form>
    </div>

</body>
</html>