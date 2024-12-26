<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "uas basis data";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection Error: " . $conn->connect_error);
}

function calculateQuartile($conn, $quartile) {
    $sql = "SELECT ukt FROM data ORDER BY ukt";
    $result = $conn->query($sql);
    
    $values = array();
    while($row = $result->fetch_assoc()) {
        $values[] = $row['ukt'];
    }
    
    $count = count($values);
    if ($count == 0) return null;
    
    switch($quartile) {
        case 1:
            $position = ($count + 1) * 0.25;
            break;
        case 2:
            $position = ($count + 1) * 0.5;
            break;
        case 3:
            $position = ($count + 1) * 0.75;
            break;
        default:
            return null;
    }
    
    $base = floor($position) - 1;
    $rest = $position - floor($position);
    
    if ($base + 1 < $count) {
        return $values[$base] + $rest * ($values[$base + 1] - $values[$base]);
    }
    return $values[$base];
}

if (isset($_POST['Submit'])) {
    // Ambil data dari form
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $alamat = $_POST['alamat'];
    $programstudi = $_POST['programstudi'];
    $ukt = $_POST['ukt'];

    // Query untuk menyimpan data ke database
    $sql = "INSERT INTO data (nama, nim, alamat, programstudi, ukt) 
            VALUES ('$nama', '$nim', '$alamat', '$programstudi', '$ukt')";

    if ($conn->query($sql) === TRUE) {
        echo "Data berhasil disimpan";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

if (isset($_POST['Min'])) {
    // Query untuk mendapatkan nilai UKT terkecil
    $sql = "SELECT * FROM data ORDER BY ukt ASC LIMIT 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Ambil data terkecil
        $row = $result->fetch_assoc();
        echo "Data UKT terkecil:<br>";
        echo "Nama: " . $row['nama'] . "<br>";
        echo "NIM: " . $row['nim'] . "<br>";
        echo "Alamat: " . $row['alamat'] . "<br>";
        echo "Program Studi: " . $row['programstudi'] . "<br>";
        echo "UKT: Rp " . number_format($row['ukt'], 0, ',', '.') . "<br>";
    } else {
        echo "Tidak ada data.";
    }
}

if (isset($_POST['Maks'])) {
    // Query untuk mendapatkan nilai UKT terkecil
    $sql = "SELECT * FROM data ORDER BY ukt DESC LIMIT 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Ambil data terkecil
        $row = $result->fetch_assoc();
        echo "Data UKT terbesar:<br>";
        echo "Nama: " . $row['nama'] . "<br>";
        echo "NIM: " . $row['nim'] . "<br>";
        echo "Alamat: " . $row['alamat'] . "<br>";
        echo "Program Studi: " . $row['programstudi'] . "<br>";
        echo "UKT: Rp " . number_format($row['ukt'], 0, ',', '.') . "<br>";
    } else {
        echo "Tidak ada data.";
    }
}

if (isset($_POST['Q1'])) {
    $q1 = calculateQuartile($conn, 1);
    if ($q1 !== null) {
        // Get the closest student to Q1
        $sql = "SELECT * FROM data WHERE ukt >= $q1 ORDER BY ukt ASC LIMIT 1";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo "Data Quartil 1 (Q1):<br>";
            echo "Nama: " . $row['nama'] . "<br>";
            echo "NIM: " . $row['nim'] . "<br>";
            echo "Alamat: " . $row['alamat'] . "<br>";
            echo "Program Studi: " . $row['programstudi'] . "<br>";
            echo "UKT: Rp " . number_format($row['ukt'], 0, ',', '.') . "<br>";
        }
    } else {
        echo "Tidak dapat menghitung Q1 - Data tidak cukup";
    }
}

if (isset($_POST['Q2'])) {
    $q2 = calculateQuartile($conn, 2);
    if ($q2 !== null) {
        // Get the closest student to Q2
        $sql = "SELECT * FROM data WHERE ukt >= $q2 ORDER BY ukt ASC LIMIT 1";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo "Data Quartil 2 (Q2/Median):<br>";
            echo "Nama: " . $row['nama'] . "<br>";
            echo "NIM: " . $row['nim'] . "<br>";
            echo "Alamat: " . $row['alamat'] . "<br>";
            echo "Program Studi: " . $row['programstudi'] . "<br>";
            echo "UKT: Rp " . number_format($row['ukt'], 0, ',', '.') . "<br>";
        }
    } else {
        echo "Tidak dapat menghitung Q2 - Data tidak cukup";
    }
}

if (isset($_POST['Q3'])) {
    $q3 = calculateQuartile($conn, 3);
    if ($q3 !== null) {
        // Get the closest student to Q3
        $sql = "SELECT * FROM data WHERE ukt >= $q3 ORDER BY ukt ASC LIMIT 1";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo "Data Quartil 3 (Q3):<br>";
            echo "Nama: " . $row['nama'] . "<br>";
            echo "NIM: " . $row['nim'] . "<br>";
            echo "Alamat: " . $row['alamat'] . "<br>";
            echo "Program Studi: " . $row['programstudi'] . "<br>";
            echo "UKT: Rp " . number_format($row['ukt'], 0, ',', '.') . "<br>";
        }
    } else {
        echo "Tidak dapat menghitung Q3 - Data tidak cukup";
    }
}

if (isset($_POST['StandarDeviasi'])) {
    // Query untuk menghitung standar deviasi
    $sql = "SELECT 
            STDDEV(ukt) as std_dev,
            AVG(ukt) as mean,
            COUNT(*) as total
            FROM data";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if ($row['total'] > 0) {
            echo "<strong>Hasil Perhitungan Standar Deviasi:</strong><br>";
            echo "Jumlah Data: " . $row['total'] . " mahasiswa<br>";
            echo "Rata-rata UKT: Rp " . number_format($row['mean'], 0, ',', '.') . "<br>";
            echo "Standar Deviasi: Rp " . number_format($row['std_dev'], 0, ',', '.') . "<br>";
        } else {
            echo "Tidak cukup data untuk menghitung standar deviasi";
        }
    } else {
        echo "Terjadi kesalahan dalam perhitungan";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />
	<title> UAS | BASDAT </title>
</head>
<body>
	<div class="bg">
	<a href="#" id="myHeader"> WEB </a>
	<div class="nav-links">
			<a href="#">Login</a>
			<a href="Register.html">Register</a>
	</div>
	</div>

	<div class="kotak">
		<p> <b> Masukkan Data Anda </b></p>
<form action="index.php" method="post">
    <label for="text">Nama*</label><br>
    <input type="text" id="nama" name="nama" value="" required><br>

    <label for="nim">NIM*</label><br>
    <input type="text" id="nim" name="nim" value="" required><br>

    <label for="text">Alamat*</label><br>
    <input type="text"id="alamat" name="alamat" value="" required><br>

    <label for="text">Program Studi*</label><br>
    <input type="text" id="programstudi" name="programstudi" value="" required><br>
    
    <label for="text">UKT*</label><br>
    <input type="text"id="ukt" name="ukt" value="" required><br> <br>

    <input type="submit" value="Submit" name="Submit" style="width: 100%;">


</form>

<form action="index.php" method="post"> 
<div class="tombol">
		<input type="submit" value="Q1" name="Q1"> <br>
    	<input type="submit" value="Q2" name="Q2"> <br>
		<input type="submit" value="Q3" name="Q3"> <br>
	</div>
    <div class="tombol" style="margin-left: 110px;">
		<input type="submit" value="Min" name="Min"> <br>
		<input type="submit" value="Maks" name="Maks"> <br>
	</div>
	<div class="tombol">
		<input type="submit" value="Pencilan Atas" name="Pencilan Atas" > <br>
		<input type="submit" value="Pencilan Bawah" name="Pencilan Bawah"> <br>
		<input type="submit" value="Standar Deviasi" name="StandarDeviasi"> <br>
	</div>
</form>

<p id="myHeader3"> Copyright © 2024 WEB </p>

</body>
</html>