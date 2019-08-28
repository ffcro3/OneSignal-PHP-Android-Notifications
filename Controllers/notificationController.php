<?php

class notifications
{

    public function newNotification($titulo, $mensagem)
    {
        $content = array(
            "en" => $mensagem
        );
        $title = array(
            "en" => $titulo
        );

        $fields = array(
            'app_id' => "0bcdf611-6590-4c2d-8035-f6fe14985e81",
            'included_segments' => array('Active Users'),
            'data' => array("foo" => "bar"),
            'contents' => $content,
            'headings' => $title
        );

        $fields = json_encode($fields);
        //print("\nJSON sent:\n");
        //print($fields);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json; charset=utf-8',
            'Authorization: Basic <<INSERT YOUR AUTOHORIZATION TOKEN HERE>>'
        ));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

        $response = curl_exec($ch);
        curl_close($ch);

        return $response;
    }
}
