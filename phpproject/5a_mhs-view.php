<!DOCTYPE html>
<html>
    <head>
        <title>Form Input Nama</title>
    </head>
    <body>
        <h2>Masukkan Nama Anda</h2>
        <form method="post">
            <label>Nama:</label>
            <input type="text" name="nama" required>

            <button type="submit" formaction="display2.php" formmethod="post">Kirim (POST)</button>
            <button type="submit" formaction="display2.php" formmethod="get">Kirim (GET)</button>
        </form>
    </body>
</html>