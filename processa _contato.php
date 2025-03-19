<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Coletar dados do formulário
    $nome = filter_var(trim($_POST["nome"]), FILTER_SANITIZE_STRING);
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $telefone = filter_var(trim($_POST["telefone"]), FILTER_SANITIZE_STRING);
    $mensagem = filter_var(trim($_POST["mensagem"]), FILTER_SANITIZE_STRING);
    
    // Validação básica
    if (empty($nome) || empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL) || empty($telefone) || empty($mensagem)) {
        die("Por favor preencha todos os campos corretamente.");
    }

    // Dados do e-mail
    $to = "contato@bithostel.com"; // Troque pelo e-mail correto da Bithostel TI
    $subject = "Solicitação de Teste Gratuito do OpenVPN";
    $body = "Nome: $nome\nE-mail: $email\nTelefone: $telefone\nMensagem:\n$mensagem";
    $headers = "From: $email";

    // Enviar e-mail
    if (mail($to, $subject, $body, $headers)) {
        echo "Solicitação enviada com sucesso!";
    } else {
        echo "Ocorreu um erro ao enviar sua solicitação. Por favor, tente novamente mais tarde.";
    }
} else {
    echo "Método de requisição inválido.";
}
?>
