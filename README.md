<div align="center">

# 🛒 eCommerce

**Negozio online di elettronica in PHP e MySQL: registrazione, login, catalogo per reparti e storico ordini**

![PHP](https://img.shields.io/badge/PHP-5.6-777BB4?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-MariaDB-4479A1?style=for-the-badge&logo=mysql&logoColor=white)
![HTML5](https://img.shields.io/badge/HTML5-E34F26?style=for-the-badge&logo=html5&logoColor=white)
![CSS3](https://img.shields.io/badge/CSS3-1572B6?style=for-the-badge&logo=css3&logoColor=white)
![JavaScript](https://img.shields.io/badge/JavaScript-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black)
![XAMPP](https://img.shields.io/badge/XAMPP-FB7A24?style=for-the-badge&logo=xampp&logoColor=white)

<img src="home1.png" alt="Sfondo della pagina di accesso" width="600">

</div>

---

## 📖 Panoramica

Questo è il mio **primo progetto**, realizzato nel **2018**: un sito e-commerce per la vendita di prodotti di
elettronica, scritto in PHP con database MySQL/MariaDB.

Un utente può registrarsi, accedere con le proprie credenziali, sfogliare i prodotti divisi per reparto, ordinarli
indicando la quantità e consultare in seguito i propri dati e l'elenco degli acquisti fatti. Il catalogo di esempio
contiene **20 prodotti** distribuiti in **5 reparti**.

## ✨ Funzionalità

| Area | Cosa fa | File |
|---|---|---|
| 🔐 **Accesso** | Login con username e password; la password viene confrontata con l'hash MD5 salvato nel database | `Home.html`, `controllologin.php` |
| 📝 **Registrazione** | Inserimento di nome, cognome, indirizzo, numero di carta, username e password, con controllo che l'username non sia già in uso | `registra.html`, `controlloreg.php` |
| 🏠 **Area personale** | Menu con ordina prodotto, lista acquisti e dati account; le pagine riservate sono protette da sessione | `account_personale.php` |
| 🗂️ **Catalogo per reparti** | Scelta tra Telefoni, Notebook, Tablet, Mouse e Tastiere, poi tabella con immagine, descrizione e prezzo | `Ordina.php`, `scelta_prodotto.php` |
| 🧾 **Ordine** | Registrazione dell'ordine e della riga d'ordine con calcolo della spesa (quantità × prezzo) e riepilogo finale | `registraprod.php` |
| 📦 **Storico acquisti** | Elenco degli acquisti del cliente con immagine, descrizione, data, quantità e totale | `lista_acq.php` |
| 👤 **Dati account** | Visualizzazione dei dati personali del cliente collegato | `dati_acc.php` |
| 🚪 **Logout** | Svuota e distrugge la sessione | `logout.php` |
| 🛡️ **Log dei tentativi sospetti** | Se username o password contengono caratteri non alfanumerici, salva IP, browser, server, script e data nella tabella `hacker` | `controllologin.php` |

I form usano anche controlli lato client in JavaScript: campi obbligatori, corrispondenza tra password e conferma,
scelta del reparto e quantità.

## 🗄️ Database

Il dump [`Server DB/negozio.sql`](Server%20DB/negozio.sql) (esportato con phpMyAdmin da MariaDB 10.1 e PHP 5.6) crea il
database **`negozio`** con queste tabelle:

| Tabella | Contenuto |
|---|---|
| `clienti` | anagrafica, numero carta, username, password e hash MD5 |
| `reparto` | i 5 reparti del negozio |
| `prodotti` | descrizione, prezzo, URL dell'immagine e reparto di appartenenza |
| `ordine` | data dell'ordine e cliente |
| `righeordine` | quantità, totale spesa, prodotto e ordine (con chiavi esterne verso `ordine` e `prodotti`) |
| `hacker` | log dei tentativi di login con caratteri non ammessi |

## 📁 Struttura del progetto

```
eCommerce/
├── Home.html                 # pagina di login (punto di ingresso)
├── registra.html             # form di registrazione
├── controllologin.php        # verifica credenziali, avvio sessione, log tentativi sospetti
├── controlloreg.php          # inserimento nuovo cliente
├── account_personale.php     # menu dell'area riservata
├── Ordina.php                # scelta del reparto
├── scelta_prodotto.php       # elenco prodotti del reparto e scelta quantità
├── registraprod.php          # salvataggio ordine e riepilogo
├── lista_acq.php             # storico acquisti del cliente
├── dati_acc.php              # dati personali del cliente
├── logout.php                # chiusura sessione
├── CssHome.css               # foglio di stile
├── *.png / *.jpg / *.gif     # immagini di sfondo delle pagine
├── prodotti/                 # immagini dei 20 prodotti del catalogo
└── Server DB/
    └── negozio.sql           # dump del database
```

## ▶️ Come eseguire

Il codice usa l'estensione `mysql_*` di PHP, rimossa da PHP 7. Serve quindi un ambiente con **PHP 5.x**, per esempio una
versione di **XAMPP** con PHP 5.6.

1. **Copia i file nella root di `htdocs`.** Pagine e immagini usano URL assoluti come `http://localhost/controllologin.php`
   e `http://localhost/prodotti/s8.jpg`, quindi il contenuto del repository va messo direttamente in
   `C:\xampp\htdocs\`, non in una sottocartella.
2. **Avvia Apache e MySQL** dal pannello di controllo di XAMPP.
3. **Importa il database.** Da phpMyAdmin (`http://localhost/phpmyadmin`) crea un database chiamato `negozio` e importa
   `Server DB/negozio.sql`. In alternativa, da riga di comando:
   ```bash
   mysql -u root -e "CREATE DATABASE negozio"
   mysql -u root negozio < "Server DB/negozio.sql"
   ```
4. **Apri il sito** su [`http://localhost/Home.html`](http://localhost/Home.html).

La connessione al database è `mysql_connect("localhost")`, senza utente e password espliciti: vengono usati i valori
predefiniti di PHP/MySQL. Nell'installazione standard di XAMPP (utente `root` senza password) funziona senza modifiche.

Il dump contiene già un utente di prova: **username `Zizzari`, password `1234`**. In alternativa puoi registrarne uno
nuovo da _"Non sei registrato? Registrati!"_.

## 🖼️ Grafica delle pagine

Il repository non contiene screenshot dell'applicazione in funzione. Queste sono le illustrazioni usate come sfondo
delle pagine:

| Login | Area personale | Ordina / catalogo |
|:---:|:---:|:---:|
| <img src="home1.png" width="250" alt="Sfondo login"> | <img src="account_personale.png" width="250" alt="Sfondo area personale"> | <img src="ordina.png" width="250" alt="Sfondo ordina"> |

## ⚠️ Note

È un progetto didattico del 2018 e il codice riflette quel contesto. Non va usato in produzione così com'è:

- l'estensione `mysql_*` è deprecata e non esiste più nelle versioni moderne di PHP;
- oltre all'hash MD5 la password viene salvata anche in chiaro nella tabella `clienti`;
- l'escape dell'input è applicato solo nel login, non nelle altre query.

## 👤 Autore

**Antonio Zizzari**, [@Antonio-Zizzari](https://github.com/Antonio-Zizzari)
