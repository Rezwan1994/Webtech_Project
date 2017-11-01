   
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
        <?php
            session_start();
            $name = $_SESSION["name"];
            require("db_rw.php");
            //updateDB($sql);

            if(isset($_REQUEST["submit"]) ){
                $target = "image/".basename($_FILES['fileToUpload']['name']);
                $image = $_FILES['fileToUpload']['name'];
                $ext = pathinfo($image, PATHINFO_EXTENSION);
                if($ext == 'png' || $ext == 'jpg' )
                {
                   $sql = "UPDATE user
                    SET image = '$image'
                    WHERE name = '$name';";
                    echo $sql;
                   updateDB($sql);
                    if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target)) {
                    $msg = "Image uploaded successfully";

                    }else{
                    $msg = "Failed to upload image";
                    } 
                }
                else
                {
                     echo "  <script>alert('You can upload only jpg or png file')</script>";
                }
               
               
       
            }

          
        ?> 
</body>
</html>
        