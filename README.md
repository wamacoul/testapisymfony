le dossier comporte deux projets une api symfony et une app frontend regroupant les fonctionalités demandé

Mise en marche de l'API SYMFONY

1- composer install  // pour recuperer les dependances
2- symfony console doctrine:database:create  ou php bin/console doctrine:database:create
3- symfony console make:migration
4- symfony console doctrine:migrations:migrate
5- symfony console doctrine:fixtures:load
6- symfony serve

Mise en marche de l'App frontend

1- npm install
2- ng serve
