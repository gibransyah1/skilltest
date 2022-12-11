<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<h1>List Users</h1>
<a href="/create">Tambah Data</a>
<br><br>
<table border="1" cellpadding="5" cellspacing="0">
    <tr>
        <td>No</td>
        <td>Name</td>
        <td>Birth Date</td>
        <td>Birth Place</td>
        <td>Gender</td>
        <td>Aksi</td>
    </tr>
    <?php $no = 1; ?>
    <?php foreach ($data as $d) : ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $d['name']; ?></td>
            <td><?= $d['birth_date']; ?></td>
            <td><?= $d['birth_place']; ?></td>
            <td><?= $d['gender']; ?></td>
            <td>
                <a href="/detail/<?= $d['id']; ?>">detail</a> | <a href="/edit/<?= $d['id']; ?>">edit</a> | <a href="/hapus/<?= $d['id']; ?>" onclick="return confirm('Yakin?');">hapus</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
<?= $this->endSection(); ?>