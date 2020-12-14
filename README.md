# Képmegosztó

A program egy kezdetleges képmegosztó weboldalt reprezentál, amely 5 fő funkciót lát el.

**1. A felhasználói fiók kezelése:**
A weboldal használatához szükség van egy felhasználói fiókra.
A fiók elkészítéséhez a következő adatokat kell megadnunk:
* **Felhasználónév**
* **Email cím**
* **Jelszó**
* **Adatvédelmi szabályzat elfogadása**

A fiók elkészítése után a felhasználó automatikusan átkerül a bejelentkezői felületre, ahol a következő adatokat kell megadnunk:
* **Felhasználónév**
* **Jelszó**

Bejelentkezés után a felhasználó automatikusan átkerül a fő oldalra, ahol elérhetővé válnak számára a fő funkciók.

**2. A fénykép feltöltés:**
Fényképeket tudunk feltölteni, amelynek kötelezően meg kell felelnie néhány követelménynek:
* **JPEG, PGN típusú fájl**
* **Maximum 1MB méret**

**3. A feltöltött képek listázása:**
A feltöltött fényképek egy részét megjelenítjük a felhasználó számára, majd a felhasználó a `további képek betöltése` gombbal további, adott számú képet tud megjeleníteni.

A feltöltött fényképeknél szűrési lehetőség is adott.
Ezek a következőek:
* **Összes fénykép megtekintése**
* **Saját fényképek megtekintése** (alapértelmezett, fő oldal)

A feltöltött fényképeket dátum szerint rendezhetőek is. 
Ezen belül kétféleképpen lehetséges:
* **Legújabban feltöltött**
* **Legrégebben feltöltött**

**4. A reagálás:**
A föltöltött fényképekre a felhasználó reagálni tud.
Ez kétféleképpen valósulhat meg:
* **Like**
* **Hozzászólás**

**5. A felhasználói fiókhoz tartozó adatok módosítása:**
Fiokhóz tartozó adatokat tudjuk módosítani.
Ehhez a következő adatokat kell megadnunk:
 * **Email cím**
 * **Új jelszó**
 * **Régi jelszó megerősítése**

# A program használatához szükséges programok

A program futtatásához a `XAMPP 7.4.11` verziója szükséges!
A `XAMPP` applikációban az `APACHE` és a `MYSQL` elindítására is szükségünk van.

# Használati útmutató
A program futtatásához szükséges elhelyezni a fájl tartalmát a `XAMPP/htdocs` mappában.

A program megfelelő mükődéséhez importálni kell a `phpMyAdmin` felületén az adatbázist. 
A `phpMyAdmin` elérhető a `XAMPP` applikációban az `Admin` fülre kattintva.
Az importáláshoz szükséges sql script:
https://github.com/bdavid01/ImageSharing/blob/master/sql/image_sharing.sql

A folyamatok elvégzése után a következő oldalon érhető el a weboldal:
`http://localhost/ImageSharing/login/login.php`

# Felhasznált technológiák
* **JQuery 3.5.1**
* **JavaScript**
* **HTML5**
* **CSS**
* **Bootstrap 4.5.3**
* **PHP 5.2.0**