<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<h1>Form Tambah Data</h1>
<form action="/update" method="post">
    <input type="hidden" name="id" value="<?= $data['id']; ?>">
    <ul>
        <li>
            <label for="name">Name: </label>
            <input type="text" name="name" id="name" required value="<?= $data['name']; ?>">
        </li>
        <li>
            <label for="date">Birth Date: </label>
            <input type="date" name="date" id="date" required value="<?= $data['birth_date']; ?>">
        </li>
        <li>
            <label for="place">Birth Place: </label>
            <input type="text" name="place" id="place" required value="<?= $data['birth_place']; ?>">
        </li>
        <li>
            <label for="gender">Gender: </label>
            <input type="text" name="gender" id="gender" required value="<?= $data['gender']; ?>">
        </li>
        <li>
            <button type="submit">ubah</button>
        </li>
    </ul>
</form>
<?= $this->endSection(); ?>