<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        try {
            $dbh = new PDO('mysql:host=localhost;dbname=2key', 'root', '');
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }

        function get($Nom_champ, $Valeur, $Table, $BDD) {
            $dbh = new PDO('mysql:host=localhost;dbname=' . $BDD . '', 'root', '');
            foreach ($dbh->query('SELECT * FROM ' . $Table . ' WHERE ' . $Nom_champ . '=' . $Valeur . '') as $row) {
                $arr = array('id' => $row[0], 'nom' => "$row[1]", 'url' => "$row[2]");
                return $arr;
            }
        }

        $arra = get("id", 1, "posts", "2key");
        $json = json_encode($arra);
        echo $json;
        var_dump(json_decode($json));
        var_dump(json_decode($json, true));
        ?>
    </body>
</html>

