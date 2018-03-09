Ce composant Joomla est un moyen simple de protéger les ressources statiques. 

# Usage

Après avoir installé le composant, l'url des ressources statiques peut être redirigée dans un .htaccess vers le composant comme ceci :

`RewriteRule images/protected/* /index.php?option=com_jhdownload [L]`

Le composant se charge alors de vérifier qu'un utilisateur est authentifié. Dans le cas contraire, il redirige vers la page /404.html
