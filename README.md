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

## Front - End

### 1
- [x] Setup vue router e paginazione (homepage ,menu, chi siamo, invia ordine)
- [ ] Ricezione menu tramite axios/api, stilizzazione pagina homepage & menu $ chi-siamo

### 2
- [ ] gestione invio ordine -> form invio ordine(api post) e visualizzazione ordine inviato (api get)

BVFJKBVJKDFNVJKDCNBVJKDFNBFJKSNFD
dasfdfasdasdasd
