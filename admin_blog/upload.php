<?php
if ($_FILES['upload']) {
    if (($_FILES['upload'] == "none") or (empty($_FILES['upload']['name']))) {
        $message = "No file uploaded.";
    } else {
        $allowedTypes = array(IMAGETYPE_PNG, IMAGETYPE_JPEG, IMAGETYPE_GIF);
        $detectedType = exif_imagetype($_FILES['upload']['tmp_name']);
        if (!in_array($detectedType, $allowedTypes)) {
            $message = "Invalid file type.";
        } else {
            $uploadDir = '../assets/images/admin/blog/uploads/';
            $fileName = basename($_FILES['upload']['name']);
            $targetFile = $uploadDir . $fileName;

            if (move_uploaded_file($_FILES['upload']['tmp_name'], $targetFile)) {
                $message = "File uploaded successfully.";
                $funcNum = $_GET['CKEditorFuncNum'];
                $url = $targetFile;
                $response = "<script>window.parent.CKEDITOR.tools.callFunction($funcNum, '$url', '$message');</script>";
                echo $response;
            } else {
                $message = "Error uploading file.";
            }
        }
    }
}
