# PHP Book Catalog

Un catalogo di libri sviluppato in PHP e CSS, con ricerca per titolo, filtro per genere e pagina dettaglio.

Il progetto nasce come esercizio pratico per imparare a generare pagine HTML sul server, gestire parametri GET e organizzare codice PHP riutilizzabile.

## Funzionalità

- Catalogo con titolo, autore, genere e anno.
- Ricerca per titolo senza distinzione tra maiuscole e minuscole.
- Filtro per genere combinabile con la ricerca.
- Contatore dei risultati e messaggio per ricerche senza corrispondenze.
- Pagina dettaglio identificata tramite ID.
- Gestione degli ID non validi e dei libri non trovati.
- Layout responsive.

## Tecnologie

- PHP
- HTML5
- CSS3

I dati sono conservati in un array PHP. Il progetto non richiede un database o dipendenze esterne.

## Struttura

- `index.php`: catalogo, ricerca e filtro per genere.
- `book.php`: dettaglio del libro e gestione degli errori.
- `books.php`: dati del catalogo.
- `helpers.php`: funzione per l’escaping HTML.
- `style.css`: stile e layout responsive.

## Avvio locale

È necessario avere PHP installato e disponibile nel PATH.

Clona la repository:

```bash
git clone https://github.com/alessiaasmeraglia/php-book-catalog.git
cd php-book-catalog
```

Avvia il server di sviluppo:

```bash
php -S localhost:8000
```

Apri nel browser:

http://localhost:8000

Se su Windows PHP è installato in `C:\php` ma non è nel PATH:

```powershell
& "C:\php\php.exe" -S localhost:8000
```

Per interrompere il server premi Ctrl+C nel terminale.

## Concetti applicati

Il progetto utilizza array associativi, cicli, funzioni, inclusione di file e parametri GET.

La ricerca e il filtro vengono elaborati sul server. I testi vengono inseriti nell’HTML tramite una funzione basata su `htmlspecialchars()`.

La pagina dettaglio valida l’ID e restituisce uno status HTTP 400 per identificativi non validi oppure 404 per libri assenti.

## Pubblicazione

GitHub conserva il codice del progetto. Per eseguire le pagine online serve un hosting che supporti PHP: GitHub Pages non esegue codice PHP.