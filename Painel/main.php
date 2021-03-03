<?php
if(isset($_GET['loggout'])){
    Painel::loggout();
}

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/6e1a7a7c25.js" crossorigin="anonymous"></script>
    <link href="<?php echo INCLUDE_PATH_PAINEL; ?>css/style.css" rel="stylesheet"/>
    <title>Document</title>
</head>
<body>
    
    <div class="menu">
        <div class="box-usuario">
            <?php
                if($_SESSION['img'] ==''){
            ?>
            <div class="avatar-usuario">
                <img src="<?php echo INCLUDE_PATH_PAINEL ?>img/avatar.png" >
            </div><!--avatar-->
            <?php }else{ ?>
                <div class="imagem-usuario">
                    <img src="<?php echo INCLUDE_PATH_PAINEL ?>uploads/<?php echo $_SESSION['img'];?>"/>
                </div><!--imagem-->
            <?php } ?>

            <div class="nome-user">
                <p><?php echo $_SESSION['nome'];?> <br> <?php echo pegarCargo($_SESSION['cargo']);  ?></p>
            </div> <!--nome-user-->

        </div><!--box-usuario-->
        <div class="items-menu">

            <h2>Cadastro</h2>
            <a href="">Cadastrar Especialidades</a>
            <a href="">Cadastrar Serviços</a>
            <h2>Gestão</h2>
            <a href="">Listar Especialidades</a>
            <a href="">Listar Serviços</a>
            <h2>Administração do Paienl</h2>
            <a href="">Editar Usuário</a>
            <a href="">Adicionar Usuário</a>
            <h2>Configuração Geral</h2>
            <a href="">Editar</a>
            

        </div><!--Item-menu-->
    </div> <!---menu-->
        <header>
            <div class="center">
                <div class="menu-btn">
                    <i class="fas fa-align-justify"></i>
                   
                </div>
                <div class="loggout">
                <a href="<?php echo INCLUDE_PATH_PAINEL; ?>"><i class="fas fa-home"></i><span>Página Inicial</span></a>
                    <a href="<?php echo INCLUDE_PATH_PAINEL; ?>?loggout"><i class="fas fa-sign-out-alt"></i><span>Sair </span></a>

                </div><!--loggout-->
                <div class="clear"></div>
            </div> <!--center-->
        </header>
    <div class="wrapper">
       
        <div class="content">

           <?php Painel::carregarPagina() ?>

        </div>
    </div>
<script src="<?php echo INCLUDE_PATH; ?>_js/jquery.js"></script>
<script src="<?php echo INCLUDE_PATH_PAINEL; ?>js/main.js"></script>
</body>
</html>