<?php    
    require_once "../Model/Empresas.php";
    require_once "../Model/Candidatos.php";
    
    session_start();    
    carregarSessao($tipo);
?>

<html>
    <head>
        <meta charset="utf-8">
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    </head>
    
    <body>
       <?php
            include "TopoUI.php";
       ?>
        
        <div class="container" style="margin-top:30px;">
            <div class="row" style="height:180px;">
                <div class="col-lg-2 border" style="padding:10px;">
                    <img src="../../img/user.jpg" class="img-fluid rounded-circle">
                </div>
                
                <div class="col-lg-10 border">
                    DADOS PESSOAIS
                </div>                
            </div>
            
            <div class="row" style="min-height:250px;">
                <div class="col-lg-12 border">
                    BIO
                </div>
            </div>
            
            <div class="row">
                <div class="col-lg-12 border" style="height:200px;">
                    FORMAÇÃO
                </div>
            </div>
            
            <div class="row">
                <div class="col-lg-12 border" style="height:200px;">
                    CONHECIMENTOS
                </div>
            </div>
            
            <div class="row" style="height:200px;">
                <div class="col-lg-12 border">
                    EMPRESAS
                </div>
            </div>
        </div>        
        
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    </body>
    
</html>

<?php
    function carregarSessao($tipo){
        if($tipo == 1){
            $objDados = new Empresas();
        }else if($tipo == 2){
            $objDados = new Candidatos();
        }            
        
        //construir objDados        
    }
?>