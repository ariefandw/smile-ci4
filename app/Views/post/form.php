<?= $this->extend('layout/app'); ?>

<?= $this->section('content'); ?>
<div class="card">
    <div class="card-body">

        <form action="<?= $action; ?>" method="post">
            <div class="mb-3">
                <label class="form-label">Category</label>
                <select name="category_id" class="form-control">
                    <?php foreach ($categories as $category): ?>
                        <option value="<?= $category->id; ?>" <?= $category->id == $row->category_id ? 'selected' : ''; ?>>
                            <?= $category->category_name; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" name="title" value="<?= $row->title; ?>" class="form-control">
            </div>
            <div class="mb-3">
                <label for="floatingTextarea">Description</label>
                <textarea name="description" class="form-control"><?= $row->description; ?></textarea>
            </div>
            <div id="tgl" class="mt-4"></div>
            <button type="button" id="btn-tambah" class="btn btn-primary btn-sm">tambah</button><br />
            <button type="submit" class="btn btn-primary mt-3">Simpan</button>
        </form>

    </div>
</div>
<?= $this->endSection(); ?>


<?= $this->section('js'); ?>
<script>
    $(document).ready(function () {
        $('#btn-tambah').click(function () {
            $('#tgl').append(`
            <div class="row">
                <div class="col">
                    <input type="date" name="tanggal[]" class="form-control" />
                </div>
                <div class="col">
                    <button class="btn btn-sm btn-danger tgl-hapus">hapus</button>
                </div>
            </div>
            `)
            $('.tgl-hapus').click(function () {
                this.closest(".row").remove();
            })
        })

    }); 
</script>
<?= $this->endSection(); ?>