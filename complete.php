<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jack the Ripper</title>
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <script type="text/javascript">
        var countdown = 60;

        function updateTimer() {
            countdown--;

            document.getElementById("timer").innerHTML = "Expiring in " + countdown + " seconds...";

            if (countdown <= 0) {
                window.location.href = 'timed-out.php';
            }
        }

        function getUrlParameter(name) {
            var url = window.location.href;
            var regex = new RegExp('[?&]' + name + '=([^&]*)');
            var result = regex.exec(url);
            return result ? result[1] : '';
        }

        setInterval(updateTimer, 1000);
    </script>
</head>
<body>
    <h1>Status: Download complete</h1>
    
    <h3>Your video is downloaded.</h3>
    <div><button onclick="window.location.href='play.php'");" style="cursor: pointer;">Play Video</button>&nbsp;<button onclick="window.location.href='save.php'");" style="cursor: pointer;">Save Video</button></div>
    <br>
    <br>

    <hr>

    <p id="timer">Expiring in 60 seconds...</p>

    <hr>

    <i style="line-height: 20px;">Jack the Ripper 1.1<br> a Cameron Evans Production<br> Copyright © 2024<br> Powered by <a style="color: blue;" target="_blank" href="https://github.com/yt-dlp/yt-dlp">YT-DLP</a></i>

</body>
</html>