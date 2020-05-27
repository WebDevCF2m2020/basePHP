SELECT * FROM util;
# requête pour la page d'accueil publique
SELECT a.idarticle, a.titre, LEFT(a.texte,200) AS texte, a.ladate,
	   u.idutil, u.login, u.nomprenom		
	FROM article a
    INNER JOIN util u 
		ON a.util_idutil = u.idutil
    ORDER BY a.ladate DESC;    