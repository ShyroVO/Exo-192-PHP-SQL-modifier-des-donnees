<?php
/**
 * 1. Le dossier SQL contient l'export de ma table user.
 * 2. Trouvez comment importer cette table dans une des bases de données que vous
 * avez créées, si vous le souhaitez vous pouvez en créer une nouvelle pour cet exercice.
 * 3. Assurez vous que les données soient bien présentes dans la table.
 * 4. Créez votre objet de connexion à la base de données comme nous l'avons vu
 * 5. Insérez un nouvel utilisateur dans la base de données user
 * 6. Modifiez cet utilisateur directement après avoir envoyé les données
 * ( on imagine que vous vous êtes trompé )
 */

// TODO Votre code ici.
try {
    $pdo = new PDO("mysql:host=localhost;dbname=table_test_php;charset=utf8", 'root' , '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $kpok = $pdo->prepare("INSERT INTO table_test_php.user (nom, prenom, rue, numero, code_postal, ville, pays, mail) VALUES (?,?,?,?,?,?,?,?)");
    $nom = 'nom';
    $prenom = 'prenom';
    $rue = 'rue';
    $num = '0';
    $cp ='01';
    $ville = 'truc';
    $pays = 'trucp';
    $mail = 'test192@example.com';
    $kpok->bindParam(1, $nom);
    $kpok->bindParam(2, $prenom);
    $kpok->bindParam(3, $rue);
    $kpok->bindParam(4, $num);
    $kpok->bindParam(5, $cp);
    $kpok->bindParam(6, $ville);
    $kpok->bindParam(7, $pays);
    $kpok->bindParam(8,$mail);
    $kpok->execute();

    $id = 1;
    $modif = $pdo->prepare("UPDATE table_test_php.user SET nom=$nom WHERE id = $id ");
    $newname = 'moi192a';
    $modif->bindParam('nom', $newname);
    $modif->execute();
}
catch (PDOException $exception) {
    echo $exception->getMessage();
}



/**
 * Théorie
 * --------
 * Pour obtenir l'ID du dernier élément inséré en base de données, vous pouvez utiliser la méthode: $bdd->lastInsertId()
 *
 * $result = $bdd->execute();
 * if($result) {
 *     $id = $bdd->lastInsertId();
 * }
 */