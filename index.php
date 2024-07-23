<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>URL Crawler</title>
    <style>
        body{
            background-color: black;
        }
    </style>
</head>

<body>
    <h1 style="color: green;">Mr PWD 69</h1><br>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <input style="color: green; background-color:red;" type="text" name="site" placeholder="Enter your URL"><br>
        <button type="submit" name="submit">Go for it!</button>
        <br><br>
    </form>
</body>

</html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["submit"])) {
        $url = $_POST["site"];
        // Check if "http://" or "https://" is present in the user input
        if (strpos($url, "http://") !== false || strpos($url, "https://") !== false) {
            $response = file_get_contents($url);
            $pattern = '#\b(?:https?://|www\.)\S+\b#';
            preg_match_all($pattern, $response, $matches);
            echo '<textarea rows="4">';
            foreach ($matches[0] as $value) {
                echo $value . "\n";
            }
            echo '</textarea>';
        } else {
            echo '<h1 style="background-color:red;">Please use http:// in your URL.</h1>';
        }
    }
}

