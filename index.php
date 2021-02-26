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

    $kpok = $pdo->prepare("INSERT INTO user (email, username, password) VALUES (?,?,?)");
    $mail = 'test192@example.com';
    $username = 'moi192';
    $mdp = 'azer192';
    $kpok->bindParam(1, $mail);
    $kpok->bindParam(2, $username);
    $kpok->bindParam(3, $mdp);
    $kpok->execute();

    $id = 1;
    $modif = $pdo->prepare("UPDATE user SET username=$username WHERE id = $id ");
    $newname = 'moi192a';
    $modif->bindParam('username', $newname);
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