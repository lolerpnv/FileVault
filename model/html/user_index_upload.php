
<?php
/**
 * Created by PhpStorm.
 * User: Toni
 * Date: 20.7.2016.
 * Time: 16:00
 */
?>
<form align="center" class="form-inline" role="form" action="model/html/upload.php" method="post" enctype="multipart/form-data" >
    Select image to upload: <br/>
    <label class="btn btn-default btn-file"> Select ...
        <input type="file" name="fileToUpload" id="fileToUpload" style="display: none">
    </label> <br/>
    <div class="checkbox">
        <label><input type="checkbox" name="private" id="private">Private</label>
    </div>
    <button type="submit" class="btn btn-default" value="Upload" name="submit">Upload</button>
</form>
</body>
</html>