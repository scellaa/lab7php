Nama: Mayscela Herliyawati
NIM: 312510371

### Penjelasan project

<img width="529" height="275" alt="image" src="https://github.com/user-attachments/assets/8efa0afc-9d57-436d-b6e1-6e4e9bdd6ae8" /><br>
Pada eksperimen ini dibuat form untuk memasukkan nama dan tiga komponen nilai, yaitu tugas, UTS, dan UAS, yang dikirim dengan metode POST. Di sisi server, setiap nilai divalidasi agar berupa angka dalam rentang 0 sampai 100, kemudian rata-ratanya dihitung menggunakan function hitungRataRata(). Pada pengujian dengan nilai tugas 70, UTS 80, dan UAS 90, program menampilkan rata-rata 80.00 sesuai perhitungan manual, yaitu (70 + 80 + 90) dibagi 3.


<img width="515" height="218" alt="image" src="https://github.com/user-attachments/assets/3309764c-ac4a-49f8-82c8-a698bd17646a" /><br>
Eksperimen ini mengembangkan contoh GET pada Latihan 5 agar dapat mencari nama dari sebuah array. Kata kunci yang diketik pengguna dikirim melalui URL, lalu program memeriksa setiap nama dalam array menggunakan fungsi stripos() sehingga pencarian tidak membedakan huruf besar dan kecil. Pada pengujian dengan kata kunci “m”, program menemukan dua hasil, yaitu Mayscela Herliyawati dan Nadeem Naufal. Kata kunci dan hasil pencarian ditampilkan dengan htmlspecialchars() agar aman dari injeksi HTML atau script.


<img width="529" height="329" alt="image" src="https://github.com/user-attachments/assets/609dc220-e996-463f-a221-30c55bd68d99" /><br>
Pada eksperimen ini dibuat function formatRupiah() untuk mengubah angka menjadi format mata uang Rupiah dengan titik sebagai pemisah ribuan. Function tersebut memanfaatkan number_format() dan juga menangani angka negatif dengan menambahkan tanda minus di depan “Rp”. Hasilnya, angka 7500 tampil sebagai Rp7.500, angka 8750000 sebagai Rp8.750.000, dan angka -150000 sebagai -Rp150.000. Penggunaan function membuat logika pemformatan cukup ditulis satu kali dan dapat dipanggil berulang untuk setiap harga.


<img width="529" height="316" alt="image" src="https://github.com/user-attachments/assets/7c1ff259-964e-458e-8018-c65c2f38c9b7" /><br>
Pada mini project formulir mahasiswa ditambahkan validasi NIM dengan dua ketentuan, yaitu hanya boleh berisi angka dan panjangnya harus tepat 10 digit. Pemeriksaan angka dilakukan dengan ctype_digit() dan pemeriksaan panjang dengan strlen(), sedangkan jumlah digit disimpan dalam konstanta agar mudah diubah. Pada pengujian, data dengan NIM 3125103711, program studi Teknik Informatika, semester 3, dan email yang valid berhasil lolos validasi sehingga ringkasan data mahasiswa ditampilkan dalam bentuk tabel. Jika NIM mengandung huruf atau panjangnya tidak sesuai, program menampilkan pesan kesalahan dan data tidak diproses. <br>
Tombol reset ditambahkan pada form menggunakan elemen <button type="reset">. Tombol ini bekerja di sisi client, yaitu hanya mengembalikan isian form ke nilai awal pada HTML tanpa mengirim permintaan ke server dan tanpa menjalankan kode PHP. Berbeda dengan itu, pemrosesan ulang di server terjadi ketika form dikirim kembali atau halaman dimuat ulang, sehingga PHP dijalankan lagi, validasi diperiksa ulang, dan halaman HTML baru dibuat. Karena form ini mengisi ulang kolom dengan data yang sudah dikirim, tombol reset akan mengembalikan isian ke data tersebut dan tidak mengosongkan seluruh kolom. Untuk benar-benar mengosongkan form, halaman perlu diakses ulang tanpa data POST.
