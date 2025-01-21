# About
Šis ir mans RVT 3.kursa noslēguma darbs, tagad 4.kursa. Šis projekts ir vietne kas ļauj lietotājiem izveidot kontus un augšupielādēt resursus vietnē, kurus apstiprina administrators. Saite būs domāta primāri cilvēkiem kas veido video vai mēmus uz sociālajiem tīkliem. Lietotāji varēs augšiplādēt mūziku, mēmus, skaņas un gifus. Cilvēki varēs viegli atrast ko vajag pēc kategorijām, kas sakārtotas ļoti specifiski un izmantot saviem video (ja nav autortiesības kas aizliedz).

## Instalēšana

Lai palaistu šo projektu lokāli:

1. Nodrošiniet, lai jūsu sistēmā būtu instalēta PHP (versija ^8.1).
2. Instalējiet Composer globāli, ja vēl neesat to izdarījis. Varat to lejupielādēt no vietnes [getcomposer.org](https://getcomposer.org/).
3. Nodrošiniet, lai jūsu sistēmā būtu instalēts Node.js un npm (vai Yarn).
4. Kopējat šo krātuvi vietējā datorā.
5. Pārejiet uz projekta direktoriju savā terminālī.
6. Palaidiet `composer install`, lai instalētu composer.
7. Palaidiet `npm install', lai instalētu JavaScript.
8. Izveidojiet .env failu vai mdoificējat doto un konfigurējiet to ar saviem vides iestatījumiem.
9. Ja projektā tiek izmantota datu bāze, pārliecinieties, vai ir instalēts un konfigurēts datu bāzes serveris. Atjauniniet .env failu, norādot datu bāzes savienojuma informāciju.
10. Palaidiet `php artisan migrate', lai palaistu datu bāzes migrāciju.
11. Visbeidzot, palaidiet `npm run dev', lai apkopotu līdzekļus un palaistu izstrādes serveri.
12. Palaižat 'Apache' un 'MySql' XAMPP control panelī.
13. Lai apskatītu datu bāzi, vajag aiziet uz `http://localhost/phpmyadmin/'

## Palaišana

Lai projektu varētu palaist vajag terminālī rakstīt 'php artisan serve' (pārliecinies ka to palaid pareizējā mapē) un 'npm run dev'. Aizejot uz tīmekļu vietni vajadzētu visam strādāt.


## Notes (svarīgas lietas kas jatceras)

# Kā palaist
open XAMPP
http://localhost/phpmyadmin/index.php?route=/database/structure&server=1&db=webpro&table=
(ja vajag aiziet uz pareizo mapi terminālā raksti: cd 'mapes nosaukums' (cd .. ir lai ietu uz atpakaļu))
php artisan serve
npm run dev

# Github
git add .
git commit -m "Your commit message"
git push

# Izmantotās valodas un rīki
Php, JavaScript, html, tailwind, node.js, Blade
MySql datu bāze (specifiski phpMyAdmin)
