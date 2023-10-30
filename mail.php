<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $assunto = $_POST["assunto"];
    $mensagem = $_POST["mensagem"];

    $para = "seu_email@example.com"; // Substitua pelo seu endereço de e-mail
    $assunto_email = "Novo contato: " . $assunto;
    $mensagem_email = "Nome: $nome\n";
    $mensagem_email .= "E-mail: $email\n";
    $mensagem_email .= "Assunto: $assunto\n";
    $mensagem_email .= "Mensagem:\n$mensagem";

    // Você pode usar a função mail() do PHP para enviar o e-mail
    if (mail($para, $assunto_email, $mensagem_email)) {
        $response = array("success" => true);
    } else {
        $response = array("success" => false);
    }

    header("Content-Type: application/json");
    echo json_encode($response);
} else {
    // Caso alguém tente acessar este arquivo diretamente, retorne um erro.
    header("HTTP/1.1 403 Forbidden");
    echo "Acesso proibido";
}
?>
