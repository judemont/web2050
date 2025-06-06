<?php
function parseUrl($url)
{
    $parsedUrl = preg_replace('#^https?://#', '', rtrim($url, '/'));
    return $parsedUrl;
}

$siteFile = "";
$pagesFile = file_get_contents('pages.json');

if ($pagesFile === false) {
    die('Erreur lors de la lecture du fichier JSON.');
}

$pages = json_decode($pagesFile, true);

if (isset($_GET["url"])) {
    $url = parseUrl($_GET["url"]);

    foreach ($pages as $page) {
        if (isset($page["url"]) && $page["url"] == $url) {
            $siteFile = "pages/" . $page["file"];
            break;
        }
    }

    if (empty($siteFile) || !file_exists($siteFile)) {
        $siteFile = "pages/404.php";
    }
} else {
    $siteFile = "pages/bsearch/index.php";
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>bBrowser</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header class="browser-header">
        <div class="browser-url-container">
            <form action="index.php" method="get">
                <input value="<?php echo isset($_GET["url"]) ? htmlspecialchars($_GET["url"]) : ""; ?>" name="url"
                    type="text" class="browser-url-bar" placeholder="Entrez une URL...">
            </form>
        </div>
    </header>

    <main class="browser-content">
        <?php include $siteFile; ?>
    </main>
</body>

</html>