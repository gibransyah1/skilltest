<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<h1>Form Tambah Data</h1>
<ul>
    <li>Nama: <?= $data['name']; ?></li>
    <li>Birth Date: <?= $data['birth_date']; ?></li>
    <li>Birth Place: <?= $data['birth_place']; ?></li>
    <li>gender: <?= $data['gender']; ?></li>
    <li>
        <a href="/">Kembali</a>
    </li>
</ul>
<?= $this->endSection(); ?>