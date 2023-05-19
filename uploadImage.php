<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
$target_dir = "uploads/";
$uploadOk = 1;

$ext_denylist = array(
    "php",
    "php2",
    "php3",
    "php4",
    "php5",
    "php6",
    "php7",
    "phps",
    "pht",
    "phtm",
    "phtml",
    "pgif",
    "shtml",
    "pchar",
    "inc",
    "hphp",
    "ctp",
);

if (isset($_POST["submit"])) {
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $fileName = $_FILES["fileToUpload"]["name"];
    $uploadOk = 1;
    if ($fileName == "") {
        echo ("
                <div id='notification'>
                    <h3>No submission</h3>
                    <p>No file was submitted. Try again.</p>
                    <div id='not_btn_close'>
                        Got it
                    </div>
                </div>
            ");
        $uploadOk = 0;
    }

    $ext = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
    if (in_array($ext, $ext_denylist)) {
        echo ("
                <div id='notification'>
                    <h3>File type not supported</h3>
                    <p>The file type you're trying to upload is not supported.</p>
                    <div id='not_btn_close'>
                        Got it
                    </div>
                </div>
            ");
        $uploadOk = 0;
    }

    if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo ("
                <div id='notification'>
                    <h3>File size exceeded</h3>
                    <p>The file you're trying to upload is too big. Maximum size is 50Kb.</p>
                    <div id='not_btn_close'>
                        Got it
                    </div>
                </div>
            ");
        $uploadOk = 0;
    }

    if ($uploadOk) {
        $moved = move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
        if ($moved) {
            echo ("
                    <div id='notification'>
                        <h3>File Uploaded</h3>
                        <p>File successfully uploaded at <a href='$fileName' id='linkToFile'>/uploads/$fileName</a></p>
                        <div id='not_btn_close'>
                            Got it
                        </div>
                    </div>
                ");
        } else {
            echo ("
                    <div id='notification'>
                        <h3>Error</h3>
                        <p>Something went wrong</p>
                        <div id='not_btn_close'>
                            Got it
                        </div>
                    </div>
                ");
            echo ($_FILES['fileToUpload']['error']);
            var_dump($_FILES);
        }
    }
}
