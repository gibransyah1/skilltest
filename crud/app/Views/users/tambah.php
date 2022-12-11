<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<h1>Form Tambah Data</h1>
<form action="/store" method="post">
    <ul>
        <li>
            <label for="name">Name: </label>
            <input type="text" name="name" id="name" required>
        </li>
        <li>
            <label for="date">Birth Date: </label>
            <input type="date" name="date" id="date" required>
        </li>
        <li>
            <label for="place">Birth Place: </label>
            <input type="text" name="place" id="place" required>
        </li>
        <li>
            <label for="gender">Gender: </label>
            <input type="text" name="gender" id="gender" required>
        </li>
        <li>
            <button type="submit">Simpan</button>
        </li>
    </ul>
</form>
<?= $this->endSection(); ?>