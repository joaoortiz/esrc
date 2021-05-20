<html>
    <head>
        <meta charset="utf-8">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <link href="css/estilo.css" rel="stylesheet">


        <style>
            * {
                box-sizing: border-box;
            }

            html, body {
                width: 100%;
                height: 100%;
            }

            body {
                padding: 1rem 0;
                background: #f9f9fb;
            }

            .card {
                width: 300px;
                display: inline-block;
                margin: 1rem;
                border-radius: 4px;
                box-shadow: 0 -1px 1px 0 rgba(0,0,0,.05), 0 1px 2px 0 rgba(0,0,0,.2);
                transition: all .2s ease;
                background: #fff;
                position: relative;
                overflow: hidden;

                &:hover, &.hover {
                    transform: translateY(-4px);
                    box-shadow: 0 4px 25px 0 rgba(0,0,0,.3), 0 0 1px 0 rgba(0,0,0,.25);

                    & .card-content {
                        box-shadow: inset 0 3px 0 0 #ccb65e;
                        border-color: #ccb65e;
                    }

                    & .card-img .overlay {
                        background-color: rgba(25,29,38,.85);
                        transition: opacity .2s ease;
                        opacity: 1;
                    }
                }

                &-img {
                    position: relative;
                    height: 224px;
                    width: 100%;
                    background-color: #fff;
                    transition: opacity .2s ease;
                    background-position: center center;
                    background-repeat: no-repeat;
                    background-size: cover;

                    & .overlay {
                        position: absolute;
                        left: 0;
                        top: 0;
                        width: 100%;
                        height: 100%;
                        background-color: #fff;
                        opacity: 0;

                        & .overlay-content {
                            line-height: 224px;
                            width: 100%;
                            text-align: center;
                            color: #fff;

                            & a {
                                color: #fff;
                                padding: 0 2rem;
                                display: inline-block;
                                border: 1px solid rgba(255,255,255,.4);
                                height: 40px;
                                line-height: 40px;
                                border-radius: 20px;
                                cursor: pointer;
                                text-decoration: none;

                                &:hover, &.hover {
                                    background: #ccb65e;
                                    border-color: #ccb65e;
                                }
                            }
                        }
                    }
                }

                &-content {
                    width: 100%;
                    min-height: 104px;
                    background-color: #fff;
                    border-top: 1px solid #E9E9EB;
                    border-bottom-right-radius: 4px;
                    border-bottom-left-radius: 4px;
                    padding: 1rem 2rem;
                    transition: all .2s ease;

                    & a {
                        text-decoration: none;
                        color: #202927;
                    }

                    & h2, a h2 {
                        font-size: 1rem;
                        font-weight: 500;
                    }

                    & p, a p {
                        font-size: .8rem;
                        font-weight: 400;
                        white-space: nowrap;
                        overflow: hidden;
                        text-overflow: ellipsis;
                        color: rgba(32, 41, 28, .8);
                    }
                }
            }
        </style>





    </head>

    <body>

        <div class="card hover">
            <div class="card-img" style="background-image:url(https://images.unsplash.com/photo-1493847242172-d46053a1f671?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=9f91dd5d50f16ba80af53a62d4caf2ce&auto=format&fit=crop&w=500&q=60);">
                <div class="overlay">
                    <div class="overlay-content">
                        <a class="hover" href="#!">View Project</a>
                    </div>
                </div>
            </div>

            <div class="card-content">
                <a href="#!">
                    <h2>Title</h2>
                    <p>Lorem ipsum dolor sit amet consectetur, lorem ipsum dolor</p>
                </a>
            </div>
        </div>

        <div class="card">
            <div class="card-img" style="background-image:url(https://images.unsplash.com/photo-1491374812364-00028bbe7d2f?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=a22e4862c36c552e726815949fbcb41a&auto=format&fit=crop&w=500&q=60);">
                <div class="overlay">
                    <div class="overlay-content">
                        <a href="#!">View Project</a>
                    </div>
                </div>
            </div>

            <div class="card-content">
                <a href="#!">
                    <h2>Title</h2>
                    <p>Lorem ipsum dolor sit amet consectetur, lorem ipsum dolor</p>
                </a>
            </div>
        </div>

        <div class="card">
            <div class="card-img" style="background-image:url(https://images.unsplash.com/photo-1519176336903-04be58a477d2?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=eda05ddcb3154f39fd8ce88fdd44f531&auto=format&fit=crop&w=500&q=60);">
                <div class="overlay">
                    <div class="overlay-content">
                        <a href="#!">View Project</a>
                    </div>
                </div>
            </div>

            <div class="card-content">
                <a href="#!">
                    <h2>Title</h2>
                    <p>Lorem ipsum dolor sit amet consectetur, lorem ipsum dolor</p>
                </a>
            </div>
        </div>

        <script>
            $(document).ready(function() {

                $('.card').delay(1800).queue(function(next) {
                    $(this).removeClass('hover');
                    $('a.hover').removeClass('hover');
                    next();
                });
            });
        </script>


    </body>
</html>