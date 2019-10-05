<?php
error_reporting(0);

$mysql_host = "localhost";
$mysql_user = "root";
$mysql_pass = "";
$mysql_dbname = "meme";

$conn = mysqli_connect($mysql_host, $mysql_user, $mysql_pass,$mysql_dbname);
if (!$conn) {
    die("Tidak dapat terhubung ke server!");
}

$text = "halo0";

$pertanyaan = strtolower ($text); 
$sql = "SELECT pertanyaan,jawaban FROM chat WHERE pertanyaan LIKE '%$pertanyaan%' ;";
$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) {
		while($row = $result->fetch_assoc()) {
        echo $row["jawaban"];
        }
		//echo  "Saya tuan, apa yang bisa saya bantu?";
	} else {
		echo "Apaan sih, meme gak ngerti nih -_-";
	}
mysqli_close($conn);

