<?php
$page = "https://example.com";//your directory and folder
if(isset($_FILES['file']) && $_FILES['file']['error'][0] == 0) {
    $upload_dir = 'uploads';
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }
    $link = '';
    $count = count($_FILES['file']['name']);
    for ($i = 0; $i < $count; $i++) {
        $filename = $_FILES['file']['name'][$i];
        $filetype = $_FILES['file']['type'][$i];
        $filesize = $_FILES['file']['size'][$i];
        $filetmp = $_FILES['file']['tmp_name'][$i];
        $fileext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
        $allowed = array('jpg', 'jpeg', 'png', 'gif', 'pdf');
        if(in_array($fileext, $allowed)) {
            $newfilename = uniqid('', true) . '.' . $fileext;
            move_uploaded_file($filetmp, $upload_dir . '/' . $newfilename);
            $link .= '<div class="link">';
            $link .= '<p>File ' . ($i+1) . ' uploaded successfully. Here is the link to the file:</p>';
            $link .= '<a href="' . $page . '/' . $upload_dir . '/' . $newfilename . '">' . $page . '/' . $upload_dir . '/' . $newfilename . '</a>';
            $link .= '</div>';
        } else {
            $link .= '<p>File ' . ($i+1) . ' type not allowed. Please upload a JPG, JPEG, PNG, GIF, or PDF.</p>';
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Multi file upload and Storage"/>
    <title>Multiple File Upload App 'jpg', 'jpeg', 'png', 'gif', 'pdf'</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
	<h1>Multiple File Upload App 'jpg', 'jpeg', 'png', 'gif', 'pdf'</h1>
        <form method="post" enctype="multipart/form-data">
            <input type="file" name="file[]" multiple required>
            <input type="submit" value="Upload Files">
        </form>
        <?php if(isset($link)) { echo $link; } ?>
    </div>
</body>
</html>
