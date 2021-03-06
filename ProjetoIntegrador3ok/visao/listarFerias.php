<?php
// esse bloco de código em php verifica se existe a sessão, pois o usuário pode simplesmente não fazer o login e digitar na barra de endereço do seu navegador o caminho para a página principal do site (sistema), burlando assim a obrigação de fazer um login, com isso se ele não estiver feito o login não será criado a session, então ao verificar que a session não existe a página redireciona o mesmo para a index.php. 
session_start();

if ((!isset($_SESSION['email']) == true) and ( !isset($_SESSION['senha']) == true)) {
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    header('location:index.php');
}
//grava a sessão dos dados do usario logando atarvs de uma sessão 
$logado = $_SESSION['email'];
?>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>SGD</title>
        <!-- Parte responsiva -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.5 -->
        <link rel="stylesheet" href="../visao/bootstrap/css/bootstrap.min.css">
        <!-- Fontes usadas -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <!-- icones -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- tema -->
        <link rel="stylesheet" href="../visao/dist/css/AdminLTE.min.css">

        <link rel="stylesheet" href="../visao/dist/css/skins/skin-blue.min.css">
        <script language="Javascript">
            //alerta se deseja excluir ou não os dados
            function confirmacao() {
                var resposta = confirm("Tem certeza que desejaremover seus dados?");

                if (resposta == true) {
                    window.location.href = "../modelo/ExcluirConta.php?nome=$exibe[nome]";
                }
            }
        </script>
        <script language="Javascript">
            //alerta se deseja excluir ou não os dados
            function confirmacaoEx() {
                var resposta = confirm("Tem certeza que desejaremover seus dados?");

                if (resposta == true) {
                    window.location = "../visao/Alterarfuncionario.php?id=<?php echo $linha['id']; ?>";
                }
            }
        </script>

    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">

            <header class="main-header">

                <a href="index2.html" class="logo">

                    <span class="logo-mini"><b>S</b>GD</span>
                    <span class="logo-lg"><b>SGD</b></span>
                </a>

                <nav class="navbar navbar-static-top" role="navigation">
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>
                    <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
                        <ul class="nav navbar-nav">
                            <li><a href="pagina_inicial.php">Inicio</a></li>
                            <li data-toggle="modal" data-target="#suporte"><a href="#">Suporte</a></li>
                            <li data-toggle="modal" data-target="#contato"><a href="#">Ajuda</a></li>
                        </ul>
                    </div>
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <li><a><?php echo $logado ?></a></li>
                            <li><a  href="../controle/logout.php" >» Logout</a></li>
                            <li class="dropdown user user-menu"></li>
                        </ul>
                    </div>
                </nav>
            </header>
            <aside class="main-sidebar">
                <section class="sidebar" >
                    <ul class="sidebar-menu">
                        <li class="header">Menu</li>
                        <li class="treeview">
                            <a href="#"><i class="fa fa-calendar-check-o"></i> <span>Agenda de tarefas</span> <i class="fa fa-angle-left pull-right"></i></a>
                            <ul class="treeview-menu">
                                <li><a href="../visao/Agendar.php">Agendar tarefa</a></li>
                                <li><a href="../visao/listartarefas.php">Listar tarefas</a></li>
                            </ul>
                        </li>

                        <li class="treeview">
                            <a href="#"><i class="glyphicon glyphicon-pencil"></i> <span>Avaliações</span> <i class="fa fa-angle-left pull-right"></i></a>
                            <ul class="treeview-menu">
                                <li class="treeview">
                                    <a href="#"><i></i> <span>Avaliação 360°</span> <i class="fa fa-angle-left pull-right"></i></a>
                                    <ul class="treeview-menu">
                                        <li><a href="../visao/avaliadoformulario1.php">Avaliação enxuta</a></li>
                                        <li><a href="../visao/avaliadoformulario2.php">Avaliação direta</a></li>
                                        <li><a href="../visao/avaliadoformulario3.php">Avaliação complexa</a></li>
                                    </ul>
                            </ul>
                        </li>

                        <li class="treeview">
                            <a href="#">
                                <i class="glyphicon glyphicon-off"></i> <span>Desligamento</span> <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="../visao/Desligamento.php">Desligar funcionário</a></li>
                            </ul>
                        </li>

                        <li class="treeview">
                            <a href="#"><i class="glyphicon glyphicon-list-alt"></i> <span>Férias</span> <i class="fa fa-angle-left pull-right"></i></a>
                            <ul class="treeview-menu">
                                <li><a href="../visao/agedarFerias.php">Agendar férias</a></li>
                                <li><a href="../visao/listarFerias.php">Agenda das férias</a></li>
                            </ul>
                        </li>

                        <li class="treeview">
                            <a href="#">
                                <i class="glyphicon glyphicon-user"></i> <span>Funcionário</span> <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="CadastrarFuncionario.php">Cadastar funcionário</a></li>
                                <li><a href="../visao/Funcionario.php">Lista funcionário</a></li>
                            </ul>
                        </li>

                        <li class="treeview">
                            <a href="#"><i class="fa fa-comments"></i> <span>Reuniões</span> <i class="fa fa-angle-left pull-right"></i></a>
                            <ul class="treeview-menu">
                                <li><a href="../visao/Consultarreuniao.php">Consultar reuniões</a></li>
                                <li><a href="../visao/listarReuniao.php">Listar reuniões</a></li>
                                <li><a href="../visao/MarcarRuniao.php">Marcar reunião</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#"><i class="fa fa-graduation-cap"></i> <span>Treinamento</span> <i class="fa fa-angle-left pull-right"></i></a>
                            <ul class="treeview-menu">
                                <li><a href="../visao/AdicionarTreinamento.php">Adicionar treinamento</a></li>
                                <li><a href="../visao/agendarTreinamento.php">Agendar treinamento</a></li>
                                <li><a href="../visao/listarTreinamento.php">Lista treinamento</a></li>
                            </ul>
                        </li>
                    </ul>
                </section>
            </aside>

            <div class="content-wrapper"> 
                <section class="content-header">
                    <h1>Agenda de férias dos funcionário</h1>
                </section>
            </div>

            <?php
// definições de host, database, usuário e senha

            require_once("../modelo/conexao.php");

// cria a instrução SQL que vai selecionar os dados
            $query = @mysqli_query("SELECT *,date_format(dataInicialFerias, '%d/%m/%Y') AS dataInicialFerias,date_format(dataFinalFerias, '%d/%m/%Y') AS dataFinalFerias FROM registraferias INNER JOIN funcionario ON registraferias.id=funcionario.id INNER JOIN ferias ON registraferias.id_ferias=ferias.id_ferias ");


// executa a query
//$dados = mysqli_query($query, $conexao) or die(mysqli_error());
// transforma os dados em um array
            $linha = @mysqli_fetch_assoc($query);
// calcula quantos dados retornaram
            $total = @mysqli_num_rows($query);
            ?>
            <div class="table-responsive">
                <table border="0" class="display table" width="100%" id="tdFuncionario"> 
                    <thead>            
                        <tr>
                            <td ><strong>ID</strong> <td><strong>FUNCIONARIO</strong> </td><td><strong>DATA DE ÍNCIO DAS FÉRIAS</strong> </td><td><strong>DATA DE TERMÍNIO DAS FÉRIAS</strong> </td>
                            <?php
// se o número de resultados for maior que zero, mostra os dados
                            if ($total > 0) {

                                // inicia o loop que vai mostrar todos os dados
                                do {
                                    ?>

                            </thead>
                            <tbody>
                                <tr>
                                    <td ><?php echo $linha['id'] ?> </td> <td><?php echo $linha['Nome'] ?></td><td><?php echo $linha['dataInicialFerias'] ?></td><td><?php echo $linha['dataFinalFerias'] ?></td>


                                    <td><a href="../visao/editaferias.php?id=<?php echo $linha['id_ferias']; ?>"><button class="btn btn-primary">Aterar</button></a></td>
                                    <td><a href="../modelo/ExcluirAgendaFerias.php?id=<?php echo $linha['id_resgistrarFerias']; ?>" onClick="return confirm('Deseja realmente deletar o agendamento do funcionário: <?php echo $linha['Nome']; ?> ?')"><button class="btn btn-primary">Excluir </button></a></td> 
                                </tr>
                                </tr>
                                <?php
                                // finaliza o loop que vai mostrar os dados
                            } while ($linha = @mysqli_fetch_assoc($query)); //fimdo if
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <?php
// tira o resultado da busca da memória
            @mysqli_free_result($dados);
            echo"<p>Total : $total<p>";
            ?>

        </div>
    </div>
</section>
</div>


<?php include "../visao/contato.php"; ?>
<?php include "../visao/suporte.php"; ?>

<!--JS SCRIPTS -->

<!-- jQuery 2.2.0 -->
<script src="../visao/plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!-- Bootstrap 3.3.5 -->
<script src="../visao/bootstrap/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="../visao/dist/js/app.min.js"></script>


</body>
</html>