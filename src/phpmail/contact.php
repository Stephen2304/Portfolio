<?php

$curl = curl_init('https://api.mailjet.com/v3.1/send');
// $email = $_POST['email'];
// $name = $_POST['name'];
// $subject = $_POST['subject'];
// $msg = $_POST['message'];


curl_setopt_array($curl, [
    CURLOPT_CAINFO         => __DIR__. DIRECTORY_SEPARATOR . 'cert.cer',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_TIMEOUT        => 1,
    CURLOPT_USERPWD => 'befd5e5a7011d63ed8bee4a1ce9ed73b:3c6cb2b6a4edebcd6f0a5c85b6f0e1b5',
    CURLOPT_HEADER => true,
    CURLOPT_HTTPHEADER => ['Content-Type:application/json'],
    CURLOPT_POSTFIELDS => '{
        "Messages":[
          {
            "From": {
              "Email": "jacquesstephan10@gmail.com",
              "Name": "Stephen",
            },
            "To": [
              {
                "Email": "jacquesstephan10@gmail.com",
                "Name": "Stephen",
              }
            ],
            "Subject": "Nouveau sujet",
            "TextPart": "Greetings from Mailjet.",
            "HTMLPart": "Nouveau test",
            "CustomID": "AppGettingStartedTest",
          }
        ]
      }',
]);

$data = curl_exec($curl);
if ($data === false) {
    var_dump(curl_error($curl));
}else{
    var_dump($data);
}

curl_close($curl);
?>