<nav class="navbar navbar-expand-lg BarraTopo">
    <div class="collapse navbar-collapse">
        <div class="nav navbar-brand col-lg-3">
            <i class="fa fa-globe fa-lg text-white"></i>
            <font class="TituloLogo">Guitarras</font>
        </div>
      
       
        <div class="navbar nav col-lg-7">
          
            <?php
            
            $sqlCat = "Select * from categorias";
            $rsCat = mysqli_query($vConn, $sqlCat) or die (mysqli_error($vConn));
            
            while($tblCat = mysqli_fetch_array($rsCat)){                 
            ?>
            
            <a href="?cc=<?=$tblCat['codigo_CATEGORIA']?>" class="LinksTopo">
                <?=$tblCat['nome_CATEGORIA']?>
            </a>
            
            
            <?php
            }
            ?>
            
        </div>
        <div class="col-lg-2">
            
            <button class="btn btn-light float-right" data-toggle="modal" data-target="#FormLogin">
                <i class="fa fa-user fa-2x text-black"></i> 
            </button>
            
        </div>
    </div>   
</nav>