<?php
exit(0);
if (!empty($_POST)) {
    $inn = trim($_POST['inn']);
    if (!empty($_POST['some-inn'])) {
        $inn = trim($_POST['some-inn']);
    }
    $toJson = [
        'query' => $inn,
        'type'  => 'INDIVIDUAL',
    ];

    $ch = curl_init("https://suggestions.dadata.ru/suggestions/api/4_1/rs/findById/party");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "Content-Type: application/json",
        "Accept: application/json",
        "Authorization: Token 7ff88d79b2ed0246035cc2d9e7dbfe9eaf99c366"
    ]);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($toJson));
    $result = curl_exec($ch);
    $result = json_decode($result, true);
}

?>

<form method="post">
    <label>
        ИНН ИП без адресов:
        <select name="inn">
            <option></option>
            <option value="772984911173">772984911173</option>
            <option value="482619000450">482619000450</option>
            <option value="772830045478">772830045478</option>
            <option value="211161057763">211161057763</option>
            <option value="583706813752">583706813752</option>
            <option value="370412696051">370412696051</option>
            <option value="583711928741">583711928741</option>
            <option value="772919542141">772919542141</option>
            <option value="211601002239">211601002239</option>
            <option value="420593032830">420593032830</option>
            <option value="480202695928">480202695928</option>
            <option value="591702900703">591702900703</option>
            <option value="661506116180">661506116180</option>
            <option value="220803993844">220803993844</option>
            <option value="230200814227">230200814227</option>
            <option value="741300708506">741300708506</option>
            <option value="575103834291">575103834291</option>
            <option value="575201537385">575201537385</option>
            <option value="591010389156">591010389156</option>
            <option value="741706441638">741706441638</option>
            <option value="524609022117">524609022117</option>
            <option value="541075697830">541075697830</option>
            <option value="770800589639">770800589639</option>
            <option value="615427832884">615427832884</option>
            <option value="616710138335">616710138335</option>
        </select>
    </label>
    <br><br>
    <label>
        Произвольный ИНН:
        <input type="text" name="some-inn" value="<?= @$_POST['some-inn'] ?>" minlength="10" maxlength="12" size="12">
    </label>
    <input type="submit">
</form>

<?php if (!empty($result)): ?>
    <pre>
        <?php
            print_r($result);
        ?>
    </pre>
<?php endif ?>
