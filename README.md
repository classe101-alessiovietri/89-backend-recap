# Come avviare e sviluppare un progetto in Laravel

## Passi post-clone di una repo di Laravel
1. Clono la repo del nuovo esercizio (che probabilmente è la copia del template)
2. Copio il file .env.example e lo rinomino in .env (senza cancellare il file .env.example)
3. Apro il terminale ed eseguo il comando composer install
4. Dopo l'esecuzione di composer install, eseguo nel terminale il comando php artisan key:generate
5. Dopo l'esecuzione di php artisan key:generate, eseguo nel terminale il comando npm i
6. Dopo l'esecuzione di npm i:
    a. O avvio npm run dev
    b. Oppure eseguo il comando npm run build
7. Se ne ho bisogno (MOLTO probabilmente si), collego il database modificando il file .env
8. Avvio (se ho avviato npm run dev -> lo faccio in un altro terminale) il comando php artisan serve

## Come aggiungere un'entità (e relativa CRUD) -> es. pasta, libri, macchine...
0. **N.B. l'entità User è già implementata in Laravel**
1. Creo una migration tramite il comando **php artisan make:migration create_NOMETABELLA_table** (es. create_pastas_table)
2. Riempio la migration con le colonne necessarie
3. Eseguo la migration tramite il comando **php artisan migrate**
4. Creo il model associato alla mia entità tramite il comando **php artisan make:model NOMEENTITA** (es. Pasta)
5. Creo il seeder associato alla mia entità tramite il comando **php artisan make:seeder NOMEENTITASeeder** (es. PastaSeeder)
6. Riempio il seeder con le operazioni necessarie a creare i salvare i miei dati iniziali (quelli reali)/di test (quelli fake)
7. Eseguo il seeder con il comando **php artisan db:seed --class=NOMEENTITASeeder**
8. Creo un resource controller tramite il comando **php artisan make:controller NOMEENTITAController --resource** (es. PastaController)
9. Associo le funzioni (già definite) del nuovo controller alle rispettive rotte aggiungendo in web.php **Route::resource('NOMETABELLA', NOMEENTITAController::class)**
10. Riempio i corpi delle funzioni secondo necessità

## Come esporre degli endpoint API
1. Pensare cosa vogliamo esporre tramite API (molto probabilmente, solo la R di CRUD)
2. Raggruppiamo tutte le rotte API che definiremo sotto il gruppo:
    Route::name('api.')->group(function () { ... });
3. Se le nostre chiamate devono essere rese possibili solo per il nostro frontend:
    1. Aggiungiamo la variabile APP_FRONTEND_URL nel file .env con il valore del "dominio" del nostro frontend
    2. Apriamo il file config/cors.php e modifichiamo il valore della chiave 'allowed_origins' da ['*'] a [env('APP_FRONTEND_URL')] (con un eventuale valore di default per la funzione env())
4. Creiamo il controller API che ci serve (sotto la cartella app/Http/Controllers/Api)
5. Definiamo, all'interno del controller che abbiamo appena creato, le funzioni che ci servono:
    - Se stiamo implementando la versione API della R di CRUD, ci serviranno le funzione index e show
    - Se definiamo la funzione index, ragioniamo sul fatto se ci serve la paginazione o meno (ragioniamoci ATTENTAMENTE)
    - Tutte le funzioni che definiremo nel controller "DOVREBBERO" restituire response()->json([ ... ])
    - La sintassi del JSON restituito è arbitraria
6. Definiamo le rotte che si collegano alle funzioni definite al punto 5 all'interno del file routes/api.php
7. Per ogni endpoint API definito, lo testiamo con Postman

## Come usare Vue Router
1. Installiamo il pacchetto tramite il comando npm install vue-router
2. Creiamo il file router.js nella cartella src
3. Ci copiamo il contenuto da incollare nel file router.js (contenuto di base, perché poi i componenti e le rotte li definiremo noi)
4. Importiamo router dentro main.js tramite la riga "import router from './router';"
5. Dopo createApp(App), concateniamo .use(router)
6. Inseriamo in uno dei nostri componenti il componente <router-view></router-view> (probabilmente lo inseriremo in MainComponent)
7. Per creare dei link, useremo il componente <router-link :to="{ name: 'nome-rotta', params: { eventuali: 1, nomi: 2, parametri: 3}}"></router-link>

## Passi workflow di Git














-------------------------------------------------------

1. integrare js e blade
2. link "da vue da a laravel"
3. api key per proteggere rotte api
4. deploy di un sito
5. validation di una mail
6. remember me come funziona
