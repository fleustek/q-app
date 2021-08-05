<!DOCTYPE html>
<html>
    <body>
        <header class="row">@include('includes.navbar')</header>
        <h2>BOOKS</h2>
        @isset($books)
        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Title</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $book)
                <tr>
                    <td>{{ $book["id"] }}</td>
                    <td>{{ $book["title"] }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endisset @isset($authors)
        <div>&nbsp;</div>
        <div>
            <h3>Add a new book</h3>
            <div>&nbsp;</div>
            <form action="/api/books/" method="post">
                <label for="author_id">Author:</label>
                <select
                    aria-hidden="true"
                    name="author_id"
                    id="author_id"
                    required
                >
                    @foreach ($authors as $author)
                    <option value="{{ $author['id'] }}">
                        {{ $author["first_name"] }} {{ $author["last_name"] }}
                    </option>
                    @endforeach
                </select>
                <label for="title">Title:</label>
                <input type="text" name="title" />
                <button type="submit">Add</button>
            </form>
        </div>
        @endisset
    </body>
</html>
