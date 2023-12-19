<?php
    require_once('define.php');
 
    /**
     * SET CONNECT
     */
    $conn = mysqli_connect(LOCALHOST,USERNAME,PASSWORD,DATABASE);
    if (!$conn) {
        echo "Error: Unable to connect to MySQL." . PHP_EOL;
        echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
        echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
        exit;
    }
     
 
    
    require_once 'vendor/autoload.php';
    $clientId = '955877358352-emkihss6u6nk6f4qdhvj1diu1tkg5arn.apps.googleusercontent.com';
    $clientSecret = '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';

    $client = new \Google_Client();
    $client->setClientId($clientId);
    $client->setClientSecret($clientSecret);
    $client->setRedirectUri('http://localhost/codePHP/demo/redirect-google.php');
    $client->addScope("email");
    $client->addScope("profile");
    if (isset($_GET['code'])) {
        //var_dump($_GET['code']);
        $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
        echo '<pre>';
        print_r($token);die();
    } else {
        echo "<a href='".$client->createAuthUrl()."'>Google Login</a>";
    }