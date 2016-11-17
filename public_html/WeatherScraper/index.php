<!DOCTYPE html>

<html>
  <head>
    <title>TODO supply a title</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
      html, body {
        height: 100%;
      }
      .container {
        background-image: url('img/background.jpg');
        width: 100%;
        height: 100%;
        background-size: cover;
        background-position: center;
        padding-top: 150px;
      }
      .center {
        text-align: center;
      }
      .white {
        color: white;
      }
      
      p {
        padding-top: 15px;
        padding-bottom: 15px;
      }
      
      button {
        margin-top: 20px;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-md-offset-3">
          <h1 class="center white">Weather Predictor</h1>
          <p class="lead center white">Your city below to get a forecast for the weather</p>
          <form class="center" action="">
            <div class="form-group">
              <input type="text" class="form-control" name="city" id="city" placeholder="Eg. London"/>
            </div>
            <button id="findMyWeather" class="btn btn-success btn-lg">Find My Weather</button>
          </form>
        </div>
      </div>
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-1.12.4.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript">
      $('#findMyWeather').click(function(event){
        event.preventDefault();
          if ($('#city').val() != ""){
            $.get('scraper.php?city=' + $('#city').val(), function(data){
            alert(data);
          })  
        } else {
          alert('Please enter a city');
        }
        
      })  
    </script>
  </body>
</html>
