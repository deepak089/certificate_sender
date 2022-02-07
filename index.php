<?php 
session_start();
if(!$_SESSION['logged_in']==true)
{
header('Location:userEmail.php');
}
else
{
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
   
    <div class="row p-4 pb-0 pe-lg-0 pt-lg-5 align-items-center rounded-3 border shadow">
        <div class="col-lg-6 p-3 p-lg-5 pt-lg-3 shadow mx-2 my-2 px-2 py-2">
            <form class="p-4 p-md-5 border rounded-3 bg-light" method="post" enctype="multipart/form-data"
                action="form_certificate.php">
                <h1 class="display-4 fw-bold lh-1 mb-5"><b> Certificate Information</b></h1>
                <div class="form-floating mb-3">
                    <input required  type="text" class="form-control" name="name" id="name" placeholder="Enter Your Name">
                    <label for="floatingInput">Name</label>
                </div>
                <div class="form-floating mb-3">
                    <input required  type="email" class="form-control" id="email" name="email" value="<?php echo $_SESSION['useremail']?>" placeholder="Enter Your Email">
                    <label for="floatingEmail">Email</label>
                </div>

                <div class="row g-5">
                    <div class="from-group d-block mr-auto mb-4 ml-4">
                        <label for="colorWell"><b>Color:</b></label>
                        <input required  type="color" class="form-control" name="color_input" style="width:200px"
                            name="color_input" value="#ff0000" id="colorWell" onclick="show_name()">
                    </div>

                    <div class="col-md-6">
                        <h5 class="text-center">your Name</h5>
                        <b>
                            <p name="color" class="text-center shadow py-2 px-5 my-2" id="name_para"
                                aria-placeholder="Your Name" style="font-weight:30px"></p>

                        </b>
                    </div>

                </div>
                <div class="row g-5">
                    <div class="from-group mr-auto ml-3">
                        <h3><b>For Name:</b></h3>

                        <label for=""><b>X-axis:</b></label>
                        <input required  type="text" class="form-control" value="365" name="name_x-axis" id="name_x-axis">

                        <label for=""><b>Y-axis:</b></label>
                        <input required  type="text" name="name_y-axis" value="420" class="form-control" id="name_y-axis">
                    </div>

                    <div class="from-group mr-5">
                        <h3><b>For Date:</b></h3>
                        <label for=""><b>X-axis:</b></label>
                        <input required  type="text" class="form-control"  value="450" name="date_x-axis" id="date_x-axis">
                        <label for=""><b>Y-axis:</b></label>
                        <input required  type="text" name="date_y-axis" value="595" class="form-control" id="date_y-axis">

                    </div>
                </div>
                <div class="text-center">

                    <button class="w-90  btn btn-lg btn-primary my-5 " name="submit">Send</button>
                    <button class="w-90  btn btn-lg btn-primary my-5 " name="preview">Preview</button>
                    

                </div>  
            </form>
        </div>

        <div class="col-lg-4 offset-lg-1 p-0 overflow-hidden shadow-lg px-2 py-2">
            <input required  type="file" name="image" id="image" placeholder="template preview">
            <div id="preview"><Span>Template preview</Span></div>
        </div>
    
    </div>
 
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
  
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>

    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script>

    <script>

        // start for setting color
        var colorWell;
        var defaultColor = "#0000ff";
        window.addEventListener("load", startup, false);

        function startup() {
            colorWell = document.querySelector("#colorWell");
            colorWell.value = defaultColor;
            colorWell.addEventListener("input", updateFirst, false);
            colorWell.addEventListener("change", updateAll, false);
            colorWell.select();
        }

        function updateFirst(event) {
            var p = document.querySelector("#name_para");

            if (p) {
                p.style.color = event.target.value;
            }
        }

        function updateAll(event) {
            document.querySelectorAll("p").forEach(function (p) {
                p.style.color = event.target.value;
            });
        }

        // start for adding name 
        function show_name() {

            var name = document.getElementById("name").value;
            var name_para = document.getElementById("name_para");

            name_para.innerHTML = name;
        }

        function imagePreview(fileInput) {
            if (fileInput.files && fileInput.files[0]) {
                var fileReader = new FileReader();
                fileReader.onload = function (event) {
                    $('#preview').html('<img src="' + event.target.result + '" width="600px" height="auto"/>');
                };
                fileReader.readAsDataURL(fileInput.files[0]);
            }
        }
        $("#image").change(function () {
            imagePreview(this);
        });
       
    </script>
</body>

</html>
<?php 
}
?>