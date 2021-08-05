<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <title>Q</title>

        <style>
            div,
            input {
                margin-top: 10px;
            }
        </style>
    </head>
    <body>
        <header class="row">@include('includes.navbar')</header>

        <h2>LOGIN</h2>
        <form action="/api/auth/login" method="post">
            <div>
                <div><label for="">Email:</label></div>
                <input type="email" name="email" />
            </div>
            <div>
                <div><label for="">Pass:</label></div>
                <input type="password" name="password" />
            </div>
            <div>&nbsp;</div>
            <button type="submit">Login</button>
        </form>

        @isset($id)
        <div>ID: {{ $id }}</div>
        <div>Email: {{ $email }}</div>
        <div>First name: {{ $first_name }}</div>
        <div>Last name: {{ $last_name }}</div>
        @endisset
        <div>&nbsp;</div>
        <form action="/api/auth/logout" method="post">
            <button type="submit">Log out</button>
        </form>
    </body>
</html>
