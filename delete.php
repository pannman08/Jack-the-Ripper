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