<?= $this->extend('layout/app'); ?>

<?= $this->section('content'); ?>
<div class="card">
    <div class="card-body">
        <h3>Post</h3>
        <a href="<?= site_url('post/new'); ?>" class="btn btn-success">Tambah</a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Category</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($rows as $no => $row): ?>
                    <tr>
                        <td>
                            <?=++$no; ?>
                        </td>
                        <td>
                            <?= $row->category; ?>
                        </td>
                        <td>
                            <?= $row->title; ?>
                        </td>
                        <td>
                            <?= $row->description; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection(); ?>