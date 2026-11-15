<?php
// Eksperimen 2: pencarian nama dari array dengan metode GET
$daftarNama = ["Mayscela Herliyawati", "Kian Galilei", "Nabila Najwa Syakira", "Nadeem Naufal", "Syahril Hildano", "Yusran Tabrani"];

$kata = null;
$hasil = [];

if (isset($_GET["kata"])) {
    $kata = trim($_GET["kata"]);
    if ($kata !== "") {
        foreach ($daftarNama as $nama) {
            if (stripos($nama, $kata) !== false) { // pencarian tidak peka huruf besar/kecil
                $hasil[] = $nama;
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head><meta charset="UTF-8"><title>Eksperimen 2 - Cari Nama</title></head>
<body>
<h1>Cari Nama Mahasiswa</h1>
<form method="GET" action="">
    <label for="kata">Kata kunci:</label>
    <input id="kata" name="kata" type="text" value="<?= htmlspecialchars($kata ?? "", ENT_QUOTES, "UTF-8") ?>">
    <button type="submit">Cari</button>
</form>

<?php if ($kata !== null): ?>
    <?php if ($kata === ""): ?>
        <p>Kata kunci tidak boleh kosong.</p>
    <?php elseif ($hasil): ?>
        <p>Ditemukan <?= count($hasil) ?> hasil untuk "<?= htmlspecialchars($kata, ENT_QUOTES, "UTF-8") ?>":</p>
        <ol><?php foreach ($hasil as $h): ?><li><?= htmlspecialchars($h) ?></li><?php endforeach; ?></ol>
    <?php else: ?>
        <p>Tidak ada nama yang cocok dengan "<?= htmlspecialchars($kata, ENT_QUOTES, "UTF-8") ?>".</p>
    <?php endif; ?>
<?php endif; ?>
</body>
</html>
