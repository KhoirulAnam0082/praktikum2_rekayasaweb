<?php
function curl($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($ch);
    curl_close($ch);
    return $output;
}

// Alamat localhost untuk file getwisata.php, ambil hasil export JSON
$send = curl("http://localhost/rekayasaweb/pertemuan2/getwisata.php");

// Mengubah JSON menjadi ARRAY
$data = json_decode($send, TRUE);

// Membuat tabel untuk menampilkan data
echo "<table border='1' cellpadding='5' cellspacing='0'>";
echo "<tr>
        <th>ID Wisata</th>
        <th>Kota</th>
        <th>Landmark</th>
        <th>Tarif</th>
      </tr>";

foreach ($data as $row) {
    echo "<tr>";
    echo "<td>" . $row["id_wisata"] . "</td>";
    echo "<td>" . $row["kota"] . "</td>";
    echo "<td>" . $row["landmark"] . "</td>";
    echo "<td>" . $row["tarif"] . "</td>";
    echo "</tr>";
}

echo "</table>";
?>
