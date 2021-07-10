<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@200&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <style>
            body { font-family: 'Kanit', sans-serif; }

    </style>

    <title>php_project</title>
  </head>
  <body>
  <?php 
    session_start();
    if(!isset($_SESSION["login_email"]) || !isset($_SESSION['login_name'])){
      header("Location: login.php");
      exit(); 
    }


    require("connection/connectdb.php");
    require("components/Navbar.php");
    ?>
  <div class="container">
        
        <?php  
        if(isset($_GET['pt'])){
            $page = $_GET['pt'];
            if($page == "insert_data" ){
                require("components/insert_data.php");
            }
            else if($page == "list_data" ){
                require("components/list_data.php");
            }
            else{
                require("components/list_data.php");
            }
        }
        
        ?>

  </div>


 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>