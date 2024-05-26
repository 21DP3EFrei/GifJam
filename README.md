# About
Šis ir mans RVT 3.kursa noslēguma darbs, gan datu bāzes un WEB (tīmekļa vietnes) programēšanā. Šis projekts ir vietne kas ļauj lietotājiem izveidot kontus un augšupielādēt mēmus vietnē, kurus apstiprina administrators.

## Instalēšana

Lai palaistu šo projektu lokāli:

1. Nodrošiniet, lai jūsu sistēmā būtu instalēta PHP (versija ^8.1).
2. Instalējiet Composer globāli, ja vēl neesat to izdarījis. Varat to lejupielādēt no vietnes [getcomposer.org](https://getcomposer.org/).
3. Nodrošiniet, lai jūsu sistēmā būtu instalēts Node.js un npm (vai Yarn).
4. Kopējat šo krātuvi vietējā datorā.
5. Pārejiet uz projekta direktoriju savā terminālī.
6. Palaidiet `composer install`, lai instalētu PHP.
7. Palaidiet `npm install', lai instalētu JavaScript.
8. Izveidojiet .env failu vai mdoificējat doto un konfigurējiet to ar saviem vides iestatījumiem.
9. Ja projektā tiek izmantota datu bāze, pārliecinieties, vai ir instalēts un konfigurēts datu bāzes serveris. Atjauniniet .env failu, norādot datu bāzes savienojuma informāciju.
10. Palaidiet `php artisan migrate', lai palaistu datu bāzes migrāciju.
11. Visbeidzot, palaidiet `npm run dev', lai apkopotu līdzekļus un palaistu izstrādes serveri.
12. Palaižat 'Apache' un 'MySql' XAMPP control panelī.
13. Lai skatītu lietojumprogrammu, pārlūkprogrammā apmeklējiet vietni `http://127.0.0.1:5500/api/resources/views/home%20page/Home.html'.
14. Lai apskatītu datu bāzi, vajag aiziet uz `http://localhost/phpmyadmin/'

## Palaišana

Lai projektu varētu paalaist vajag palaist Home.html, ja nesanāk, tad  var ielādēt 'live server' no visual stuio code 'Extensions' (Ctrl + X + Shift).
Kad ir tas ir palaists vajag ieslēgt php codu, ko var izdarīt terminālā rakstot 'php artisan serve' (pārliecinies ka to palaid pareizējā mapē, vajadzētu termināla būt atvērtam api). Aizejot uz tīmekļu vietni vajadzētu visam strādāt.


## Notes (svarīgas lietas kas jatceras)

# Kā palaist
open XAMPP
http://localhost/phpmyadmin/index.php?route=/database/structure&server=1&db=webpro&table=
(ja vajag aiziet uz api mapi terminālā raksti: cd api)
php artisan serve ()

# Github
git add .
git commit -m "Your commit message"
git push

# Izmantotās valodas un rīki
Visual studio code ar 'live server'
Php, JavaScript, html, tailwind, node.js
MySql datu bāze (specifiski phpMyAdmin)