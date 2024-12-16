<?php

    session_start();

    $path = "." . $_SESSION['video_to_delete'];

    if (isset($path)) 
    {
        if (file_exists($path)) 
        {
            unlink($path);
        }
        unset($path);
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jack the Ripper</title>
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
</head>
<body>
    <h1>Status: Download expired</h1>
    
    <p>Your download has expired and the video has been deleted. It's a mechanism that ensures smooth operation and prevents server overload.</p>

    <hr>

    <i style="line-height: 20px;">Jack the Ripper 1.1<br> a Cameron Evans Production<br> Copyright © 2024<br> Powered by <a style="color: blue;" target="_blank" href="https://github.com/yt-dlp/yt-dlp">YT-DLP</a></i>

</body>
</html>