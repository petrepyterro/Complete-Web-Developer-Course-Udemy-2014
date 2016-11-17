<?php 
  if (isset($_POST["submit"])){
    $result = '<div class="alert alert-success">Form submited</div>';
    $error = [];
    
    if(trim($_POST['name']) == ""){
      $error['name'] = "You must enter your name";
    }
    
    if((trim($_POST['email']) == "") || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
      $error['email'] = "You must enter a valid emaill address";
    }
    
    if(trim($_POST['comment']) == ""){
      $error['comment'] = "Is mandatory to provide a comment";
    }
    
    if($error){
      $result = '<div class="alert alert-danger"><strong>There were error(s)<strong></div>';
    } else {
      if(mail("test@greenhost.org.uk", "Comment from website!", "Name: " . $_POST['name'] . " Email: " 
        . $_POST['email'] . " Comment: " . $_POST['comment'])){
        $result = '<div class="alert alert-success"><strong>Your email has been delivered successfully</strong></div>';
      } else {
        $result = '<div class="alert alert-success"><strong>There was an error sending your message. Please try again</strong></div>';
      }
    }
  }
?>
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
      .emailForm {
        border: 1px solid grey;
        border-radius: 10px;
        margin-top: 20px;
      }
      
      form {
        padding-bottom: 20px;
      }
      
      .error::-webkit-input-placeholder { /* Chrome/Opera/Safari */
        color: pink;
      }
      .error::-moz-placeholder { /* Firefox 19+ */
        color: pink;
      }
      .error:-ms-input-placeholder { /* IE 10+ */
        color: pink;
      }
      .error:-moz-placeholder { /* Firefox 18- */
        color: pink;
      }
      .error {
        border-color: red;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-md-offset-3 emailForm">
          <h1>My email form</h1>
          <?php echo !empty($result) ? $result : '' ?>
          <p class="lead">Please get in touch - I'll be back to you as soon as I can</p>
          <form action="" method="POST">
            <div class="form-group">
              <label for="name">Your Name</label>
              <?php if(!empty($error['name'])): ?>
                <input type="text" name="name" placeholder="<?php echo $error['name'] ?>" class="form-control error" />
              <?php else: ?>
                <input type="text" name="name" value="<?php echo isset($_POST['name']) ? $_POST['name'] : '' ?>" placeholder="Your Name" class="form-control" />
              <?php endif; ?>
            </div>
            <div class="form-group">
              <label for="email">Your Email</label>
              <?php if(!empty($error['email'])): ?>
                <input type="text" name="email" placeholder="<?php echo $error['email'] ?>" class="form-control error" />
              <?php else: ?>
                <input type="text" name="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : '' ?>" placeholder="Your Email" class="form-control" />
              <?php endif; ?>
            </div>
            <div class="form-group">
              <label for="comment">Your Comment</label>
              <?php if(!empty($error['comment'])): ?>
                <textarea name="comment" placeholder="<?php echo $error['comment'] ?>" class="form-control error"></textarea>
              <?php else: ?>
                <textarea name="comment" placeholder="Fill a comment" class="form-control"><?php echo isset($_POST['comment']) ? $_POST['comment'] : '' ?></textarea>
              <?php endif; ?>
            </div>
            <input type="submit" name="submit" class="btn btn-success btn-lg" value="Submit"/>
          </form>
        </div>
      </div>
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-1.12.4.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
