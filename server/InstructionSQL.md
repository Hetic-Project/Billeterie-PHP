Se connecter à MySQL en tant que superutilisateur :
```shell
sudo mysql -u root -p
```


Créer une base de données :
```sql
CREATE DATABASE nom_de_la_base_de_données;
```


Sélectionner une base de données :
```sql
USE nom_de_la_base_de_données;
```


Créer une table :
```sql
CREATE TABLE nom_de_la_table (

  nom_de_la_colonne1 type_de_données1,

  nom_de_la_colonne2 type_de_données2,

  ...

);
```

Afficher la liste des tables dans la base de données :
```sql
SHOW TABLES;
```


Insérer des données dans une table :
```sql
INSERT INTO nom_de_la_table (nom_de_la_colonne1, nom_de_la_colonne2, ...) VALUES (valeur1, valeur2, ...);
```


Sélectionner des données dans une table :
```sql
SELECT * FROM nom_de_la_table;
```


Mettre à jour des données dans une table :
```sql
UPDATE nom_de_la_table SET nom_de_la_colonne1 = nouvelle_valeur WHERE condition;
```


Supprimer des données d'une table :
```sql
DELETE FROM nom_de_la_table WHERE condition;
```


Supprimer une table :
```sql
DROP TABLE nom_de_la_table;
```

Quitter MySQL :
```sql
quit;
```

Exécuter un fichier SQL
```shell
mysql -u [nom_utilisateur] -p [nom_de_la_base_de_données] < [chemin_vers_le_script]
```

Attribuer des privilèges
```sql
GRANT ALL PRIVILEGES ON db_login.* TO 'php' WITH GRANT OPTION;
```
```sql
 FLUSH PRIVILEGES;
```