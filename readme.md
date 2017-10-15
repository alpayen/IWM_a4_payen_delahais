Instalation du projet :

Après le clone, a la racine : 


composer udpate
npm update
npm run dev
node socket.js
php artisan migrate.
php artisan key:generate

Infos complémentaires : 

Nous avons mis en place un système de mailing en mode sandbox chez Mailgun. 
Les lignes sont commentés, car il faut ajouter les emails de destinataires un par un
sur le site mailgun, et nous avons juger cela trop contraigannt pour une béta.

Bon code !

MAIL_DRIVER=mailgun
MAIL_HOST=smtp.mailgun.org
MAIL_PORT=587
MAILGUN_DOMAIN=sandboxce00330e62e746bc843844138eb3a00a.mailgun.org
MAILGUN_SECRET=key-ebd7fa5e741eba32c69fc566921e8a46
MAIL_USERNAME=postmaster@sandboxce00330e62e746bc843844138eb3a00a.mailgun.org
MAIL_PASSWORD=ef248f72345156469761cc227bdcb067
MAIL_ENCRYPTION=tls