
<?php
    include_once 'funciones/sesiones.php';
    include_once 'funciones/funciones.php';
    include_once 'templates/header.php';
    include_once 'templates/barra.php';
    include_once 'templates/navegacion.php';
?>
<div class="content-wrapper">
    <a href="../index.php"><img class="regia" src="../img/Logo-Regia-negro.png" alt=""></a>
    <br>
    <hr class="hr-regia-area">
    <h2 class="texto-regia-area">Area Administrativa</h2>
    <hr class="hr-regia-area">
</div>
<style>
.content-wrapper img.regia {
    display: block;
    width: 400px;
    margin: auto;
    padding-top: 300px;
}
.content-wrapper h2.texto-regia-area {
    display: block;
    width: 80%;
    margin: auto;
    text-align: center;
    font-size: 100px;
    text-transform: uppercase;
}
.content-wrapper hr.hr-regia-area {
    display: block;
    width: 80%;
    margin: auto;
    height: 20px;
    border: 2px solid var(--blue);
    background-color: var(--blue);
}

@media only screen and (max-width:1150px) {
    .content-wrapper img.regia {
        width: 200px;
        padding-top: 150px;
    }
    .content-wrapper h2.texto-regia-area {
        width: 80%;
        font-size: 30px;
    }
    .content-wrapper hr.hr-regia-area {
        height: 10px;
    }

}

</style>
<?php include_once 'templates/footer.php';?>