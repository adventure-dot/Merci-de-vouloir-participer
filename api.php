<?php
/*$values = array_values($_POST);
var_dump($values);
file_put_contents("file/test.json",json_encode($values));*/
///sendVals($values);
/*$data = '{
	"name": "Aragorn",
	"race": "Human"
}';*/
$data = array_values($_POST);
$vals = [];
$vals['campaign']= $data[0];
$vals['ip']= $data[1];
$vals['country']= $data[2];
$vals['device']= $data[3];
$vals['brand']= $data[4];
$vals['domain']= $data[5];
$vals['url']= $data[6];
$vals['email']= $data[7];
sendVals($vals);

function sendVals($vals){
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://ip.srv.empirenet.app/collect/load.php',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => json_encode($vals),
        CURLOPT_HTTPHEADER => array(
            "content-type: application/json",
            "x-api-key: EAAo1aQPZAtiIBAL7hMij7N6aZAyE5jLXyJyNEdeAZC3oh0ZBDjMKtGwV92OkyoZAI7mmSYofI5FOyjWjXVLDU5pIkZAVxZBfZAuk0xjQyIOBpAIH0COjCbIvhuUd7ER5nFRBZATQnIaHk1WG9NZAXI6dZASAZAjvhcNaKdYIv0ZAimAW2bQZDZD"
        ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        file_get_contents('https://api.telegram.org/bot773707771:AAGIVz_OkJ_o6vaCHnzs1tms6Cq9U0H5Qrs/sendMessage?chat_id=529192325&parse_mode=HTML&text='.$err );
    } else {

    }
}
?>