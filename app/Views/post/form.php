<?= $this->extend('layout/app'); ?>

<?= $this->section('content'); ?>
<div class="card">
    <div class="card-body">
        <form action="<?= $action; ?>" method="post">
            <div class="mb-3">
                <label class="form-label">Category</label>
                <input required type="number" name="category" value="<?= $row->category; ?>" class="form-control">
            </div>
            <div class="mb-3">
                <label required class="form-label">Title</label>
                <input type="text" name="title" value="<?= $row->title; ?>" class="form-control">
            </div>
            <div class="mb-3">
                <label for="floatingTextarea">Description</label>
                <textarea name="description" class="form-control"><?= $row->description; ?></textarea>
            </div>
            <div id="tgl" class="mt-4"></div>
            <button type="button" id="btn-tambah" class="btn btn-primary btn-sm">tambah</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>

    </div>
</div>
<?= $this->endSection(); ?>


<?= $this->section('js'); ?>
<script>
    $(document).ready(function () {
        $('#btn-tambah').click(function () {
            $('#tgl').append('<input type="date" name="tanggal[]" class="form-control" />')
        })

    }); 
</script>
<?= $this->endSection(); ?>