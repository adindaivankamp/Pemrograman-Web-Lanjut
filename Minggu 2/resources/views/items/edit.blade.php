<!DOCTYPE html>
<html>
<head>
    <title>Edit Item</title>
</head>
<body>
    <h1>Edit Item</h1>
    <form action="{{ route('items.update', $item) }}" method="POST">
        @csrf
        @method('PUT') {{--direktif Blade yang mengubah method form menjadi PUT--}}
        <label for="name">Name:</label> {{--label untuk input nama--}}
        <input type="text" name="name" value="{{ $item->name }}" required> {{--input teks untuk nama "item"--}}
        <br>
        <label for="description">Description:</label> {{--label untuk input deskripsi--}}
        <textarea name="description" required>{{ $item->description }}</textarea> {{--input teks area untuk deskripsi "item"--}}
        <br>
        <button type="submit">Update Item</button>
    </form>
    <a href="{{ route('items.index') }}">Back to List</a> {{--link yang mengarah ke route items.index--}}
</body>
</html>