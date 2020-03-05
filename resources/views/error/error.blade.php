
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Not Found</title>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
            <!-- Scripts -->
            
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <style>
            html, body {
                background-color: #f4f2f3;
                background-image: url("/img/error.png");
                background-repeat: no-repeat;
                background-size: contain;
                background-position: center;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: absolute;

            }

            .code {
                border-right: 2px solid;
                font-size: 5vh;
                padding: 0 15px 0 15px;
                text-align: center;
            }

            .message {
                font-size: 5vh;
                text-align: center;
            }
            .titulo{
                font-size: 10vh;
                color: #404041;
            }
            .img{
                height: 8vh;
                margin-right: 10px;
            }
            
            .flex-center-titulo{
                align-items: baseline;
                display: flex;
                justify-content: center;
            }
            .margen-titulo{
                margin-top: 4vh!important;
                margin-bottom: 71vh!important;   
            }
            .margen-mensaje{
                margin-bottom: 10vh!important;
            }
            
        </style>
    </head>
    <body>
        <div class="position-ref full-height">
           <div class=" col-12 position-fixed text-center  fixed-top margen-titulo">
                <div class="col-12 flex-center-titulo">
                    <img src="/img/e-com3.png" sizes="" height="" class="img">
                    <h1 class="titulo">E-commerce</h1>
                </div>
           </div>
              
            <div class="col-12 position-fixed fixed-bottom  margen-mensaje">
                <div class="flex-center">
                    <div class="code">404 </div>

                    <div class="message" style="padding: 10px;">Not Found</div>
                </div>
            </div>

        </div>
    </body>
</html>
