<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $message = trim($_POST["message"]);

    if (empty($name) || empty($email) || empty($message)) {
        http_response_code(400);
        echo "Veuillez remplir tous les champs.";
        exit;
    }

    $to = "ravimarannithusan67@gmail.com"; // Remplacez par votre adresse email
    $subject = "Nouveau message de $name";
    $body = "Nom: $name\nEmail: $email\n\nMessage:\n$message";
    $headers = "From: $email";

    if (mail($to, $subject, $body, $headers)) {
        echo "Merci! Votre message a été envoyé.";
    } else {
        http_response_code(500);
        echo "Désolé, une erreur s'est produite. Veuillez réessayer.";
    }
} else {
    http_response_code(403);
    echo "Accès interdit.";
}
?>
