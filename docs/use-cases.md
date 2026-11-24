# Cazurile de utilizare - TaskFlow

## UC01 - Autentificarea

Actor: Utilizator
Precondiție: Utilizatorul are un cont.

1. Utilizatorul introduce emailul și parola.
2. Sistemul validează datele.
3. Sistemul verifică parola.
4. Utilizatorul este redirecționat la dashboard.

Alternativă: Datele incorecte generează un mesaj
de eroare.

## UC02 - Crearea unui proiect

Actor: Manager de proiect

1. Managerul deschide formularul.
2. Introduce denumirea și perioada proiectului.
3. Sistemul validează datele.
4. Proiectul este salvat în baza de date.

## UC03 - Crearea unei echipe

Actor: Manager de proiect

1. Managerul introduce denumirea echipei.
2. Selectează membrii.
3. Sistemul salvează echipa.

## UC04 - Repartizarea unei sarcini

Actor: Manager de proiect

1. Managerul selectează proiectul.
2. Introduce datele sarcinii.
3. Selectează responsabilul.
4. Stabilește durata și termenul.
5. Sistemul salvează sarcina.

## UC05 - Actualizarea panoului Kanban

Actor: Membru al echipei

1. Membrul selectează o sarcină autorizată.
2. Mută cardul într-o altă coloană.
3. Sistemul trimite cererea prin fetch.
4. Serverul validează accesul și starea.
5. Noua stare este salvată.

## UC06 - Înregistrarea pontajului

Actor: Membru al echipei

1. Membrul selectează sarcina.
2. Introduce data și orele lucrate.
3. Sistemul validează valorile.
4. Pontajul este salvat.

## UC07 - Calcularea drumului critic

Actor: Manager de proiect

1. Managerul selectează proiectul.
2. Sistemul preia sarcinile și dependențele.
3. Sistemul verifică existența ciclurilor.
4. Sistemul aplică algoritmul CPM.
5. Sunt afișate durata și sarcinile critice.

## UC08 - Generarea raportului

Actor: Manager de proiect

1. Managerul selectează proiectul.
2. Sistemul calculează efortul planificat.
3. Sistemul calculează efortul realizat.
4. Sunt afișate abaterile și procentele.

## UC09 - Administrarea utilizatorilor

Actor: Administrator

1. Administratorul consultă utilizatorii.
2. Selectează contul dorit.
3. Modifică rolul sau starea contului.
4. Sistemul salvează modificările.

## UC10 - Adăugarea comentariilor

Actor: Membru al echipei

1. Membrul deschide o sarcină autorizată.
2. Introduce comentariul.
3. Sistemul validează conținutul.
4. Comentariul este salvat.