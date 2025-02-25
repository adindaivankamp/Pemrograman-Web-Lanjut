<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Item List</title>
</head>
<body>
    <h1>Items</h1>

    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif {{-- direktif Blade yang memeriksa apakah ada pesan sukses dalam session. Jika ada, pesan tersebut akan ditampilkan dalam tag <p>. --}}

    <a href="{{ route('items.create') }}">Add Item</a> {{-- link yang mengarah ke route items.create --}}

    <ul>
        @foreach ($items as $item) {{--direktif Blade yang melakukan looping (pengulangan) untuk setiap "item" dalam variabel $items.--}}
            <li>
                {{ $item->name }} - {{--menampilkan nama "item"--}}
                <a href="{{ route('items.edit', $item) }}">Edit</a> {{--link yang mengarah ke route items.edit untuk mengedit "item" tertentu--}}
                <form action="{{ route('items.destroy', $item) }}" method="POST" style="display: inline;"> {{--form yang digunakan untuk menghapus "item" tertentu--}}
                    @csrf {{--direktif Blade yang menambahkan token CSRF untuk melindungi form dari serangan CSRF--}}
                    @method('DELETE') {{--direktif Blade yang mengubah method form menjadi DELETE--}}
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
</body>
</html>