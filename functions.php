<?php
declare(strict_types=1);

function e(string|int|float $value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}

function konversiNilai(float $nilai): string
{
    if ($nilai >= 85) {
        return 'A';
    } elseif ($nilai >= 75) {
        return 'B';
    } elseif ($nilai >= 60) {
        return 'C';
    } elseif ($nilai >= 45) {
        return 'D';
    }

    return 'E';
}

function statusKelulusan(float $nilai): string
{
    return $nilai >= 60 ? 'Lulus' : 'Mengulang';
}

function bobotNilai(float $nilai): float
{
    $huruf = konversiNilai($nilai);

    return match ($huruf) {
        'A' => 4.0,
        'B' => 3.0,
        'C' => 2.0,
        'D' => 1.0,
        default => 0.0,
    };
}

function hitungTotalSks(array $mataKuliah): int
{
    return (int) array_sum(array_column($mataKuliah, 'sks'));
}

function hitungIPS(array $mataKuliah, int $semester): float
{
    $totalMutu = 0.0;
    $totalSks = 0;

    foreach ($mataKuliah as $mk) {
        if ((int) $mk['semester'] === $semester) {
            $sks = (int) $mk['sks'];
            $nilai = (float) $mk['nilai_angka'];

            $totalMutu += bobotNilai($nilai) * $sks;
            $totalSks += $sks;
        }
    }

    if ($totalSks === 0) {
        return 0.0;
    }

    return $totalMutu / $totalSks;
}
