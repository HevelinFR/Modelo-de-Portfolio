<?php
    class Site{
        public static function updateUsuarioOnline(){
            if(isset($_SESSION['online'])){
                $token = $_SESSION['online'];
                $horarioAtual = date('Y-m-d H-i-:s');
                $check = MySql::conectar()->prepare("SELECT `id` FROM `tb_admin_online`  WHERE token = ?");
                $check->execute(array($_SESSION['online']));

                if($check->rowCount() == 1){
                    $sql = MySql::conectar()->prepare("UPDATE `tb_admin_online` SET ultima_acao = ? WHERE token = ?");
                    $sql->execute(array($horarioAtual,$token));

                }else{
                    $ip = $_SERVER['REMOTE_ADDR'];
                    $token = $_SESSION['online'];
                    $horarioAtual = date('Y-m-d H-i-:s');
                    $sql = MySql::conectar()->prepare("INSERT INTO `tb_admin_online` VALUES (null,?,?,?)");
                    $sql->execute(array($ip,$horarioAtual,$token));
                }

            }else{
                $_SESSION['online'] = uniqid();
                $ip = $_SERVER['REMOTE_ADDR'];
                $token = $_SESSION['online'];
                $horarioAtual = date('Y-m-d H:i:s');
                $sql = MySql::conectar()->prepare("INSERT INTO `tb_admin_online` VALUES (null,?,?,?)");
                $sql->execute(array($ip,$horarioAtual,$token));
            }
        }
        public static function contador(){
             
            if(!isset($_COOKIE['visita'])){
                setcookie('visite','true',time() + (60*60*24*7));
                $sql= MySql::conectar()->prepare("INSERT INTO `tb_admin_visitas` VALUES (null,?,?) ");
                $sql ->execute(array($_SERVER['REMOTE_ADDR'], date('Y-m-d')));
            }
        }
    }


?>