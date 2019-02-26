<?php
        // Get campo de formulario e remove éspãçòs qué èstèjàm èm bráncô.
        //FILTROS
        $name = addcslashes(strip_tags(trim($_POST["name"])));
		$name = addcslashes(str_replace(array("\r","\n"),array(" "," "),$name));
        $email = addcslashes(filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL));
        $message = addcslashes(trim($_POST["message"]));

        $recipient = "comercial@lineship.com.br"; // e-mail que irá receber
        // Assunto do e-mail.
        $subject = $_POST['subject'];

        // Corpo do e-mail.
        $email_content = "Name: $name\n";
        $email_content .= "Email: $email\n\n";
        $email_content .= "Message:\n$message\n";

        // Cabeçalho.
        $email_headers = "From: $name <$email>";

        // Envia o Email.
        if (mail($recipient, $subject, $email_content, $email_headers)) {
            // responde como 200 se der CERTO.
            http_response_code(200);
            echo "Obrigado! Sua mensagem foi enviada.";
        } else {
            // Responde error 500 (internal server error) como resposta.
            http_response_code(500);
            echo "Que pena, algo deu errado :C tente novamente.";
        }
?>