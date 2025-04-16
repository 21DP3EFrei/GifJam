# Par
Šis ir mans RVT 3.kursa noslēguma darbs, tagad 4.kursa. GifJam ir vietne kas ļauj lietotājiem izveidot kontus un augšupielādēt resursus vietnē, kurus apstiprina administrators. Saite ir domāta primāri cilvēkiem kas veido video materiālus (markētings vai sociālā tīkla lietotāji). Lietotāji varēs augšiplādēt mūziku, mēmus, skaņas efektus un gifus. Cilvēki varēs viegli atrast materiālu pēc kategorijām, kā arī ar meklēšanu.

## Instalēšana

Lai palaistu šo projektu lokāli:

1. Nodrošiniet, lai jūsu sistēmā būtu instalēta PHP (versija ^8.1).
2. Instalējiet Composer globāli, ja vēl neesat to izdarījis. Varat to lejupielādēt no vietnes [getcomposer.org](https://getcomposer.org/).
3. Nodrošiniet, lai jūsu sistēmā būtu instalēts Node.js un npm.
4. Kopējat šo krātuvi uz jūsu datora.
5. Pārejiet uz projekta direktoriju savā terminālī.
6. Palaidiet `composer install`, lai instalētu composer.
7. Palaidiet `npm install', lai instalētu JavaScript.
8. Izveidojiet .env failu vai mdoificējat doto un konfigurējiet to ar saviem vides iestatījumiem (vai kopējat .env.enxample un pārsaucat par .env).
9. Palaidiet `php artisan migrate', lai palaistu datu bāzes migrāciju.
10. Terminālā palaižat `npm run dev' un 'php artisan serve', lai apkopotu līdzekļus un palaistu izstrādes serveri.
11. Palaižat 'Apache' un 'MySql' XAMPP control panelī.
12. Lai apskatītu datu bāzi, vajag aiziet uz `http://localhost/phpmyadmin/'

## Palaišana

Lai projektu varētu palaist vajag terminālī rakstīt 'php artisan serve' (pārliecinies ka to palaid pareizējā mapē) un 'npm run dev'. Aizejot uz tīmekļu vietni vajadzētu visam strādāt. (ja vajag aiziet uz pareizo mapi terminālā raksti: cd 'mapes nosaukums' (cd .. ir lai ietu uz atpakaļu))


# Izmantotās valodas un rīki
Php, JavaScript, html, tailwind, node.js, Blade, ajax, media-chrome, tailwind, daisyui, css
MySql datu bāze
