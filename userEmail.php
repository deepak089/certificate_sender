<?php
session_start();
if(isset($_POST['submit']))
{
    $email=$_POST['email'];
    $_SESSION['useremail']=$email;
    $_SESSION['logged_in']=true;
    header('Location:index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">
</head>

<body class="bg-info">

    <div class="container text-center mr-auto mt-5 ">
        <div class="col d-flex justify-content-center mt-5 pr-5 shadow " style="width:50rem;">
            <img src="2.jpg" class="card-img-top" alt="..." style="width:400px;height:400px;">
            <div class="card-body">
                <h5 class="card-title mt-5">Enter Email</h5>
                <form action="" method="post" class="form-group">
                    <input type="text" class="form-control" name="email" id="email" required><br>
                    <span>We will keep your mail safe</span><br>
                    <button  class="btn btn-success " name="submit">Continue</button>
                </form>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>

    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>

    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script>
</body>

</html>