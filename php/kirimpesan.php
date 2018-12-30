$pesan = "Kamu mau pesan apa? [irfnrdh]";
$token  = "?" 
$chatid = "?"

$api = 'https://api.telegram.org/bot'.$token.'/sendMessage?chat_id='.$chatid.'&text='.$pesan.'';

$ch = curl_init($api);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, ($params));
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$result = curl_exec($ch);
curl_close($ch);

var_dump($api);

//kalau pakai fungsi!
function kirimPesan($chatid, $pesan, $token) {
    $url = "https://api.telegram.org/" . $token . "/sendMessage?parse_mode=markdown&chat_id=" . $chatid;
    $url = $url . "&text=" . urlencode($pesan);
    $ch = curl_init();
    $optArray = array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true
    );
    curl_setopt_array($ch, $optArray);
    $result = curl_exec($ch);
    curl_close($ch);
}

//jika handle dari form 
//<form method="POST" action="kirimpesan.php">
//$pesan = $_POST ['pesan'];
//$token  = "?" 
//$chatid = $_POST ['chatid'];
    
if($_SERVER['REQUEST_METHOD'] == "POST"){
   kirimPesan($chatid, $pesan, $token);
}


