# Petit application
Le but de l'application est de générer un pavage de cercle dans un carré de taille fixe, en utilisant du svg (voyez le code qu'il faudra utiliser pour générer les cercles plus bas).
Construisez une petite application avec la structure que nous avons mis en place. Mettez les CSS du bootstrap, pour faire cela faites un dossier assets. La page se structure sur deux colonnes, une colonne permettant de donner une valeur nombre de cercles à générer dans un formulaire. Et l'affichage au centre des cercles.

Ecrivez l'algorithmie de la génération des cercles dans une action de vos contrôleurs.

Utilisez le svg suivant pour générer vos cercle, par exemple ici on génère 4 cercles.

```html
<div id="wrap">
	<svg width="900" height="900">
		<circle cx="225" cy="225" r="225"  fill="#86d8ef" />
		<circle cx="675" cy="225" r="225"  fill="#86d8ef" />
		<circle cx="225" cy="675" r="225"  fill="#86d8ef" />
		<circle cx="675" cy="675" r="225"  fill="#86d8ef" />
	</svg>
</div>
```

wireframe

```
/********************************************\
				*  
Nb de cercle: 2	*     * * *      * * * 
				*    *     *    *     *
input:         	*    *     *    *     *
               	*     * * *      * * * 
Ok	 			*
				*
				*
				*
				*
/*********************************************\

```
