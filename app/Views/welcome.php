<?= $this->extend('layout/app'); ?>

<?= $this->section('content'); ?>
<div class="card">
    <div class="card-body">
        <h1>
            Selamat Datang,
            <?= auth()->user()->username; ?>
        </h1>
    </div>
</div>
<?= $this->endSection(); ?>