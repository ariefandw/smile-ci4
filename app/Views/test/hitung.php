<?= $this->extend('layout/app'); ?>

<?= $this->section('content'); ?>
<div class="card">
    <div class="card-body">
        <form action="<?= site_url('test/hitung'); ?>" method="get">
            <div class="mb-3">
                <label class="form-label">Bilangan 1</label>
                <input type="number" name="bil1" value="<?= $bil1; ?>" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Bilangan 2</label>
                <input type="number" name="bil2" value="<?= $bil2; ?>" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Hitung</button>
        </form>
        <h2>
            <?= $hasil; ?>
        </h2>
    </div>
</div>
<?= $this->endSection(); ?>