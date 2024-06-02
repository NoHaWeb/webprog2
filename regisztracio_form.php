<h1>KÖNYVTÁR</h1>
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
            <td><input type="submit" value="Regisztráció"></td>
        </tr>
        
    </form>
</table>

