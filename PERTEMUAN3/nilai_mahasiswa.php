<?php
// Data mahasiswa menggunakan array asosiatif
$mahasiswa = [
    [
        "nama" => "Anita Nurazizah",
        "nim" => "2311102017",
        "tugas" => 85,
        "uts" => 77,
        "uas" => 90
    ],
    [
        "nama" => "Agussalim",
        "nim" => "2311102018",
        "tugas" => 60,
        "uts" => 65,
        "uas" => 75
    ],
    [
        "nama" => "Azizah Nur",
        "nim" => "2311102019",
        "tugas" => 95,
        "uts" => 88,
        "uas" => 92
    ]
];

// Function menghitung nilai akhir
function hitungNilaiAkhir($tugas, $uts, $uas) {
    return ($tugas * 0.30) + ($uts * 0.30) + ($uas * 0.40);
}

// Function menentukan grade
function tentukanGrade($nilaiAkhir) {
    if ($nilaiAkhir >= 85) {
        return "A";
    } elseif ($nilaiAkhir >= 75) {
        return "B";
    } elseif ($nilaiAkhir >= 65) {
        return "C";
    } elseif ($nilaiAkhir >= 50) {
        return "D";
    } else {
        return "E";
    }
}

// Function menentukan status kelulusan
function tentukanStatus($nilaiAkhir) {
    return ($nilaiAkhir >= 70) ? "Lulus" : "Tidak Lulus";
}

$totalNilai = 0;
$nilaiTertinggi = 0;
$namaTertinggi = "";

// Proses data mahasiswa
foreach ($mahasiswa as $index => $mhs) {
    $nilaiAkhir = hitungNilaiAkhir($mhs["tugas"], $mhs["uts"], $mhs["uas"]);
    $grade = tentukanGrade($nilaiAkhir);
    $status = tentukanStatus($nilaiAkhir);

    $mahasiswa[$index]["nilai_akhir"] = $nilaiAkhir;
    $mahasiswa[$index]["grade"] = $grade;
    $mahasiswa[$index]["status"] = $status;

    $totalNilai += $nilaiAkhir;

    if ($nilaiAkhir > $nilaiTertinggi) {
        $nilaiTertinggi = $nilaiAkhir;
        $namaTertinggi = $mhs["nama"];
    }
}

$rataRataKelas = $totalNilai / count($mahasiswa);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Sistem Penilaian Mahasiswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
        }
        table {
            border-collapse: collapse;
            width: 80%;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #333;
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        h2, p {
            margin: 10px 0;
        }
    </style>
</head>
<body>

    <h2>Sistem Penilaian Mahasiswa</h2>

    <table>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>NIM</th>
            <th>Nilai Tugas</th>
            <th>Nilai UTS</th>
            <th>Nilai UAS</th>
            <th>Nilai Akhir</th>
            <th>Grade</th>
            <th>Status</th>
        </tr>

        <?php foreach ($mahasiswa as $i => $mhs): ?>
        <tr>
            <td><?= $i + 1; ?></td>
            <td><?= $mhs["nama"]; ?></td>
            <td><?= $mhs["nim"]; ?></td>
            <td><?= $mhs["tugas"]; ?></td>
            <td><?= $mhs["uts"]; ?></td>
            <td><?= $mhs["uas"]; ?></td>
            <td><?= number_format($mhs["nilai_akhir"], 2); ?></td>
            <td><?= $mhs["grade"]; ?></td>
            <td><?= $mhs["status"]; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>

    <p><strong>Rata-rata kelas:</strong> <?= number_format($rataRataKelas, 2); ?></p>
    <p><strong>Nilai tertinggi:</strong> <?= number_format($nilaiTertinggi, 2); ?> (<?= $namaTertinggi; ?>)</p>

</body>
</html>