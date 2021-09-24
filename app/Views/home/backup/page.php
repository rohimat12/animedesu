<?= $this->extend('tools/header/header') ?>
<?= $this->section('content'); ?>
<h1><?= $halaman['judul']; ?></h1>
<h5>Isi Halaman</h5>
<?= $halaman['post']; ?>
<?= $this->endSection('content'); ?>