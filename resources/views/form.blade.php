<!DOCTYPE html>
<html lang="en">
<head>
    <title>Form Input Mahasiswa</title>
</head>
<body>
    <h2>Form Input Mahasiswa</h2>
    <form action="/simpan" method="post">
        @csrf
        <label for="nama">Nama:</label>
        <input type="text" name="nama"><br><br>

        <label for="email">Email:</label>
        <input type="text" name="email"><br><br>

        <label for="jurusan">Jurusan:</label>
        <input type="text" name="jurusan"><br><br>

        <label for="umur">Umur:</label>
        <input type="text" name="umur"><br><br>

        <button type="submit">Simpan</button>
    </form>
</body>
</html>