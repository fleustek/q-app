<!DOCTYPE html>
<html>
    <body>
        <header class="row">@include('includes.navbar')</header>
        <h2>AUTHORS</h2>
        @isset($authors)
        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Fname</th>
                    <th>Lname</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($authors as $author)
                <tr>
                    <td>{{ $author["id"] }}</td>
                    <td>{{ $author["first_name"] }}</td>
                    <td>{{ $author["last_name"] }}</td>
                    <td>
                        <form
                            action="/api/authors/{{ $author['id'] }}"
                            method="get"
                        >
                            <button type="submit">View</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endisset
    </body>
</html>
