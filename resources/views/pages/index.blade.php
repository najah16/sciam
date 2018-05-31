<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <title>GESTACCEUIL|Home</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="css/caroussel.css">
        <!-- style -->
        <style>

          a, a:hover, a:visited, a:active
          {
            color:white;
            text-decoration:none;
          }

        </style>
        <!-- -->
    </head>
    <body>
        <div class="carousel fade-carousel slide" data-ride="carousel" data-interval="4000" id="bs-carousel">
              <!-- Overlay -->
              <div class="overlay"></div>
              <!-- Wrapper for slides -->
              <div class="carousel-inner">
                <div class="item slides active">
                  <div class="slide-1"></div>
                  <div class="hero">
                    <hgroup>
                        <h1>GESTACCEUIL</h1>        
                        <h3>Gerez vos visiteurs de façon professionnelle</h3>
                    </hgroup>
                    <button class="btn btn-hero btn-lg" role="button"><a href="{{'login'}}">Connexion</a></button>
                  </div>
                </div>
              </div> 
        </div>
    </body>
</html>
