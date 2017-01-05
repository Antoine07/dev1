<?php

/**
 * Class StorageBike
 */
class StorageBike {

    private $fileName;

    public function __construct($fileName = 'bikes.csv') {
        $this->fileName = $fileName;
    }

    public function load() {

        /**
         * fopen retourne une ressource représentant le pointeur de fichier (tête de lecture...) que l'on place dans la variable $handle,
         * ou FALSE si une erreur survient. Dans ce dernier cas on lance une exception "throw new Exception()" ce produira alors une
         * fatal error et le script s'arrête et le message de l'exception est retourné.
         */
        if (($handle = fopen($this->fileName, 'a+')) === false)
            throw new Exception(sprintf('impossible to open this file %s', $this->fileName));

        // Initialisation du tableau des données
        $data = [];
        /**
         * La fonction fgetcsv lit une ligne du fichier csv, elle utilise ici le séparateur "," elle retourne une ligne
         * sous forme d'un tableau PHP numérique.
         *
         * La méthode while est exécuté tant qu'il y a une ligne à lire, si il n'y a plus rien à lire, dans le fichier,
         * celle-ci retournera false, condition d'arrêt
         * de notre boucle ici.
         *
         * remarques: la condition ci-dessous doit être dans des paranthèses sinon $data prendra une valeur boolean, écrivez
         * ( $data[] = fgetcsv($handle, 1024, ",") ) dans ce cas l'affectation se fera pour la valeur $data et sera ensuite
         * testé avec la valeur false
         *
         */
        while ( ($data[] = fgetcsv($handle, 1024, ",")) !== false ) ;

        /**
         * Le dernière valeur pushée dans le tableau est la valeur "false", condition d'arrêt de la boucle,
         * array_pop retire cette dernière valeur inutile à afficher dans le projet.
         */
        array_pop($data);

        /**
         * On ferme la ressource (ouverture du fichier), cela fait parti des bonnes pratiques, ce qui est ouvert se ferme...
         */
        fclose($handle);

        /**
         * Ci-dessous on hydrate les objets de type Bike avec les données du fichier que l'on vient de récupérer
         * Puis on retourne les produits dans le script courant. Ces données seront exploiter dans la vue.
         */
        $products = [];

        foreach ($data as $bike) {
            $products[] = new Bike($bike[0], $bike[1], $bike[2]);
        }

        return $products;
    }
}