<?php
    session_start();
    date_default_timezone_set('America/Bahia');
    $autoload = function($class){
        include('classes/'.$class.'.php');
    };

    spl_autoload_register($autoload);
    

    define('INCLUDE_PATH','http://localhost/mudulo_basico/Projeto01/');
    define('INCLUDE_PATH_PAINEL',INCLUDE_PATH.'Painel/');

    //conetar com o banco de dados
    define('HOST', 'localhost');
    define('USER', 'root');
    define('PASSWORD', '');
    define('DATABASE', 'painel01');

    //Constantes para o painel de controle
    define('NOME_EMPRESA', 'BR Code');

    //função pegar cargo
    function pegarCargo($cargo){
        $arr = [
            '0' => 'Normal',
            '1' => 'Sub Administrador',
            '2' => 'Administrador'];
        return $arr[$cargo];
    }

    

?>