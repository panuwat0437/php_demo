

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>ระบบจัดเก็บข้อมูลนักเรียน</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@200&display=swap" rel="stylesheet">
    <!-- Favicons -->
<link rel="icon" href="https://getbootstrap.com/docs/5.0/assets/brand/bootstrap-logo.svg">

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<meta name="theme-color" content="#7952b3">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      html,
        body {
        height: 100%;
        font-family: 'Kanit', sans-serif;
        
        }

        body {
        display: flex;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
        }

        .form-signin {
        width: 100%;
        max-width: 330px;
        padding: 15px;
        margin: auto;
        }

        .form-signin .checkbox {
        font-weight: 400;
        }

        .form-signin .form-floating:focus-within {
        z-index: 2;
        }

        .form-signin input[type="email"] {
        margin-bottom: -1px;
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0;
        }

        .form-signin input[type="password"] {
        margin-bottom: 10px;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
        }

    </style>

    
    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
  <?php
require("connection/connectdb.php");
session_start();

if(isset($_POST['email']) && isset($_POST['pword'])){
        $email = stripslashes($_REQUEST['email']);
        $email = mysqli_real_escape_string($connectdb,$email);
        $pword = stripslashes($_REQUEST['pword']);
        $pword = mysqli_real_escape_string($connectdb,$pword);
        if($email != '' && $pword != ''){
            $sql = "SELECT
            `login_email`,
            `login_password`,
            `login_name`,
            `login_status`
        FROM
            `login`
        WHERE
            `login_email` = '$email' AND `login_password` = '".md5($pword)."'";
            $querydata = $connectdb->query($sql);
            $num = mysqli_num_rows($querydata);
            if($num>0){
            $auth = $querydata->fetch_assoc();
            $_SESSION['login_email'] = $auth['login_email'];
            $_SESSION['login_name'] = $auth['login_name'];
            header("Location: index.php?pt=list_data"); 

            }else{
                echo "<script>Swal.fire({
                    icon: 'error',
                    title: 'ผิดพลาด',
                    text: 'ไม่มีข้อมูลในระบบ'
                })</script>";
            }
        }
        else{
            echo "<script>Swal.fire({
            icon: 'error',
            title: 'ผิดพลาด',
            text: 'ชื่อผู้ใช้และรหัสผ่านไม่ถูกต้อง'
            })</script>";
        }


}


?>

        <main class="form-signin">
        <form method="post">
            <img class="mb-4" src="https://icons.veryicon.com/png/o/system/icon-library-of-signaling-system/member-13.png" alt="" width="100" height="100">
            <h1 class="h3 mb-3 fw-normal">ระบบจัดเก็บข้อมูลนักเรียน</h1>

            <div class="form-floating">
            <input type="email" class="form-control" name="email" id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">Email address</label>
            </div>
            <div class="form-floating">
            <input type="password" class="form-control" name="pword" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">Password</label>
            </div>

            <div class="checkbox mb-3">
           
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">เข้าสู่ระบบ</button>
            <p class="mt-5 mb-3 text-muted">&copy; 2017–2021</p>
        </form>
        </main>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>
