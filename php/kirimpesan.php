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

