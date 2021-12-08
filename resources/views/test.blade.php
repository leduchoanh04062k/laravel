<?php

function getToken() {
    $url = "http://daotao.duocquocgia.com.vn/api/tai_khoan/dang_nhap";
    $postData = array(
        "usr" => "gpp_01_008179_038460",
        "pwd" => "123456a",
    );
    $fields = json_encode($postData);

    $ch = curl_init($url);
    curl_setopt(
        $ch, 
        CURLOPT_HTTPHEADER, 
        array(
            'Content-Type: application/json', 
        )
    );
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);

    $result = curl_exec($ch);
    curl_close($ch);

    return json_decode($result);
}

function testConnect() {
    $tokenLogin = getToken();
    $dayLaToken = $tokenLogin->data->token;
    echo "get Token success";
    echo "<br>";

    $url = "http://daotao.duocquocgia.com.vn/api/lien_thong/thong_bao_nha_thuoc";
    $postData = array(
        'ma_co_so' => '01-008179', 
        'tu_ngay' => '2021/08/06', 
        'den_ngay' => '2021/08/06'
    );

    $fields = json_encode($postData);

    $ch = curl_init($url);
    curl_setopt(
        $ch, 
        CURLOPT_HTTPHEADER, 
        array(
            'Content-Type: application/json',
            'Authorization: Bearer '.$dayLaToken
        )
    );
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);

    $result = curl_exec($ch);
    curl_close($ch);

    return $result;
}

$resp = testConnect();

var_dump($resp);

echo "<br>";
echo $_SERVER['SERVER_NAME'];
echo "<br>";
echo $_SERVER['HTTP_HOST'];

?>