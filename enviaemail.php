<?php

$email = $_POST['email'];
$email = filter_var($email, FILTER_SANITIZE_EMAIL);
$reset = $_POST['reset'];

if (isset($reset)) {
    if ($email !== false) {
        date_default_timezone_set('America/Sao_Paulo');
        $expiracao = date('Y-m-d H:i:s', time() + 7200);
        $token = bin2hex(random_bytes(16));
        require "conexao.php";
        $mysqli = conectadb();
        $stmt = $mysqli->prepare("SELECT * FROM user WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $num_rows = $result->num_rows;

        if ($num_rows > 0) {
            // there are rows in the result
            //$array = $result->fetch_assoc();
            $token = bin2hex(random_bytes(16));
            date_default_timezone_set('America/Sao_Paulo');
            $expiracao = date('Y-m-d H:i:s', time() + 7200);
            $stmt1 = $mysqli->prepare("INSERT INTO recuvery( email, token, dataexpiracao) VALUES (?,?,?)");
            $stmt1->bind_param("sss", $email,$token,$expiracao);
            $stmt1->execute();
            $stmt->close();
        $mysqli->close();
        
        // Enviar um email para o usuário com um link para a página de redefinição de senha
        $link_redefinicao = "https://fzconsignados.com.br/dashboard/painel/dashboard/redefinir-senha.php?token=$token";
        $subject = 'Sistema Clinica';
        
        
        // Este sempre deverá existir para garantir a exibição correta dos caracteres
        $headers = "MIME-Version: 1.1\n";
        
        // Para enviar o e-mail em formato HTML com codificação de caracteres Unicode (Usado em todos os países)
        $headers .= "Content-type: text/html; charset=utf-8\n";
        
        // E-mail que receberá a resposta quando se clicar no 'Responder' de seu leitor de e-mails
        $headers .= "Reply-To: e-mailDeQuemPreencheuSeuFormulario@dominio.com\n";
        // para enviar a mensagem em prioridade máxima
        $headers .= "X-Priority: 3\n";
        
        $headers = "MIME-Version: 1.1\n";
        $headers .= "Content-type: text/html; charset=UTF-8\n";
        $headers .= "From: andresoaresdiniz201218@gmail.com\n"; // remetente
        $headers .= "Return-Path: noreply@fzconsignados.com.br\n"; // return-path
    $corpo = '<!DOCTYPE html>
        <html>
        <head>
            <style>
            /* Adicione o seu CSS aqui */
            body {
                font-family: Arial, sans-serif;
            }
            .container {
                max-width: 600px;
                margin: 0 auto;
                text-align: center;
            }
            h1 {
                color: #333;
            }
            a {
                display: inline-block;
                background-color: #3498db;
                color: #ffffff;
                padding: 15px;
                border-radius: 5px;
                text-decoration: none;
            }
            </style>
        </head>
        <body>
            <div class="container">
            <h1>Olá,</h1>
            <p>Recebemos uma solicitação de recuperação de senha para sua conta.</p>
            <p>Se você não solicitou a recuperação de senha, por favor ignore este e-mail.</p>
            <p>Caso contrário, clique no link abaixo para definir uma nova senha:</p><a href="';?>
            <?php 
            $corpo2 = "$link_redefinicao>Definir nova senha</a>
            <p>Obrigado!</p>
            </div>
        </body>
        </html>";
        $corpo3 = $corpo.$corpo2;

        mail($email, $subject, $corpo3, $headers);

        echo ("<script language='javascript' type='text/javascript'>
                                    alert('Email enviado, verifique seu email');window.location
                                    .href='login.html';</script>");
                                    die();
        } else {
            // no rows in the result

            echo ("<script language='javascript' type='text/javascript'>
                                    alert('Email não localizado na base de usuarios, verifique!');window.location
                                    .href='login.html';</script>");
                                    die();
        }
    } else {
        echo ("<script language='javascript' type='text/javascript'>
        alert('Email invalido');window.location
        .href='login.html';</script>");
        die();
        }
    }

?>