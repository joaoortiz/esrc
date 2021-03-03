<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
        <link rel="stylesheet" href="../../assets/css/estilo.css">
        <title>Acesso ao Sistema</title>
    </head>
    <body class="BodyLogin">
        <div class="container"> 
            <center>
                <div class="col-md-6 animate__animated animate__zoomIn FormLogin">
                    <form action="src/Control/UsuariosControl.php" method="post">
                        <h5 style="margin: 35px;color: white; font-size: 30px;">Insira os dados abaixo para acesso:</h5>

                        <div class="form-group">

                            <div class="input-group CaixaTexto">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                                </div>
                                <input type="text" name="HTML_email" style="font-size: 18px;" placeholder="Informe o login de usuário." class="form-control">
                            </div>

                        </div>



                        <div class="form-group">

                            <div class="input-group CaixaTexto">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-key"></i></span>
                                </div>
                                <input type="password" name="HTML_senha" style="font-size: 18px;" placeholder="Informe a senha." class="form-control">
                            </div>
                        </div>


                        <div class="row">

                            <div class="col-lg-1"></div>

                            <div class="col-lg-5 form-group">
                                <button class="btn animated-button thar thar-left">
                                    <i class="fa fa-user"></i>
                                    Cadastrar.
                                </button>
                                <input type = "hidden" name="acao" value="1">
                            </div>

                            <div class="col-lg-5 form-group">
                                <button class="btn animated-button thar thar-right">
                                    <i class="fa fa-unlock-alt"></i>
                                    Acessar.
                                </button>
                            </div>

                            <div class="col-lg-1"></div>

                        </div>

                    </form>
                </div>
            </center>
        </div>
    </body>
</html>