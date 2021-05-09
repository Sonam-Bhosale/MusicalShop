<?php 
if(isset($_POST['signaturesubmit'])){ 
    $signature = $_POST['signature'];
    $signatureFileName = uniqid().'.png';
    $signature = str_replace('data:image/png;base64,', '', $signature);
    $signature = str_replace(' ', '+', $signature);
    $data = base64_decode($signature);
    $file = 'signatures/'.$signatureFileName;
    file_put_contents($file, $data);
    $msg = "<div class='alert alert-success'>Signature Uploaded</div>";
	echo "<script>alert('submited')</script>";
	 
		//echo  isset($signatureFileName)?$signatureFileName:'';
			
} 
?>