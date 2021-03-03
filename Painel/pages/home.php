<?php
    $usuariosOnline = Painel::listarUsuariosOnline();

    $pegaVisitasTotais = MySql::conectar()->prepare("SELECT * FROM `tb_admin_visitas`");
    $pegaVisitasTotais->execute();

    $pegaVisitasTotais = $pegaVisitasTotais->rowCount();

    $pegaVisitasHoje = MySql::conectar()->prepare("SELECT * FROM `tb_admin_visitas`  WHERE  dia = ?");
    $pegaVisitasHoje->execute(array(date('Y-m-d')));

    $pegaVisitasHoje = $pegaVisitasHoje->rowCount();
?>
<div class="box-content left w100">
    <h2><i class="fas fa-home"></i>Painel de Controle - <?php echo NOME_EMPRESA ?></h2>
    <div class="box-metricas">

        <div class="box-metrica-single">
            <div class="box-metrica-wraper">
                <h2>Usuários Online</h2>
                <p><?php echo count($usuariosOnline);?></p>
            </div><!--box-metricas-wraper-->
        </div><!--box-metricas-single-->

        <div class="box-metrica-single">
            <div class="box-metrica-wraper">
                <h2>Total de Visitas</h2>
                    <p><?php echo $pegaVisitasTotais;?></p>
            </div><!--box-metricas-wraper-->
        </div><!--box-metricas-single-->

        <div class="box-metrica-single">
            <div class="box-metrica-wraper">
                <h2>Visitas Hoje</h2>
                    <p><?php echo $pegaVisitasHoje;?></p>
            </div><!--box-metricas-wraper-->
        </div><!--box-metricas-single-->
        <div class="clear"></div>
    </div><!--box-metricas-->
</div><!--Box-content-->

<div class="box-content left w100">
    <h2><i class="fas fa-window-restore"></i>Usuários Online</h2>
    <div class="table-responsive">
        <div class="row">
            <div class="col">
                <span>IP</span>
            </div> <!--col-->
            <div class="col">
                <span>Última Ação</span>
            </div> <!--col-->
            <div class="clear"></div>
        </div><!--row-->
        <?php
            foreach($usuariosOnline as $kay => $value){
        ?>

        <div class="row">
            <div class="col">
                <span><?php echo $value['IP']?></span>
            </div> <!--col-->
            <div class="col">
                <span><?php echo date('d/m/Y H:i:s',strtotime($value['ultima_acao']))?></span>
            </div> <!--col-->
            <div class="clear"></div>

        </div><!--row-->
        <?php } ?>

    </div><!--table-responsive-->

</div>
