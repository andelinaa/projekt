<?php
   $name = $_POST['name'];
   $email = $_POST['email'];
   $phone = $_POST['phone'];
   $message = $_POST['message'];

   if(!empty($email) && !empty($message)) {
        if(filter_var($email, FILTER_VALIDATE_EMAIL)) { //upozorni pokud email je spatne napsany 
            $receiver = "andreea-gutu@email.cz"; //email kam se zprava posle 
            $subject = "From: $name <$name>"; 
            $body = "Jméno: $name\nEmail: $email\nTelefon: $phone\n\nZpráva: $message\n\nPozdravuje,\n$name";
            $headers = "From: Royal Drinks <info@royaldrinks.cz>";

            $success = mail($receiver, $subject, $body, $headers);

            if (!$success) {
                print_r(error_get_last()['message']);
             }
            if($success) {
                echo "Vaše zpráva byla úspěšně odeslána";  //Pokud byl formulář úspěšně odeslán
            } else {
                echo "Něco se pokazilo při odesílání zprávy. Zkuste to znovu."; //Pokud se vyskytně chyba při odesílání formuláře
            }
        } else {
            echo "Emailová adresa je špatně zadaná!"; //Pokud bude emailová adresa ve špatném formátu
        }
   } else {
        echo "Doplňte Email a Zprávu!"; //Pokud nebude vyplněn email a zpráva
   }
?>
