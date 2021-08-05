<!DOCTYPE html>
<html>
    <body>
        <header class="row">@include('includes.navbar')</header>
        <h2>AUTHOR DETAILS</h2>
        <div>&nbsp;</div>
        @isset($author)
        <div>{{ $author["first_name"] }} {{ $author["last_name"] }}</div>
        <div>&nbsp;</div>
        <form action="/api/authors/{{ $author['id'] }}" method="post">
            {{ method_field("delete") }}
            <button type="submit">Delete Author</button>
        </form>
        <div>&nbsp;</div>
        <div>BOOKS:</div>
        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Title</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($author['books'] as $book)
                <tr>
                    <td>{{ $book["id"] }}</td>
                    <td>{{ $book["title"] }}</td>
                    <td>
                        <form
                            action="/api/books/{{ $book['id'] }}"
                            method="post"
                        >
                            {{ method_field("delete") }}
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endisset
    </body>
</html>
