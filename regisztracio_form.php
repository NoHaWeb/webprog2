<?php

$pdo = new PDO('mysql:host=localhost;dbname=web2', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$query = "SELECT * FROM beosztasok";
$beok = $pdo->query($query)->fetchAll(PDO::FETCH_OBJ);

?>
<h1>KISKERESKEDELEM</h1>
<hr>
<h2>Regisztráció</h2>

<table>
    <form action="regisztracio.php" method="POST">
        <tr>
            <td><label for="nev">Név:</label></td>
            <td><input type="text" id="nev" name="nev" required></td>
        </tr>
        <tr>
            <td><label for="felhasznalo">Felhasználónév:</label></td>
            <td><input type="text" id="felhasznalo" name="felhasznalo" required></td>
        </tr>
        <tr>
            <td><label for="jelszo">Jelszó:</label></td>
            <td><input type="password" id="jelszo" name="jelszo" required></td>
        </tr>
        <tr>
            <td><label for="jelszo">Beosztas:</label></td>
            <td>
                <select id="beosztas" name="beosztas">
                    <?php foreach($beok as $beo): ?>
                        <option value="<?php echo $beo->beo_id ?>"><?php echo $beo->beo_nev ?></option>
                    <?php endforeach; ?>
                </select>
            </td>
        </tr>
        <tr>
            <td><input type="submit" value="Regisztráció"></td>
        </tr>
        
    </form>
</table>

