<?php
declare(strict_types=1);

require_once __DIR__ . '/data.php';
require_once __DIR__ . '/functions.php';

$daftarSemester = array_values(
    array_unique(array_column($mataKuliah, 'semester'))
);

sort($daftarSemester);

$semesterDipilih = filter_input(
    INPUT_GET,
    'semester',
    FILTER_VALIDATE_INT
);

if (
    $semesterDipilih === false ||
    (
        $semesterDipilih !== null &&
        !in_array($semesterDipilih, $daftarSemester, true)
    )
) {
    $semesterDipilih = null;
}

$mataKuliahTampil = $mataKuliah;

if ($semesterDipilih !== null) {
    $mataKuliahTampil = array_filter(
        $mataKuliah,
        static fn(array $mk): bool =>
            $mk['semester'] === $semesterDipilih
    );
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyAcademic - Rekap Nilai dan KRS</title>
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
            <h2>Rekap Nilai dan KRS</h2>
            <p>Daftar mata kuliah dan hasil akademik mahasiswa.</p>
            
<form method="get" action="katalog.php">
    <label for="semester">Pilih Semester:</label>

    <select name="semester" id="semester">
        <option value="">Semua Semester</option>

        <?php foreach ($daftarSemester as $semester): ?>
            <option
                value="<?= e($semester) ?>"
                <?= $semesterDipilih === $semester ? 'selected' : '' ?>
            >
                Semester <?= e($semester) ?>
            </option>
        <?php endforeach; ?>
    </select>

    <button type="submit">Tampilkan</button>
</form>


            <article>
                <h3>Daftar Mata Kuliah</h3>

                <table>
                    <thead>
                        <tr>
                            <th>Kode MK</th>
                            <th>Nama Mata Kuliah</th>
                            <th>SKS</th>
                            <th>Semester</th>
                            <th>Nilai</th>
                            <th>Status</th>
                        </tr>
                    </thead>

<tbody>
    <?php foreach ($mataKuliahTampil as $mk): ?>
        <?php
        $status = statusKelulusan(
            (float) $mk['nilai_angka']
        );
        ?>

        <tr>
            <td><?= e($mk['kode']) ?></td>
            <td><?= e($mk['nama']) ?></td>
            <td><?= e($mk['sks']) ?></td>
            <td><?= e($mk['semester']) ?></td>
            <td>
                <?= e($mk['nilai_angka']) ?>
                (<?= e(konversiNilai(
                    (float) $mk['nilai_angka']
                )) ?>)
            </td>
            <td>
                <span class="<?= $status === 'Lulus'
                    ? 'status-lulus'
                    : 'status-mengulang' ?>">
                    <?= e($status) ?>
                </span>
            </td>
        </tr>
    <?php endforeach; ?>
</tbody>
                </table>
            </article>
        </section>
    </main>

    <footer>
        <p>&copy; 2026 MyAcademic - Rekap Nilai dan KRS Pribadi</p>
    </footer>
</body>
</html>
