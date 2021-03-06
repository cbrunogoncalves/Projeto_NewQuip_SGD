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
require_once("../modelo/conexao.php");
?>
<html>
    <head>    
        <script language="javascript">
//chama a função (nomeform) -->
            function valida_dados(nomeform)
            {
                if (nomeform.funcionario.value == "") {
                    alert('por favor escolha um funcionário');
                    return false;
                }

                if (nomeform.dataInicio.value == "") {
                    alert('por favor digite a data de início das férias');
                    return false;
                }

                if (nomeform.dataFinal.value == "") {
                    alert('por favor digite a data de volta das férias');
                    return false;
                }
                alert("dados cadastrados com sucesso!!");
                return true;
            }
        </script>
        <script language="javascript1.2">
            function soLetras(e) {
                if (document.all) {
                    var evt = event.keyCode;
                } else {
                    var evt = e.charCode;
                }
                var chr = String.fromCharCode(evt);
                //  var re = /[A-Za-z]/; // permite apenas de A-Z e de a-z
                var re = /[A-Za-z\s-ÃÕÑÁÉÍÓÚÀÜÇãõñáéíóúàçü]/; // permite de A-Z, a-z, espaços,
                // hífens e caracteres acentuados. Mais caracteres podem ser adicionados a Lista
                return (re.test(chr) || evt < 20); // com evt<20 permitimos <ENTER>,<TAB>,<BACKSPACE>
            }
        </script>
        <script language="javascript1.2">
            function soNumero(e) {
                if (document.all) {
                    var evt = event.keyCode;
                } else {
                    var evt = e.charCode;
                }
                var chr = String.fromCharCode(evt);
                //  var re = /[0-9/; // permite apenas numeros de 0-9;
                var re = /[0-9]/; // permite numeros  de 0-9,
                // hífens e caracteres acentuados. Mais caracteres podem ser adicionados a Lista
                return (re.test(chr) || evt < 20);
            }
        </script>
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
                                <li><a href="../visao/agedarFerias.php">Agendar Férias</a></li>
                                <li><a href="../visao/agedarFerias.php">Listar Férias</a></li>

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
                    <h1>Agendar Férias</h1>
                </section>
                <section class="invoice">
                    <div class="row">
                        <div class="col-md-12">
                            <div>
                                <h3 class="box-title">Dados do Agendamento</h3>
                            </div>
                            <div class="panel box box-primary">
                                <div class="box-header with-border">
                                    <h4 class="box-title"></h4>
                                </div>
                                <form action="../modelo/insereAgendaFerias.php" method="post" name="f1" onSubmit="return valida_dados(this)">
                                    <?php
                                    // cria a instrução SQL que vai selecionar os dados
                                    $query = @sprintf("SELECT * FROM funcionario");
                                    // executa a query
                                    $dados = @mysqli_query($conexao, $query) or die(mysql_error());
                                    // transforma os dados em um array
                                    $linha = @mysqli_fetch_assoc($dados);
                                    // calcula quantos dados retornaram
                                    $total = @mysqli_num_rows($dados);
                                    ?>
                                    <div class="form-group has-feedback">
                                        <b>Nome do funcionário<font color="#FF0000" >*</font></b> 
                                        <select  name="funcionario" class="form-control select2" style="width: 30%;"   maxlength="11"   onKeypress='return soLetras(event)' />
                                        <option></option>      
                                        <?php
                                        // se o número de resultados for maior que zero, mostra os dados
                                        if ($total > 0) {
                                            // inicia o loop que vai mostrar todos os dados
                                            do {
                                                ?><option ><?php echo$linha['Nome'] ?></option>
                                                <?php
                                                // finaliza o loop que vai mostrar os dados
                                            } while ($linha = @mysqli_fetch_assoc($dados)); //fimdo if
                                        }
                                        ?> 
                                        </select>
                                    </div>
                                    <div class="form-group has-feedback">
                                        <b>Data inicio de férias<font color="#FF0000" >*</font></b> 
                                        <input type="date" name="dataInicio" class="form-control" placeholder="ex: 26"  maxlength="11" />      
                                    </div> 
                                    <div class="form-group has-feedback">
                                        <b>Data volta  das férias<font color="#FF0000" >*</font></b> 
                                        <input type="date" name="dataFinal" class="form-control" placeholder="ex: 26"  maxlength="11" />      
                                    </div>     
                                    <div class="form-group has-feedback">
                                        <input type="submit" class="btn btn-primary" value="Salvar" />
                                    </div>
                                </form>
                            </div>
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