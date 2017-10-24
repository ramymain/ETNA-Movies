# ETNA-Movies
(Un projet parmi d'autres en première année de prépa)

## Files List

 - etna_movies.php         : Fichier principale
 - movies.csv              : Fichier csv ( contenu )
 - commandes_students.php  : Fonction student repertoriee
	add_student.php    : Fonction d'ajout d'un student
	show_student.php   : Fonction lister students ou info d'un student
	update_student.php : uptade un student
 - commandes_movies.php    : Fonction movies repertorie
	show_movies.php    : Fonction d'affichage movies
 - commandes_location.php  : Fonction location repertoriee

## Presentation

 Etna Movies a pour but de realiser un script PHP pour concevoir un service de location de film entre etudiants.
 Grace a la base de donnees MongoDB, nous avons pu enregister les films ainsi que les etudiants et leurs locations.

 Nous disposons de 3 parties differentes :

 - Students :
	- Ajouter un etudiant dans la base de donnees.
	- Supprimer un etudiant de la base de donnees.
	- Afficher les informations d'un/des etudiant(s).
	- Modifier les informations d'un etudiant.

 - Movies :
   	- Recuperer et stocker les informations des films depuis un fichier csv.
	- Afficher un ou des film(s) :
	  	   - Par ordre alphabetiques.
		   - Par ordre alphabetiques inverse.
		   - Par genre.
		   - Par annee.
		   - Par note.

 - Location :
   	- Location d'un film.
	- Rendu du film.
	- Afficher quel film a ete loue et par qui.

## Fonctionnement
```
php etna_movies.php [fonction] [attribut]
```
 fonction :
 	  / = vide ou se qui suit
	  
 - add_student [login (xxxxxx_x)] ( ajout d'un etudiant )
 - show_student / [login (xxxxxx_x)] ( Affichage information etudiant )
 - update_student [login (xxxxxx_x)] ( Modification information etudiant )

 - show_movies / [desc] ( affichage film ordre alphabetique / inverse )
   	       	 [genre] [action, adventure, animation, biography, comedy, ( affichage par genre )
		 	  crime, drama, family, fantasy, history, horror,
			  musical, mystery, romance, sci-fi, sport, thriller]
		 [year] [1936 - 2015] ( affichage par date de sortie )
		 [rate] [0 - 9] ( affichage par note )

 - rent_movie -> en cours de developpement.
 - return_movie -> en cours de developpement.
 - show_rented_movies -> en cours de developpement.
