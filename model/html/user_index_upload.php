<?php
/**
 * Created by PhpStorm.
 * User: Toni
 * Date: 20.7.2016.
 * Time: 16:00
 */
if(session_status()!=2)session_start();
echo "<h1>UPLOAD</h1>";?>
<form action="upload.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>
</body>
</html>