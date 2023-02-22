<?= $this->extend('layout/app'); ?>

<?= $this->section('content'); ?>
<div class="card">
    <div class="card-body">
        <h3>Post</h3>
        <a href="<?= site_url('post/new'); ?>" class="btn btn-success">Tambah</a>
        <form action="<?= site_url('post'); ?>" method="get">
            <div class="row mt-3">
                <div class="col">
                    <input type="text" name="q" value="<?= $q; ?>" class="form-control">
                </div>
                <div class="col">
                    <button type="submit" class="btn btn-success">Cari</button>
                </div>
            </div>
        </form>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Category</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($rows as $no => $row): ?>
                    <tr>
                        <td>
                            <?=($no + 1) + (($_GET['page'] - 1) * 5); ?>
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
                        <td>
                            <form action="<?= site_url('post/delete/' . $row->id); ?>" method="post"
                                onsubmit="return confirm('Apakah anda yakin?');">
                                <div class="btn-group btn-group-sm" role="group">
                                    <a href="<?= site_url('post/edit/' . $row->id); ?>" class="btn btn-warning">
                                        <span class="material-symbols-outlined">edit</span>
                                    </a>
                                    <button type="submit" class="btn btn-danger">
                                        <span class="material-symbols-outlined">delete</span>
                                    </button>
                                </div>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?= str_replace(
            '<a',
            '<a class="page-link"',
            str_replace('<li', '<li class="page-item"', $pager->links())
        ); ?>
    </div>
</div>
<?= $this->endSection(); ?>