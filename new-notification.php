<?php

include 'Controllers/notificationController.php';

$notification = new notifications();
$titulo_notificacao = $_GET['titulo'];
$mensagem_notificacao  = $_GET['mensagem'];
$credentials_name = $_GET['nome'];
$credentials_senha = $_GET['senha'];
$oneSignalUser = "INSERT YOUR ONESIGNAL USER HERE";
$oneSignalPassword = "INSERT YOUR ONESIGNAL PASSWORD HERE";

if ($credentials_name == $oneSignalUser && $credentials_senha == $oneSignalPassword) {
    $response = $notification->newNotification($titulo_notificacao, $mensagem_notificacao);
    //$return["allresponses"] = $response;
    //$return = json_encode($return);

    /*print("\n\nJSON received:\n");
    print($return);
    print("\n");*/

    $data_sucess = array(
        "Info" => "Notificação Enviada",
        "Success" => "Pass"
    );
    print(json_encode($data_sucess));
} else {
    $data_error = array(
        "Info" => "Não é possível enviar notificação",
        "Error" => "Username or password Incorrects"
    );
    print(json_encode($data_error));
}
