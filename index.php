<?php

    set_time_limit(1000);
    session_start();

    if (!isset($_GET['url']) || empty($_GET['url'])) 
    {
        die('No YouTube URL provided.');
    }

    $youtube_url = escapeshellarg($_GET['url']);
    $yt_dlp_path = 'path\\to\\yt-dlp';
    $ffmpeg_path = 'path\\to\\ffmpeg';
    $download_dir = 'C:\\xampp\\htdocs\\JackTheRipper\\downloads\\';

    if (!is_dir($download_dir)) 
    {
        if (!mkdir($download_dir, 0777, true)) 
        {
            die('Failed to create download directory.');
        }
    }

    $unique_code = uniqid('video_', true);

    $output_template = $download_dir . $unique_code . '.%(ext)s';

    foreach (glob($download_dir . $unique_code . '.*') as $existing_file) 
    {
        if (file_exists($existing_file)) 
        {
            unlink($existing_file);
        }
    }

    $command = "\"$yt_dlp_path\" -f bestvideo[ext=webm]+bestaudio[ext=webm] -o \"$output_template\" $youtube_url 2>&1";
    $output = [];
    $return_var = 0;
    exec($command, $output, $return_var);

    $downloaded_file = $download_dir . $unique_code . '.webm';

    if ($return_var === 0 && file_exists($downloaded_file)) 
    {
        $converted_filename = $download_dir . $unique_code . '.wmv';

        $ffmpeg_command = "\"$ffmpeg_path\" -i \"$downloaded_file\" \"$converted_filename\" 2>&1";
        $ffmpeg_output = [];
        $ffmpeg_return_var = 0;
        exec($ffmpeg_command, $ffmpeg_output, $ffmpeg_return_var);

        if ($ffmpeg_return_var === 0 && file_exists($converted_filename)) 
        {
            $status = 'Download and conversion complete';
            $video_file_url = '/downloads/' . basename($converted_filename);

            $_SESSION['video_to_delete'] = $video_file_url;
        } 
        else 
        {
            $status = 'Conversion failed';
            $video_file_url = null;
        }

        unlink($downloaded_file);
    } 
    else 
    {
        $status = 'Download failed';
        $video_file_url = null;
    }

    header("Location: complete.php?path=" . $video_file_url);

?>