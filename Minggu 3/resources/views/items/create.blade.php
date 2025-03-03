<!DOCTYPE html>
<html>
<head>
    <title>Add Item</title>
</head>
<body>
    <h1>Add Item</h1>
    <form action="{{ route('items.store') }}" method="POST">
        @csrf {{--untuk melindungi form dari serangan CSRF--}}
        <label for="name">Name:</label> {{--label untuk input nama.--}}
        <input type="text" name="name" required> {{--input teks untuk nama "item". Atribut required menandakan bahwa input ini wajib diisi--}}
        <br>
        <label for="description">Description:</label> {{--label untuk input deskripsi--}}
        <textarea name="description" required></textarea> {{-- input teks area untuk deskripsi "item" yang wajib diisi--}}
        <br>
        <button type="submit">Add Item</button>
    </form>
    <a href="{{ route('items.index') }}">Back to List</a> {{--link yang mengarah ke route items.index--}}
</body>
</html>