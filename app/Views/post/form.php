<?= $this->extend('layout/app'); ?>

<?= $this->section('content'); ?>
<div class="card">
    <div class="card-body">
        <form action="<?= $action; ?>" method="post">
            <div class="mb-3">
                <label class="form-label">Category</label>
                <input type="number" name="category" value="<?= $row->category; ?>" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" name="title" value="<?= $row->title; ?>" class="form-control">
            </div>
            <div class="mb-3">
                <label for="floatingTextarea">Description</label>
                <textarea name="description" class="form-control"><?= $row->description; ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
<?= $this->endSection(); ?>