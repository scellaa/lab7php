<?php
// Eksperimen 3: function untuk mengubah format harga menjadi Rupiah
function formatRupiah($angka)
{
    if (!is_numeric($angka)) {
        return "Rp0";
    }
    $angka = (float)$angka;
    $tanda = ($angka < 0) ? "-" : "";
    return $tanda . "Rp" . number_format(abs($angka), 0, ",", ".");
}

$daftarHarga = [
    "Buku Tulis" => 7500,
    "Pulpen"     => 3500,
    "Laptop"     => 8750000,
    "Diskon"     => -150000,
];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Eksperimen 3 - Format Rupiah</title>
</head>
<body>
    <h1>Format Harga ke Rupiah</h1>
    <table border="1" cellpadding="6" cellspacing="0">
        <tr><th>Barang</th><th>Angka Asli</th><th>Format Rupiah</th></tr>
        <?php foreach ($daftarHarga as $barang => $harga) { ?>
        <tr>
            <td><?php echo htmlspecialchars($barang); ?></td>
            <td><?php echo $harga; ?></td>
            <td><?php echo formatRupiah($harga); ?></td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
