<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
$target_dir = "./";
$uploadOk = 1;

$ext_denylist = array(
    "php",
    "php2",
    // "php3",
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
    $target_file = $target_dir . "/" . basename($_FILES["fileToUpload"]["name"]);
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
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./assets/css/main.css" />
    <title>Vulnerable site</title>
</head>

<body>
    <nav>
        <a href="/index.php">
            <h2>Broken File Uploader</h2>
        </a>
        <div id="nav_links">
            <ul>
                <li><a href=" #">About</a></li>
                <li><a href="#" id="btn_login">Login</a></li>
            </ul>
        </div>
    </nav>
    <div class="main">
        <h1>Enjoy a vulnerable File Uploader!</h1>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
        </p>
        <div id="upload_box">
            <form method="post" enctype="multipart/form-data">
                <div id="inputFile_box">
                    <p>Drop file or click</p>
                    <input type="file" name="fileToUpload" id="fileToUpload" />
                </div>
                <div id="previewBox">
                    <div id="imgPreview"></div>
                    <label id="fileName" for="fileToUpload"></label>
                </div>
                <input type="submit" value="Upload Image" name="submit" disabled id="btn_submit" />
            </form>
        </div>
    </div>

    <script src="./assets/js/index.js" defer></script>
</body>

</html>