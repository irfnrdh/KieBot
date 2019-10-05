<?php

    $mysql_host = "localhost";
    $mysql_user = "root";
    $mysql_pass = "";
    $mysql_dbname = "meme";

    $conn = mysqli_connect($mysql_host, $mysql_user, $mysql_pass,$mysql_dbname) or die ("Tidak Dapat Terhubung ke Server");

    //fetch table rows from mysql db
    $sql = "select * from chat";
    $result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($connection));

    //create an array
    $emparray = array();
    while($row =mysqli_fetch_assoc($result))
    {
        $emparray[] = $row;
    }
    
    //echo json_encode($emparray);

    $data = json_encode($emparray);

    //write to json file
    // $fp = fopen('empdata.json', 'w');
    // fwrite($fp, json_encode($emparray));
    // fclose($fp);

   
    
    
    function jawaban($pertanyaan){ 
        $mysql_host = "localhost";
        $mysql_user = "root";
        $mysql_pass = "";
        $mysql_dbname = "meme";


        $conn = mysqli_connect($mysql_host, $mysql_user, $mysql_pass,$mysql_dbname) or die ("Tidak Dapat Terhubung ke Server");

        //fetch table rows from mysql db
        $sql = "select * from chat";
        $result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($connection));

        //create an array
        $emparray = array();
        while($row =mysqli_fetch_assoc($result))
        {
            $emparray[] = $row;
        }
        
        //echo json_encode($emparray);

        $data = json_encode($emparray);
        $url = 'https://api.irfnrdh.com/meme/json.php';
        $arr = json_decode(file_get_contents($url),true);   
        $find_val = $pertanyaan;
        $jawaban = "";
        foreach ($arr as $key => $value) {
            if($value['pertanyaan'] == $find_val){
                $jawaban = $value['jawaban'];
            }
        }  
        return $jawaban;
        mysqli_close($conn);
    }

    


    function pertanyaan($pertanyaan){ 
        $url = 'https://api.irfnrdh.com/meme/json.php';
        $arr = json_decode(file_get_contents($url),true);  
        $find_val = $pertanyaan;
        $jawaban = "";
        foreach ($arr as $key => $value) {
            if($value['pertanyaan'] == $find_val){
                $jawaban = $value['pertanyaan'];
            }
        }  
        return $jawaban;
        mysqli_close($conn);
    }
    

    $pesan = "Halo";
    if ($pesan == pertanyaan($pesan)){
        echo $pesan_balik = jawaban($pesan);
    }else{
        $pesan_balik = "hehehe";
    }

    //echo jawaban('Halo');

    //close the db connection
   


 










?>