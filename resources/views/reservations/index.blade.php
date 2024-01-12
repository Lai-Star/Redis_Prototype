<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reservation Updates</title>
</head>
<body>
    <h1>Reservation Updates</h1>
    <ul>
        @foreach ($apiUsers as $user)
            <li>{{ $user->name }} - {{ $user->email }}</li>
            <!-- Display other relevant information -->
        @endforeach
    </ul>

    {{ $apiUsers->links() }} <!-- Pagination links -->
</body>
</html>
