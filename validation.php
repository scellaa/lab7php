<?php

const NIM_PANJANG = 10;

$data  = null;
$error = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nama          = trim($_POST["nama"] ?? "");
    $nim           = trim($_POST["nim"] ?? "");
    $prodi         = trim($_POST["prodi"] ?? "");
    $semesterInput = $_POST["semester"] ?? "";
    $email         = trim($_POST["email"] ?? "");

    if ($nama === "")  $error[] = "Nama wajib diisi.";
    if ($prodi === "") $error[] = "Program studi wajib diisi.";

    if ($nim === "") {
        $error[] = "NIM wajib diisi.";
    } elseif (!ctype_digit($nim)) {
        $error[] = "NIM hanya boleh berisi angka.";
    } elseif (strlen($nim) !== NIM_PANJANG) {
        $error[] = "NIM harus tepat " . NIM_PANJANG . " digit.";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error[] = "Format email tidak valid.";
    }
    if (!ctype_digit((string)$semesterInput) || (int)$semesterInput < 1 || (int)$semesterInput > 14) {
        $error[] = "Semester harus berupa angka 1–14.";
    }

    if (!$error) {
        $data = compact("nama", "nim", "prodi", "email");
        $data["semester"] = (int)$semesterInput;
    }
}

// Fungsi bantu agar form mengisi ulang nilai yang sudah dikirim
function old(string $key): string
{
    return htmlspecialchars($_POST[$key] ?? "", ENT_QUOTES, "UTF-8");
}
?>
<!DOCTYPE html>
<html lang="id">
<head><meta charset="UTF-8"><title>Eksperimen 4 &amp; 5 - Form Mahasiswa</title></head>
<body>
<h1>Formulir Data Mahasiswa</h1>

<?php if ($error): ?>
    <div style="color:red">
        <p>Terdapat kesalahan:</p>
        <ul><?php foreach ($error as $e): ?><li><?= htmlspecialchars($e, ENT_QUOTES, "UTF-8") ?></li><?php endforeach; ?></ul>
    </div>
<?php endif; ?>

<form method="POST" action="">
    <p><label>Nama <input name="nama" value="<?= old("nama") ?>" required></label></p>
    <p><label>NIM (<?= NIM_PANJANG ?> digit angka) <input name="nim" value="<?= old("nim") ?>" required></label></p>
    <p><label>Program Studi <input name="prodi" value="<?= old("prodi") ?>" required></label></p>
    <p><label>Semester <input name="semester" type="number" min="1" max="14" value="<?= old("semester") ?>" required></label></p>
    <p><label>Email <input name="email" type="email" value="<?= old("email") ?>" required></label></p>
    <button type="submit">Kirim Data</button>
    <button type="reset">Reset</button>
</form>

<?php if ($data): ?>
    <h3>Data diterima</h3>
    <table border="1" cellpadding="6" cellspacing="0">
        <?php foreach ($data as $k => $v): ?>
        <tr><th><?= ucfirst($k) ?></th><td><?= htmlspecialchars((string)$v, ENT_QUOTES, "UTF-8") ?></td></tr>
        <?php endforeach; ?>
    </table>
<?php endif; ?>
</body>
</html>
