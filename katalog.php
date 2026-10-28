<?php
declare(strict_types=1);
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
                        <tr>
                            <td colspan="6">
                                Data mata kuliah akan ditampilkan di sini.
                            </td>
                        </tr>
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
