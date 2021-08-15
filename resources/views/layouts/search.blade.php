<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>

  <form action="{{ route('search') }}" method="GET">
    <input type="text" name="search" required/>
    <button type="submit">Search</button>
</form>
</body>
</html>