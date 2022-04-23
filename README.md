# Gestionale di pizze

## Passi da seguire per importare repo
1. Cloniamo la repo esistente da GitHub
2. Composer install
3. Npm install
4. Copia il file .env (cp .env.example .env da riga di comando)
5. Crea un nuovo DB in phpmyadmin
6. Configura il file .env per DB e Mail
7. Rigeneriamo la nostra App Key ( php artisan key:generate )
8. Cancelliamo la cache delle impostazioni ( php artisan config:clear )
9. Lanciamo le migrazioni ( php artisan migrate )
10. Lanciamo i seeder ( php artisan db:seed se abbiamo un metodo definito nella
DatabaseSeeder.php oppure php artisan db:seed --class=NomeDelSeeder)
11. Creiamo il link da storage alla cartella public php artisan storage:link

# TODO

## Back-End
### 1
- [x] PizzaController + CRUD
- [x] Views -> admin -> pizzas
- [X] Seeds per pizze menu
- [X] Api per passaggio informazioni menu al Front

### 2
- [ ] creazione tabella/model ordini ricevuti
- [ ] Api get per visualizzazione ordini & Api post per ricevere dal front ordine

### 3
- [ ] aggiunta a tabella ordini di colonna "consegna stimata" (calcola con carbon da created_at a mezz'ora dopo ad esempio)
- [x] setup invio email al ristorante(admin) alla ricezione di un ordine

### 4
- [ ] stilizzazione back-end tabella pizze
- [ ] stilizzazione back-end tabella ordini effettuati/in corso
- [ ] stilizzazione navbar pizze e ordini


## Front - End
### 1
- [x] Setup vue router e paginazione (homepage ,menu, chi siamo, invia ordine)
- [ ] Ricezione menu tramite axios/api,
- [x] stilizzazione pagina homepage
- [ ] stilizzazione pagina menu
- [ ] stilizzazione pagina chi siamo
- [ ] stilizzazione footer

### 2
- [x] gestione invio ordine -> form invio ordine(api post)
- [x] orderController e model Order
- [ ] visualizzazione ordine inviato (api get)


## Passaggi per multiselect -   https://vue-multiselect.js.org/#sub-multiple-select
- npm install vue-multiselect --save
- cancellare front.js in public/js
- npm run watch
- composer require doctrine/dbal
- andare in composer.json e cmabiare dbail in "^2.0",
- composer update
- php artisan migrate
