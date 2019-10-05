<?php

/*
ini adalah simple webhook
deletewebhook
setwebhook?url=<url file ini>

https://api.telegram.org/bot691104212:AAHDC8khfFAvcR3_9PNLxQodBYXlApRLxrY/setwebhook?url=https://api.irfnrdh.com/meme/index.php

*/
error_reporting(0);

// ==== BEGIN / variabel must be adjusted ====

$token = "bot"."691104212:AAHDC8khfFAvcR3_9PNLxQodBYXlApRLxrY";
$proxy = "";
$mysql_host = "83.136.216.168";
$mysql_user = "u6273193_kiebot";
$mysql_pass = "katasandi112";
$mysql_dbname = "u6273193_kiebot";

// ==== END / variabel must be adjusted ====

$conn = mysqli_connect($mysql_host, $mysql_user, $mysql_pass,$mysql_dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";

$updates = file_get_contents("php://input");

$updates = json_decode($updates,true);
$pesan = $updates[message][text];
$chat_id = $updates[message][chat][id];

$text = strtolower ($pesan); 




function jawaban($pertanyaan) {
    $sql = "SELECT pertanyaan FROM chat WHERE pertanyaan='$pertanyaan';";
    if(mysqli_query($conn,$sql)) {
    		$pesan_balik = "Terima kasih Data Anda sudah kami simpan.";
    }
    	
    
    echo "$fname Refsnes.<br>";
}


// Pesan Pembuka.

if($text == "meme"){
    	$pesan_balik = "Saya tuan, apa yang bisa saya bantu?";
}else{
    
}


if($text == "uy"){
    	$pesan_balik = "iyoooo";
}


if($text == "hari apa ni"){
    	$pesan_balik = "kayaknya ini hari " . date("l");
}

// Id |pertanyaan | Jawaban | Koreksi | Katagori 
//halo
//uyy haloo
//meme
//meeeemeeeee

if($pesan == $pesan){
    	$pesan_balik = "ihh apaan sih itu? kagak ngerti gua -_-";
}



// Dua kata
$datas = explode(' ',trim($pesan));

if($datas[0] == "pesan"){
    	$pesan_balik = "pesan apa?";
}

if($datas[0] == "nama"){
        $nama = $datas[1];
        $sql = "insert into data_telegram values ('$nama','kosong','kosong', now())";
    	if(mysqli_query($conn,$sql)) {
    		$pesan_balik = "Terima kasih Data Anda sudah kami simpan.";
    	}
    	//$pesan_balik = "nama?";
}


if(strpos($pesan,"simpan#")>0){
    echo "benar";
/*	$datas = split("#",$pesan);
	$nama = $datas[1];
	$alamat = $datas[2];
	$hp = $datas[3];
	$sql = "insert into data_telegram values ('$nama','$alamat','$hp', now())";
	if(mysql_query($sql,$conn)) {
		$pesan_balik = "Terima kasih Data Anda sudah kami simpan.";
	}
	else $pesan_balik = "Data gagal disimpan silahkan coba lagi";
*/
}

/*
$pesan = strtoupper($pesan);

if(strpos($pesan,"DAFTAR#")>0){
	$datas = split("#",$pesan);
	$nama = $datas[1];
	$alamat = $datas[2];
	$hp = $datas[3];
	$sql = "insert into data_telegram values ('$nama','$alamat','$hp', now())";
	if(mysql_query($sql,$conn)) {
		$pesan_balik = "Terima kasih Data Anda sudah kami simpan.";
	}
	else $pesan_balik = "Data gagal disimpan silahkan coba lagi";
}
else $pesan_balik = "Mohon maaf format yang Anda kirim salah, silahkan kirim ulang dengan Format DAFTAR%23[NAMA]%23[ALAMAT]%23[HP] Contoh Monster Mahoni%23Jalan Anggrek No 1 Jakarta%2308581234567";
*/

$url = "https://api.telegram.org/$token/sendMessage?parse_mode=markdown&chat_id=$chat_id&text=$pesan_balik";

$ch = curl_init();
	
	
if($proxy==""){
	$optArray = array(
		CURLOPT_URL => $url,
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_CAINFO => "cacert.pem"	
	);
}
else{ 
	$optArray = array(
		CURLOPT_URL => $url,
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_PROXY => "$proxy",
		CURLOPT_CAINFO => "cacert.pem"	
	);	
}

	
curl_setopt_array($ch, $optArray);
$result = curl_exec($ch);
	
$err = curl_error($ch);
curl_close($ch);	
	
if($err<>"") echo "Error: $err";
else echo "Pesan Terkirim";

?>



<?
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "meme";


// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


// [Memasukan Data]
// $sql = "INSERT INTO chat (pertanyaan, jawaban)
// VALUES ('Halo', 'Halo juga ^_^')";

// if (mysqli_query($conn, $sql)) {
//     echo "New record created successfully";
// } else {
//     echo "Error: " . $sql . "<br>" . mysqli_error($conn);
// }

// [Cek ID Terakhir]
// if (mysqli_query($conn, $sql)) {
//     $last_id = mysqli_insert_id($conn);
//     echo "\nNew record created successfully. Last inserted ID is: " . $last_id;
// } else {
//     echo "Error: " . $sql . "<br>" . mysqli_error($conn);
// }


// [Cek data berdasarkan inputan]

// $input = strtolower('HALO');
// $sql = "SELECT pertanyaan FROM chat WHERE pertanyaan='$input'";
// $result = $conn->query($sql);
// $count = mysqli_num_rows($result);
// if ($count  > 0) {
//    		echo "\nData ditemukan [$count] :v";
//    }else{
//     	echo "gagal!";
//    }
// mysqli_close($conn);



// function low($input) {
// 	strtolower($inpu);
//     return strtolower($input);
// }




?>