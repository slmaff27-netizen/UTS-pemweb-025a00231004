<?php
declare(strict_types=1);

require_once __DIR__ . '/data.php';
require_once __DIR__ . '/functions.php';

$totalMataKuliah = count($mataKuliah);
$totalSks = hitungTotalSks($mataKuliah);

$daftarSemester = array_unique(
    array_column($mataKuliah, 'semester')
);

sort($daftarSemester);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyAcademic - Profil Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>MyAcademic</h1>
        <p>Rekap Nilai dan Kartu Rencana Studi Pribadi</p>
    </header>

    <nav>
        <a href="index.php">Profil Mahasiswa</a>
        <a href="katalog.php">Rekap Nilai dan KRS</a>
    </nav>

    <main>
        <section>
            <h2>Profil Mahasiswa</h2>

            <article>
                <h3>Identitas Mahasiswa</h3>
                <p>Nama: Isi nama mahasiswa</p>
                <p>NIM: Isi NIM mahasiswa</p>
                <p>Program Studi: Informatika</p>
                <p>Universitas: Tiga Serangkai University</p>
            </article>


<article>
    <h3>Ringkasan Akademik</h3>

    <p>Cakupan Data: Semua Semester</p>

    <p>
        Total Mata Kuliah:
        <?= e($totalMataKuliah) ?>
    </p>

    <p>
        Total SKS:
        <?= e($totalSks) ?>
    </p>

    <h3>IPS per Semester</h3>

    <?php foreach ($daftarSemester as $semester): ?>
        <p>
            Semester <?= e($semester) ?>:
            <?= e(number_format(
                hitungIPS($mataKuliah, (int) $semester),
                2,
                ',',
                '.'
            )) ?>
        </p>
    <?php endforeach; ?>
</article>

        </section>
    </main>

    <footer>
        <p>&copy; 2026 MyAcademic - Rekap Nilai dan KRS Pribadi</p>
    </footer>
</body>
</html>
