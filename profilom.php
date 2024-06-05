<?php
require_once 'db_kapcsolat.php';
require_once 'crud.php';

$db = new Database();
$crudManager = new CRUDManager($db);
$userid = $_SESSION['id'];
$result = $crudManager->performCRUD("select", "felhasznalok", "", "id=$userid");
foreach ($result as $row) {
    $nev = $row['nev'];
    $felhasznalonev = $row['felhasznalonev'];
    $jogosultsag = $row['auth'];
}
$query = "SELECT * FROM beosztasok WHERE beo_id = :beo_id";
$param = array(':beo_id' => $jogosultsag);
$statement = $db->executeQuery($query, $param);
$beosztas = $statement->fetch(PDO::FETCH_ASSOC);
$query = "SELECT * FROM beosztasok";
$beosztasok = $db-> fall($query);
?>

<h1>Profilom</h1>
<form action="profil_szerkeszt.php" method="POST">
    <table>
        <input type="hidden" name="id" value="<?php echo $userid ?>">
        <tr>
            <td>
                <label for="nev">Név:</label>
            </td>
            <pre>
                <td>
                    <input type="text" name="nev" id="nev" value="<?php echo $nev; ?>" required disabled>                
                </td>
            </pre>
        </tr>
        <tr>
            <td>
                <label for="felhasznalonev">Felhasználónév: </label>
            </td>
            <pre>
                <td>
                    <input type="text" name="felhasznalonev" id="felhasznalonev" value="<?php echo $felhasznalonev; ?>" required disabled>
                </td>
            </pre>
        </tr>
        <tr>
            <td>
                <label for="beosztas">Beosztás: </label>
            </td>
            <pre>
                <td>

                <select disabled name="beosztas" id="beosztas">
 -->                <?php foreach($beosztasok as $beo): ?>
                        <option value="<?php echo $beo['beo_id']; ?>"
                         <?php if($beo['beo_nev'] == $beosztas['beo_nev']): echo "selected";
                                endif; ?>> <?php echo $beo['beo_nev'] ?></option>
                    <?php endforeach; ?>
                </select>

                    <!-- <input type="text" name="beosztas" id="beosztas" value="<?php echo $beosztas['beo_nev']; ?>" required disabled>
                    <input type="hidden" name="jogosultsag" id="jogosultsag" value="<?php echo $jogosultsag ?>" required disabled> -->
                </td>
            </pre>
        </tr>
        <tr>
            <td>
                <button type="button" id="szerkeszt">SZERKESZT</button>
            </td>
            <td>
                <input type="submit" value="JÓVÁHAGY" disabled>
            </td>
        </tr>
    </table>
</form>
<script>
    const enableButton = document.getElementById("szerkeszt");
    const inputs = document.querySelectorAll("input[disabled]");
    const selectoptions = document.getElementById("beosztas");

    enableButton.addEventListener("click", function() {
    inputs.forEach(input => input.disabled = false);
    selectoptions.disabled = false;
    });
</script>