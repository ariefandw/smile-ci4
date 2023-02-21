<?= $this->extend('layout/app'); ?>

<?= $this->section('content'); ?>
<div class="card">
    <div class="card-body">
        <form>
            <div class="mb-3">
                <label class="form-label">Bilangan 1</label>
                <input type="number" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Bilangan 2</label>
                <input type="number" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Hitung</button>
        </form>
    </div>
</div>
<?= $this->endSection(); ?>