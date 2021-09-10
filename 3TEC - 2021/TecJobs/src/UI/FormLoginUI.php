<html>
    <head>
        <meta charset="UTF-8">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
        <link rel="stylesheet" href="../../assets/css/estilo.css">


        <title>::TecJobs - Professional Networking ::</title>
    </head>
    <body class="BodyLogin">
        <?php
        include "TopoUI.php";
        ?>

        <div class="container-fluid"> 
            <div class="row">
                <div class="col-md-7 DivIntro">

                </div>

                <div class="col-md-4 FormLogin ">
                    <form action="../Control/UsuariosControl.php" method="post">
                        <p align="justify">Welcome to TecJobs<br>
                        Your job network in the web.    
                        </p>
                        <div class="form-group">

                            <div class="input-group CaixaTexto">
                                <div class="input-group-prepend" style="height:55px;">
                                    <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                                </div>
                                <input type="text" name="HTML_email" style="height:55px;font-size: 24px;" placeholder="Informe o login de usuário." class="form-control">
                            </div>

                        </div>



                        <div class="form-group">

                            <div class="input-group CaixaTexto">
                                <div class="input-group-prepend" style="height:55px;">
                                    <span class="input-group-text"><i class="fa fa-key"></i></span>
                                </div>
                                <input type="password" name="HTML_senha" style="font-size: 24px;height:55px;" placeholder="Informe a senha." class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="exec" value="1">
                            <button type="submit" class="BotaoLogin btn">
                                
                                Entrar
                            </button>
                            <hr>
                            <a href="FormCadastroUsuarioUI.php?step=1" class="BotaoLogin btn" style="padding-top: 12px;">
                                Ainda não sou cadastrado!
                            </a>
                            <input type = "hidden" name="acao" value="1">
                        </div>

                        

                    </form>
                </div>
            </div>    
        </div>
    </body>
</html>