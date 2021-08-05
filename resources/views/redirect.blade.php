<!DOCTYPE html>
<html>
    <body>
        <header class="row">@include('includes.navbar')</header>
        @isset($message)
        <div>{{ $message }}</div>
        @endisset
    </body>
</html>
