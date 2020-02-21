<?php

/** @var string $url */
/** @var $ch resource */
/** @var $response string */
/** @var $error bool|string */

$url = $_GET['url'] ?? '';
$error = false;
$response = '';
$ch = null;

if ($url) {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_MAXREDIRS, 1);
    curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);
    curl_setopt($ch, CURLOPT_HEADER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    curl_setopt($ch, CURLOPT_DEFAULT_PROTOCOL, 'http');

    $result = curl_exec($ch);

    if (false === $result) {
        $error = curl_error($ch);
    } else {
        $response = $result;
    }
    curl_close($ch);
}

?>


<form>
    <label>
        Domain name:
        <input type="text" value="<?= $url ?>" size="100" name="url">
    </label>
    <input type="submit" value="Check">
</form>

<?php if ($error): ?>
    <div style="border: 5px double red; border-radius: 5px;">
        <?= $error ?>
    </div>
<?php elseif ($url): ?>
    <div style="border: 5px double gray; border-radius: 5px;">
        <?= $response ?>
    </div>
<?php endif ?>


