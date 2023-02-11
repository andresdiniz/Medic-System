<?php
    require 'conexao.php';
    $mysqli = conectadb();
// Obter o token enviado através da URL
    $token = $_GET['token'];
    $senha1 = $_POST['passwd1'];
    $senha2 = $_POST['passwd2'];
    $hash1 = password_hash($senha1, PASSWORD_DEFAULT);
    $hash2 = password_hash($senha2, PASSWORD_DEFAULT);
    $botao = $_POST['envia'];

    // Executar uma consulta para buscar o token e a data de expiração na tabela de tokens de recuperação de senha
    $query = "SELECT email,dataexpiracao FROM recuvery WHERE token = ?";
    $stmt = $mysqli->stmt_init();
    $stmt->prepare($query);
    $stmt->bind_param('s', $token);
    $stmt->execute();
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()){
        $dataexpiracao = $row["dataexpiracao"];
        $email = $row['email'];
    }
    date_default_timezone_set('America/Sao_Paulo');
    $data_agora = date('Y-m-d H:i:s', time());

    if ($result->num_rows > 0) {
        if($dataexpiracao<=$data_agora){
        // Verificar se o token foi encontrado na tabela
        if (isset($botao)) {
            echo "Botao clicado";
            if ($senha1 == $senha2){
                $insert = "UPDATE user SET senha = ? where email = ?";
                $stmt = $mysqli->prepare($insert);
                $stmt->bind_param("ss", $hash1, $email);
                if ($stmt->execute()) {
                    echo ("<script language='javascript' type='text/javascript'>
                    alert('Alterado com sucesso');window.location
                    .href='login.html';</script>");
                    die();
                } else {
                    echo "Error: " . $insert . "<br>" . mysqli_error($mysqli);
                }
            }else{
            echo "As senhas nao conferem";
            }
        }
        
    }else {
        echo ("<script language='javascript' type='text/javascript'>
        alert('Email não localizado na base de usuarios, verifique!');window.location
        .href='login.html';</script>");
        die();
    }
}else{
        echo ("<script language='javascript' type='text/javascript'>
        alert('Link Expirado');window.location
        .href='login.html';</script>");
        die();
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Login Sistema">
    <meta name="Author" content="ANDRE SOARES DINIZ">

    <title>SB Admin 2 - Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Redefinição de senha</h1>
                                    </div>
                                    <form action="" method="post" class="user">
                                        <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user"
                                            id="exampleInputPassword1" name="passwd1" placeholder="Password">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user"
                                            id="exampleInputPassword2" name="passwd2" placeholder="Repeat Password" autocomplete="new-password" onchange="checkigual()">
                                    </div>
                                        <div class="custom-control custom-checkbox small">
                                            <input type="checkbox" class="custom-control-input" id="showSenha" autocomplete="new-password" onchange="exibirOcultarSenha()">
                                            <label class="custom-control-label" for="showSenha">Mostrar a senha</label>
                                        </div><hr><br>
                                        <button type="submit" id="btn" name="envia" class="btn btn-primary btn-user btn-block">login</button> 
                                        <div class="row form-group" id="check"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>


<script language='javascript' type='text/javascript'>

function exibirOcultarSenha() {
  var senha = document.getElementById("exampleInputPassword1");
  var senha2 = document.getElementById("exampleInputPassword2");
  if (senha.type === "password") {
    senha.type = "text";
  } else {
    senha.type = "password";
  }
  if (senha2.type === "password") {
    senha2.type = "text";
  } else {
    senha2.type = "password";
  }
}

function checkigual() {
  var senha = document.getElementById("exampleInputPassword1").value;
  var senha2 = document.getElementById("exampleInputPassword2").value;
  var check = document.getElementById('check');
  if(senha==senha2){
    check.innerHTML = '';
    document.getElementById("btn").disabled = false;
    $estado=true;
  }else{
    check.innerHTML = "As senhas não conferem";
    //document.getElementById("btn").style.backgroundColor = "gray";
    document.getElementById("btn").disabled = true;

  }
}

function recebe() {
    var retorno = <?php echo json_encode($return); ?>;

    if (!retorno) {
    window.alert("Token inválido ou expirado!");
    window.location.href='login.php';
    }
}
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
        }
</script>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    
</body>
</html>


</html>
