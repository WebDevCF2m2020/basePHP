# Toutes les données de utilisateur
SELECT  * FROM utilisateur;

# toutes les données de thepage
SELECT * FROM thepage;

# Sélectionnez tous les champs de la table (*) thepage en joignant les utilisateurs (idutilisateur, thelogin,thename) qui ont écrit ces pages
SELECT thepage.*, 
				utilisateur.idutilisateur, utilisateur.thelogin, utilisateur.thename
FROM thepage
	INNER JOIN utilisateur
    ON thepage.utilisateur_idutilisateur = utilisateur.idutilisateur
;