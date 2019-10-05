<?php
error_reporting(0);

$token = "bot"."691104212:AAHDC8khfFAvcR3_9PNLxQodBYXlApRLxrY";
$proxy = "";
$mysql_host = "83.136.216.168";
$mysql_user = "u6273193_kiebot";
$mysql_pass = "katasandi112";
$mysql_dbname = "u6273193_kiebot";


$conn = mysqli_connect($mysql_host, $mysql_user, $mysql_pass,$mysql_dbname);
if (!$conn) {
    die("Tidak dapat terhubung ke server!");
}

$updates = file_get_contents("php://input");

$updates = json_decode($updates,true);
$pesan   = $updates[message][text];
$chat_id = $updates[message][chat][id];
$photo   = $updates[photo];

function jawaban($keyword) {
    $pertanyaan = strtolower ($keyword); 
    $sql = "SELECT pertanyaan FROM chat WHERE pertanyaan='$pertanyaan';";
    $result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) {
	    return true;
	} else {
	    return false;
	}
	mysqli_close($conn);
}


if(jawaban($text) == true){
    	$pesan_balik = "Saya tuan, apa yang bisa saya bantu?";
}else{
	    $pesan_balik = "Apaan sih, meme gak ngerti nih -_-";
}




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

