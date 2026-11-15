<?php
// Eksperimen 1: rata-rata dari tiga komponen nilai
function hitungRataRata(float $a, float $b, float $c): float
{
    return ($a + $b + $c) / 3;
}

$error = [];
$hasil = null;
$tugas = $uts = $uas = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nama  = trim($_POST["nama"] ?? "");
    $tugas = $_POST["tugas"] ?? "";
    $uts   = $_POST["uts"] ?? "";
    $uas   = $_POST["uas"] ?? "";

    if ($nama === "") $error[] = "Nama wajib diisi.";
    foreach (["Tugas" => $tugas, "UTS" => $uts, "UAS" => $uas] as $label => $v) {
        if (!is_numeric($v) || $v < 0 || $v > 100) {
            $error[] = "Nilai $label harus berupa angka 0–100.";
        }
    }
    if (!$error) {
        $rata = hitungRataRata((float)$tugas, (float)$uts, (float)$uas);
        $hasil = ["nama" => $nama, "rata" => $rata];
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head><meta charset="UTF-8"><title>Eksperimen 1 - Rata-rata Nilai</title></head>
<body>
<h1>Rata-rata Tiga Komponen Nilai</h1>
<form method="POST">
    <p><label>Nama <input name="nama" value="<?= htmlspecialchars($_POST["nama"] ?? "", ENT_QUOTES, "UTF-8") ?>" required></label></p>
    <p><label>Tugas <input name="tugas" type="number" min="0" max="100" step="0.01" value="<?= htmlspecialchars((string)$tugas, ENT_QUOTES, "UTF-8") ?>" required></label></p>
    <p><label>UTS <input name="uts" type="number" min="0" max="100" step="0.01" value="<?= htmlspecialchars((string)$uts, ENT_QUOTES, "UTF-8") ?>" required></label></p>
    <p><label>UAS <input name="uas" type="number" min="0" max="100" step="0.01" value="<?= htmlspecialchars((string)$uas, ENT_QUOTES, "UTF-8") ?>" required></label></p>
    <button type="submit">Hitung</button>
</form>

<?php if ($error): ?>
    <ul style="color:red"><?php foreach ($error as $e): ?><li><?= htmlspecialchars($e) ?></li><?php endforeach; ?></ul>
<?php elseif ($hasil): ?>
    <h3>Hasil</h3>
    <p>Nama: <?= htmlspecialchars($hasil["nama"], ENT_QUOTES, "UTF-8") ?></p>
    <p>Rata-rata: <?= number_format($hasil["rata"], 2) ?></p>
<?php endif; ?>
</body>
</html>
