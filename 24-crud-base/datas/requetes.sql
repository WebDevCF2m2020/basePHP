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

# Sélectionnez tous les champs de la table (*) thepage en joignant les utilisateurs (idutilisateur, thelogin,thename) qui ont écrit ces pages IDEM + alias internes (le nom des tables thepage => t et utilisateur =>u) ! je n'utilise pas la AS même si il fonctionne, pour ne pas le confondre avec les alias externes (noms des champs en sortie)
SELECT t.*, 
				u.idutilisateur, u.thelogin, u.thename
FROM thepage t
	INNER JOIN utilisateur u
    ON t.utilisateur_idutilisateur = u.idutilisateur
;
# IDEM mais avec des alias de sorties ! Utilisation du AS pour "voir" les noms des champs exportés (vers php etc....)

SELECT t.*, 
				u.idutilisateur AS id, u.thelogin AS login, u.thename AS nom
FROM thepage t
	INNER JOIN utilisateur u
    ON t.utilisateur_idutilisateur = u.idutilisateur
;

# idem sans le champs utilisateur_idutilisateur trié par u.thedate descendant
SELECT t.*, 
				u.idutilisateur AS id, u.thelogin AS login, u.thename AS nom
FROM thepage t
	INNER JOIN utilisateur u
    ON t.utilisateur_idutilisateur = u.idutilisateur
;

# Par Adrien (JOIN == INNER JOIN)
SELECT p.idthepage, p.thetitle, p.thetext, p.thedate, 
				u.idutilisateur, u.thelogin, u.thename 
FROM thepage p 
	INNER JOIN utilisateur u 
    ON p.utilisateur_idutilisateur = u.idutilisateur 
ORDER BY p.thedate DESC;

# IDEM Exercice sauf que l'on prend que thepage.idthepage < 3
SELECT p.idthepage, p.thetitle, p.thetext, p.thedate, 
				u.idutilisateur, u.thelogin, u.thename 
FROM thepage p 
	INNER JOIN utilisateur u 
    ON p.utilisateur_idutilisateur = u.idutilisateur 
WHERE p.idthepage < 3    
ORDER BY p.thedate DESC;

# Sélection de utilisateur.thelogin et utilisateur.thename avec (SI jointure) thepage.thetitle. Récupérez toutes les lignes (si pas de jointure thepage.thetitle == NULL) Résultat actuel: 3 lignes
SELECT u.thelogin, u.thename,
			p.thetitle
FROM utilisateur u
	LEFT JOIN thepage p
	ON u.idutilisateur = p.utilisateur_idutilisateur
    ;


# Séléction de utilisateur.thelogin et utilisateur.thename avec (SI jointure) thepage.thetitle (chaine séparée par |||). Récupérez toutes les lignes (si pas de jointure thepage.thetitle == NULL) Résultat actuel: 2 lignes Voir GROUP_CONCAT et GROUP BY - Tous les utilisateurs sur 1 ligne par utilisateur ! problème du nom de sortie
SELECT u.thelogin, u.thename,
			GROUP_CONCAT(p.thetitle SEPARATOR '|||')
FROM utilisateur u
	LEFT JOIN thepage p
	ON u.idutilisateur = p.utilisateur_idutilisateur
GROUP BY u.idutilisateur    
    ;
    
 # Récupérez toutes les lignes (si pas de jointure thepage.thetitle == NULL) Résultat actuel: 2 lignes Voir GROUP_CONCAT et GROUP BY - Tous les utilisateurs sur 1 ligne par utilisateur - Alias en sortie pour le GROUP_CONCAT AS thetitle
SELECT u.thelogin, u.thename,
			GROUP_CONCAT(p.thetitle SEPARATOR '|||') AS thetitle
FROM utilisateur u
	LEFT JOIN thepage p
	ON u.idutilisateur = p.utilisateur_idutilisateur
GROUP BY u.idutilisateur    
    ;   