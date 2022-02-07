<?php

include("./partials/functions.php");

if(isset($_POST['preview']))
{
	
	header('content-type:image/jpeg');
    $name=$_POST['name'];
	$email=$_POST['email'];
	$name_x_axis=$_POST['name_x-axis'];
	$name_y_axis=$_POST['name_y-axis'];
	$date_x_axis=$_POST['date_x-axis'];
	$date_y_axis=$_POST['date_y-axis'];
	$color_name=$_POST['color_input'];


	$color_array=hex2rgb($color_name);
	
	$r = $color_array[0];
	$g = $color_array[1];
	$b = $color_array[2];
	
	$font="BRUSHSCI.TTF";
    // here you can change your template by adding it manually name it as  "certificate.jpg";
	$image=imagecreatefromjpeg("certificate.jpg");
	$color=imagecolorallocate($image,$r,$g,$b);
	// for name
	imagettftext($image,50,0,$name_x_axis,$name_y_axis,$color,$font,$name);
	$date="07-02-2022";
	// for date
	imagettftext($image,20,0,$date_x_axis,$date_y_axis,$color,"AGENCYR.TTF",$date);
	
	imagejpeg($image);
	imagedestroy($image);

}

if(isset($_POST['submit'])){

	$name=$_POST['name'];
	$email=$_POST['email'];
	$name_x_axis=$_POST['name_x-axis'];
	$name_y_axis=$_POST['name_y-axis'];
	$date_x_axis=$_POST['date_x-axis'];
	$date_y_axis=$_POST['date_y-axis'];
	$color_name=$_POST['color_input'];


	$color_array=hex2rgb($color_name);
	
	$r = $color_array[0];
	$g = $color_array[1];
	$b = $color_array[2];
	
	$font="BRUSHSCI.TTF";
	$image=imagecreatefromjpeg("certificate.jpg");
	$color=imagecolorallocate($image,$r,$g,$b);
	// for name
	imagettftext($image,50,0,$name_x_axis,$name_y_axis,$color,$font,$name);
	// you can change date manually as well
	$date="07-02-2022";
	// for date
	imagettftext($image,20,0,$date_x_axis,$date_y_axis,$color,"AGENCYR.TTF",$date);
	$file=time();
	$file_path="certificate/".$file.".jpg";
	$file_path_pdf="certificate/".$file.".pdf";
	imagejpeg($image,$file_path);
	imagedestroy($image);

	require('fpdf.php');
	$pdf=new FPDF();
	$pdf->AddPage();
	// position
	$pdf->Image($file_path,0,0,210,150);
	// output file
	$pdf->Output($file_path_pdf,"F");

	include('smtp/PHPMailerAutoload.php');
	$mail=new PHPMailer();
	$mail->isSMTP();
	$mail->Host='smtp.gmail.com';
	$mail->Port=587;
	$mail->SMTPSecure="tls";
	$mail->SMTPAuth=true;
	$mail->Username="example@gmail.com";
	$mail->Password="password";
	$mail->setFrom("example@gmail.com");
	$mail->addAddress($email);
	$mail->isHTML(true);
	$mail->Subjet="Certificate Generated";
	$mail->Body="Certificate Generated";
	$mail->addAttachment($file_path_pdf);
	$mail->SMTPOptions=array("ssl"=>array(
		"verify_peer"=>false,
		"verify_peer_name"=>false,
		"allow_self_signed"=>false,
	));
	if($mail->send()){
		header("Location:done.php");

	}else{
		echo $mail->ErrorInfo;
	}
}

?>
