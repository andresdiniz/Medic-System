<?php
require "permissoes.php";
$mysqli = conectadb();
$envia = $_POST['Enviar'];

if(isset($envia)){
    $nome = $_POST['nome'];//OK
    $cpf = $_POST['cpf'];//OK
    $telefone = $_POST['tel'];//OK
    $sexo = $_POST['gender'];//OK
    $cep = $_POST['cep'];//OK
    $rua = $_POST['rua'];//OK
    $numero = $_POST['numero'];//OK
    $bairro = $_POST['bairro'];//OK
    $cidade = $_POST['cidade'];//OK
    $uf = $_POST['uf'];//OK
    $convenio = $_POST['convenio'];//OK
    $numeroconv = $_POST['nconvenio'];//OK
    $complemento = $_POST['complemento'];//OK
    $datanasc = $_POST['datanasc'];//OK
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Novo Cliente</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>


</head></head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Clinic <sup>2</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Tela Inicial</span></a>
            </li>
            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Clientes</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Controle de Clientes:</h6>
                        <a class="collapse-item" href="newclient.php"><i class="fas fa-sharp fa-solid fa-plus"></i>&nbsp;Novo Cliente</a>
                        <a class="collapse-item" href="findclient.php"><i class="fas fa-search"></i>&nbsp;Buscar Clientes</a>
                        <a class="collapse-item" href="forgot-password.html"><i class="fa-sharp fas fa-file"></i>&nbsp;Prontuario Cliente</a>
                        <div class="collapse-divider"></div>
                        <h6 class="collapse-header">Outras Paginas:</h6>
                        <a class="collapse-item" href="404.html"><i class="fa-sharp fas fa-print"></i>&nbsp;Imprimir Receita</a>
                        <a class="collapse-item" href="blank.html"><i class="fa-sharp fas fa-print"></i>&nbsp;Imprimir Pedidos Exames</a>
                    </div>
                </div>
            </li>

            <!-- Segundo item do menu-->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages1"
                    aria-expanded="true" aria-controls="collapsePages1">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Agendamentos</span>
                </a>
                <div id="collapsePages1" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Controle de Agendamentos:</h6>
                        <a class="collapse-item" href="login.html"><i class="fas fa-sharp fa-solid fa-plus"></i>&nbsp;Novo Agendamento</a>
                        <a class="collapse-item" href="register.html"><i class="fas fa-search"></i>&nbsp;Verificar por Cliente</a>
                        <a class="collapse-item" href="forgot-password.html"><i class="fas fa-calendar"></i>&nbsp;Verificar por Data</a>
                        <div class="collapse-divider"></div>
                        <h6 class="collapse-header">Outras Paginas:</h6>
                        <a class="collapse-item" href="404.html"><i class="fas fa-user-md"></i>&nbsp;Verificar por M??dico</a>
                        <a class="collapse-item" href="blank.html"><i class="fas fa-stethoscope"></i>&nbsp;Verificar por Especialidade</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="charts.html">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Graficos</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <div class="sidebar-heading">
                Configura????es
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Usuarios</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Outros componentes:</h6>
                        <a class="collapse-item" href="buttons.html">Cadastrar Usuarios</a>
                        <a class="collapse-item" href="cards.html">Alterar Usuarios</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Utilidades</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Outras Utilidades:</h6>
                        <a class="collapse-item" href="utilities-color.html">Cnpj Empresa</a>
                        <a class="collapse-item" href="utilities-border.html">Convenios</a>
                        <a class="collapse-item" href="utilities-animation.html">Especialidades</a>
                        <a class="collapse-item" href="utilities-other.html">Outros</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $nome_user;?></span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="perfiuser.php">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Perfil
                                </a>
                                <a class="dropdown-item" href="settings.php">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Configura????es
                                </a>
                                <a class="dropdown-item" href="logs">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Log de Atividades
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Sair
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Cadastro de cliente</h1>
                    </div>
                    <form action="" method="post" class="responsive form-floating" autocomplete="off">
                        <div class="row mb-3 responsive">
                            <div class="col-4">
                                <div class="form-floating">
                                    <input type="text" name="nome" class="form-control" placeholder="Nome do cliente" id="NomeCliente" required="Nome do Cliente ?? obrigatorio" onkeyup="capitalize(event)">
                                    <label for="NomeCliente">Nome</label>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-floating">
                                    <input type="text" name="cpf" class="form-control" placeholder="CPF" maxlength="14" id="CPFCliente" onkeyup="mascara(this, '###.###.###-##')"  required>
                                    <label for="CPFCliente">CPF</label>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-floating">
                                    <input type="tel" name="tel" class="form-control" placeholder="Numero de Telefone" id="telefone" onkeypress="mascara2(this)" maxlength="15" required>
                                    <label for="telefone">Telefone</label>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-floating">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="gender" id="male" value="male" checked>
                                            Masculino
                                        </label>
                                        </div>
                                        <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="gender" id="female" value="female">
                                            Feminino
                                        </label>
                                    </div>
                                  </div>
                            </div>
                            
                        </div>
                        <div class="row mb-2">
                            <div class="col-2">
                                <div class="form-floating">
                                    <input type="text" name="cep" id="cep" class="form-control" placeholder="CEP" id="cepid" required="Coloque o cep" onblur="pesquisacep(this.value)" oninput="mascara(this, '#####-###')" maxlength="9">
                                    <label for="cepid">CEP</label>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-floating">
                                        <input type="text" name="rua" class="form-control" placeholder="Rua" id="rua" required="Rua ?? obrigatoria">
                                        <label for="rua">Rua</label>
                                    </div>
                                </div>
                            <div class="col-2">
                                <div class="form-floating">
                                        <input type="number" name="numero" class="form-control" placeholder="Numero" id="nid" required="Cidade ?? obrigatorio">
                                        <label for="nidconv">Numero</label>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-floating">
                                    <input type="text" name="cidade" class="form-control" placeholder="Cidade" id="cidade" required="Cidade ?? obrigatorio">
                                    <label for="cidade">Cidade</label>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-floating">
                                        <select name="uf" id="uf"class="form-control">
                                            <option value="" selected>Selecione Estado</option>
                                        </select>
                                        <label for="uf">UF</label>
                                    </div>
                            </div>     
                        </div>
                        <div class="row mb-2">
                            <div class="col-4">
                                <div class="form-floating">
                                    <input type="text" name="complemento" class="form-control" placeholder="Complemento" id="cpd">
                                    <label for="cpd">Complemento</label>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-floating">
                                    <input type="text" name="bairro" class="form-control" placeholder="Bairro" id="bairro">
                                    <label for="cpd">Bairro</label>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-floating">
                                        <input type="text" name="convenio" class="form-control" placeholder="Convenio"  id="ConvCliente">
                                        <label for="ConvCliente">Convenio do Cliente</label>
                                    </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-4">
                                <div class="form-floating">
                                    <input type="number" name="nconvenio" class="form-control" placeholder="Numero convenio" id="nid">
                                    <label for="ncinvid">Codigo conv??nio</label>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-floating">
                                        <input type="date" name="datanasc" class="form-control" placeholder="Data de nascimento"  id="datanascimento" onchange="calcularIdade(this.value)">
                                        <label for="datanascimento">Data de nascimento</label>
                                    </div>
                            </div>
                            <div class="col-4">
                                <div class="form-floating">
                                    <button type="submit" name="Enviar" class="btn btn-primary" id="submeter">Enviar</button>
                                    <button type="button" class="btn btn-warning" onclick="refresh()">Resetar</button>
                                </div>
                            </div>
                        </div>
                    </form> 
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Painel de Controle 2023</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">??</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

    <!--Confere a presen??a de cookies e logins-->

    <!--Scripts proprios-->
    <script src="js/system-system.js" defer></script>


</body>

</html>
