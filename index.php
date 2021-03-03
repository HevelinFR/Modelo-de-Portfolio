<?php 
    include('config.php');
?>
<?php 
    Site::updateUsuarioOnline();
?>
<?php Site::contador();?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo INCLUDE_PATH; ?>css/style.css" rel="stylesheet">
    <title>Projeto01</title>
</head>
<body>



    <?php
        $url = isset($_GET['url']) ? $_GET['url'] : 'home';
        switch($url){
            case 'especialidades':
                echo '<target target="especialidades"/>';
                break;
            case 'servicos':
                echo '<target target="servicos" />';
                break;

        }
    ?>


        
    <header>
        <div class="center">
            <div class="logo left"><a href="/">Logomarca</a></div> <!--lOGO-->
            <nav class="desktop right"> <!--DESKTOP-->
                <ul>
                    <li><a href="<?php echo INCLUDE_PATH; ?>">Home</a></li>
                    <li><a href="<?php echo INCLUDE_PATH; ?>especialidades">Especialidades</a></li>
                    <li><a href="<?php echo INCLUDE_PATH; ?>servicos">Serviços</a></li>
                    <li><a realtime href="<?php echo INCLUDE_PATH; ?>contato">Contato</a></li>
                </ul>
            </nav><!--DESKTOP-->

            <nav class=" mobile right"> <!--MOBILE-->
                <div class="botao-menu-mobile">
                    <i><img src="<?php echo INCLUDE_PATH; ?>_img/icone.png"></i>
                </div>
                <ul>
                    <li><a href="<?php echo INCLUDE_PATH; ?>">Home</a></li>
                    <li><a href="<?php echo INCLUDE_PATH; ?>especialidades">Especialidades</a></li>
                    <li><a href="<?php echo INCLUDE_PATH; ?>servicos">Serviços</a></li>
                    <li><a realtime href="<?php echo INCLUDE_PATH; ?>contato">Contato</a></li>
                </ul>

            </nav><!--MOBILE-->
            <div class="clear"></div>
        </div> <!-- CENTER --->
    </header>

   
    
   <?php
    $url = isset($_GET['url']) ? $_GET['url'] : 'home';

    if(file_exists('pages/'.$url.'.php')){
        include('pages/'.$url.'.php');
    }
    else{
        //ERRO 404
        if($url != 'especialidades' && $url != 'servicos'){
        $pagina404 = true;
        include('pages/404.php');
        }
        else{
            include('pages/home.php');
        }
    }

   ?>

 

     <footer <?php if(isset($pagina404) && $pagina404 == true or $url == 'contato') echo 'class="fixed"'; ?>>
        <div class="center">
            <a href=""><img src="<?php echo INCLUDE_PATH; ?>_img/GITHUB_icon.png"></a>
            <a href="https://www.instagram.com/hevelinfrts/"><img src="<?php echo INCLUDE_PATH; ?>_img/instagram.png"></a>
            <a href=""><img src="<?php echo INCLUDE_PATH; ?>_img/sociallinkedin.png"></a>

        </div><!--cenetr-->
     </footer>
    <script src="<?php echo INCLUDE_PATH; ?>_js/jquery.js"></script>
    <script src="<?php echo INCLUDE_PATH; ?>_js/script.js"></script>
    <script src="<?php echo INCLUDE_PATH; ?>_js/slidenames.js"></script>
    
</body>
</html>