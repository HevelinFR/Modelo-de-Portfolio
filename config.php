<?php
    session_start();
    date_default_timezone_set('America/Bahia');
    $autoload = function($class){
        include('classes/'.$class.'.php');
    };

    spl_autoload_register($autoload);
    

    define('INCLUDE_PATH','http://localhost/mudulo_basico/Projeto01/');
    define('INCLUDE_PATH_PAINEL',INCLUDE_PATH.'Painel/');
    define('BASE_DIR_PAINEL',__DIR__.'/Painel');

    //conetar com o banco de dados
    define('HOST', 'localhost');
    define('USER', 'root');
    define('PASSWORD', '');
    define('DATABASE', 'painel01');

    //Constantes para o painel de controle
    define('NOME_EMPRESA', 'BR Code');

    

    //função pegar cargo
    function pegarCargo($indice){
       return Painel::$cargos[$indice];
    }

    function selecionadoMenu($par){
        $url = explode('/', @$_GET['url'])[0];
        if($url == $par){
            echo 'class="menu-active"';
        }
    }

    function verificaPermissaoMenu($permissao){
        if($_SESSION['cargo'] >= $permissao){
            return;
        }else{
            echo 'style="display:none;"';
        }
    }
    function verificaPermissaoPagina($permissao){
        if($_SESSION['cargo'] >= $permissao){
            return;
        }else{
            include('Painel/pages/permissao_negada.php');
            die();
        }
    }


?>