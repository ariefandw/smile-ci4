<div class="card">
    <div class="card-body">
        <h1>
            Selamat Datang
            <?= $nama; ?>
            <?= $alamat ?? 'Jogja'; ?>
        </h1>
        <b>Sistem Operasi:</b>
        <ul>
            <?php foreach ($os as $r): ?>
                <li>
                    <?= $r; ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>