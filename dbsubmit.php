<html>
<body>  


  <?php

     include_once('config.php'); 
        if(isset($_POST['sub']))
        {
			$date=date("dd-mm-yy");
			$cat=$_POST['cat'];
            $itemnm =  $_POST['itemname'];
            $qty = $_POST['stock'];
			$price = $_POST['price'];		
            $des =$_POST['description'];
            $target_file='uploads/';
            $imagetmp=basename($_FILES['userfile']['name']);
			$location1 = $target_file.$_FILES['userfile']['name']; 
           
          if($imagetmp=="")   
          {
              $image_name="No image";
          }   
          else
          {
       
               $image_name= $imagetmp;
          }
  
       
				move_uploaded_file($_FILES['userfile']['tmp_name'], $location1);
       
           
               $sql = "INSERT INTO tblproduct  VALUES ('','$cat','$date','$itemnm','$qty','$price','$des','$image_name')";
            
                if(mysqli_query($conn, $sql))
                {
                    echo "Records added successfully.";
					
                }
                else
                {
                    echo "ERROR: Could not able to execute". mysqli_error($con);
                }
				header('Location:itemadd.php');
                mysqli_close($con);
        }
    ?>

</body>
</html>