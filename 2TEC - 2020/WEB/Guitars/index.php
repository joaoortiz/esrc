<html>
    <head>
        <!--referencia do CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Itim|Sriracha&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="css/estilo.css" type="text/css">



        <!--Configurações da pagina-->
        <meta charset="utf-8">
        <title>:: GUITARS :: Play your weapon!</title>

    </head>

    <body> 

        <!--Conteudo da página -->

        <?php
        include "BarraMenu.php";
        include "BannerRot.php";
        ?>

        <div class="container-fluid">

            <div class="row">

                <div class="col-lg-3">
                    <div class="card ModeloCard">
                        <img src="img/img1.jpg" class="card-img-top">

                        <div class="card-body CorpoCard">
                            <h5 class="card-title">Aulas de Música</h5>
                            <p class="card-text"> Faça aulas de iniciação musical, com violão ou guitarra</p>


                            <a href="" class="btn float-right Botoes" data-toggle="modal" data-target="#FormAulas">Solicitar</a>


                        </div>                        
                    </div>
                </div>


                <div class="col-lg-3">
                    <div class="card ModeloCard">
                        <img src="img/img2.jpg" class="card-img-top">
                        <div class="card-body CorpoCard">
                            <h5 class="card-title">Tablaturas</h5>
                            <p class="card-text">Escolha seu artista e saia tocando como profissional.</p>
                            <a href="Tablaturas.php" class="btn float-right Botoes">Veja a lista</a>
                        </div>

                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="card ModeloCard">
                        <img src="img/img3.jpg" class="card-img-top">

                        <div class="card-body CorpoCard">                            
                            <h5 class="card-title">Coleção</h5>
                            <p class="card-text">Veja minha coleção de guitarras e conheça a história de cada uma.</p>
                            <a href="" class="btn float-right Botoes">Visualizar</a>
                        </div>
                    </div>

                </div> 
                <div class="col-lg-3">
                    <div class="card ModeloCard">
                        <img src="img/img4.jpg" class="card-img-top">

                        <div class="card-body CorpoCard">
                            <h5 class="card-title">Modelos</h5>
                            <p class="card-text">Conheça os modelos de guitarra e qual deles se enquadra no seu estilo.</p>
                            <a href="" class="btn float-right Botoes">Acessar</a>
                        </div>

                    </div>

                </div>
            </div>

            <div class="row" id="sobre">

                <div class="col-lg-12">
                    <hr>

                    <h5>João Ortiz</h5>

                    <p align="justify">
                        Formado em Ciências da Computação. especialista em Desenvolvimento de Sistemas e Docência no Ensino Superior, 
                        Professor Universitário, coordenador de Curso Técnico em Informática, 34 anos, nascido em São Paulo, torcedor fanático do 
                        São Paulo Futebol Clube, iniciou seus estudos na música aos 13 anos, após ver sempre seu pai tocando violão. Embora sua 
                        família fosse fã da música sertaneja, sempre apreciou os clássicos do rock, e teve músicos como Mark Knopfler, Eric Clapton
                        como suas principais influências no início de sua experiência musical.
                    </p>
                    <p align="justify">
                        Seu estilo musical engloba tudo que está incluído e é derivado do blues, desde o country americano tradicional até o Hard
                        Rock e determinadas bandas de Heavy Metal, passando por toda a base clássica do Rock'n Roll. Suas influências da música 
                        Country começaram desde quando ouvia bandas clássicas como Alabama, Alan Jackson, e aumentou ainda mais em suas viagens aos EUA, 
                        onde conheceu artistas e guitarristas como Brad Paisley, decidindo de vez aprimorar suas técnicas em country e aumentando
                        totalmente sua paixão pelas famosas Telecasters.
                    </p>
                    <hr>
                </div>

            </div> 
            <div class="row">
                <div class="col-lg-12">
                    <h5>Gênios da Guitarra</h5>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-2">
                    <div class="card">

                        <a href="" data-toggle="modal" data-target="#Bio1">
                            <img src="img/adrian.jpg" class="card-img-top ImagemPB">
                        </a>

                        <div class="card-body">
                            <font class="card-text">Adrian Smith (Iron Maiden)</font>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="card">
                        <a href="" data-toggle="modal" data-target="#Bio2">
                            <img src="img/slash.jpg" class="card-img-top ImagemPB">
                        </a>
                        <div class="card-body">
                            <font class="card-text">Saul Hudson (Slash)</font>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="card">
                        <a href="" data-toggle="modal" data-target="#Bio3">
                        <img src="img/angus.jpg" class="card-img-top ImagemPB">
                        </a>
                        <div class="card-body">
                            <font class="card-text">Angus Young (AC/DC)</font>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="card">
                        <a href="" data-toggle="modal" data-target="#Bio4">
                        <img src="img/brad.jpg" class="card-img-top ImagemPB">
                        </a>
                        <div class="card-body">
                            <font class="card-text">Brad Paisley</font>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="card">
                        <a href="" data-toggle="modal" data-target="#Bio5">
                        <img src="img/eric.jpg" class="card-img-top ImagemPB">
                        </a>
                        <div class="card-body">
                            <font class="card-text">Eric Clapton</font>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="card">
                        <a href="" data-toggle="modal" data-target="#Bio6">
                        <img src="img/mark.jpg" class="card-img-top ImagemPB">
                        </a>
                        <div class="card-body">
                            <font class="card-text">Mark Knopfler (Dire Straits)</font>
                        </div>
                    </div>
                </div>
            </div>

        </div> <!-- fechando container -->
        <hr>
        <?php
        include "Rodape.php";
        ?>


        <div class="modal fade" id="FormAulas" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content ">
                    <div class="modal-body">

                        <form class="form" action="EnviarEmail.php" method="POST">
                            <center>

                                <img src="img/bannerAulas.jpg" class="img-fluid">
                                <hr>
                                <h5>Preencha os campos abaixo para solicitar o orçamento</h5>
                            </center>

                            <div class="row LinhaForm">
                                <div class="col">
                                    <label>Nome:</label>
                                    <input type="text" class="form-control" name="HTML_NOME">                                    
                                </div>                                    
                            </div>

                            <div class="row LinhaForm">
                                <div class="col">
                                    <label>E-mail:</label>
                                    <input type="email" class="form-control" name="HTML_EMAIL">                                    
                                </div>                                    
                            </div>

                            <div class="row LinhaForm">
                                <div class="col">
                                    <label>Estilo: </label>

                                    <select class="form-control" name="HTML_ESTILO">
                                        <option value="Blues">Blues</option>
                                        <option value="Jazz">Jazz</option>
                                        <option value="PopRock">Pop Rock</option>
                                        <option value="ClassicRock">Classic Rock</option>
                                        <option value="HardRock">Hard Rock</option>
                                        <option value="Country">Country</option>
                                        <option value="Sertanejo">Sertanejo</option>
                                        <option value="MPB">MPB</option>
                                    </select>

                                </div>
                                <div class="col">
                                    <label>Instrumento: </label>

                                    <select class="form-control" name="HTML_INSTRUM">
                                        <option value="Violao">Violão</option>
                                        <option value="Guitarra">Guitarra</option>

                                    </select>

                                </div>
                            </div>

                            <div class="row LinhaForm">
                                <div class="col">

                                    <label>Nível:</label>
                                    <br>
                                    <div class="form-check form-check-inline">
                                        <input type="radio" class="form-check-input" name="HTML_nivel">
                                        <label class="form-check-label">Iniciante</label>
                                    </div>  
                                    <div class="form-check form-check-inline">
                                        <input type="radio" class="form-check-input" name="HTML_nivel">
                                        <label class="form-check-label">Amador</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input type="radio" class="form-check-input" name="HTML_nivel">
                                        <label class="form-check-label">Intermediário</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input type="radio" class="form-check-input" name="HTML_nivel">
                                        <label class="form-check-label">Avançado</label>
                                    </div>

                                </div>
                            </div>

                            <div class="row LinhaForm">
                                <div class="col">
                                    <label>Mensagem:</label>
                                    <textarea class="form-control"></textarea>
                                </div>
                            </div>

                            <div class="row LinhaForm">
                                <div class="col">
                                    <button type="submit" class="btn btn-dark float-right">
                                        <i class="fa fa-lg fa-envelope"></i>
                                        Enviar E-mail
                                    </button>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>

        <?php
        include "BioGuitarristas.php";
        ?>


        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

    </body>

</html>