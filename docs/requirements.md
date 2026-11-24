# Specificarea cerințelor aplicației TaskFlow

## 1. Date generale

Student: Vicicu Viorel
Grupa: IT2501
Varianta: 15
Disciplina: Programare Web II

## 2. Actorii sistemului

### Administrator

- Gestionează utilizatorii.
- Administrează rolurile.
- Monitorizează activitatea sistemului.
- Gestionează proiectele și echipele.

### Manager de proiect

- Creează și modifică proiectele.
- Organizează echipele.
- Repartizează sarcinile.
- Definește dependențele.
- Analizează drumul critic.
- Consultă rapoartele de pontaj.

### Membru al echipei

- Vizualizează sarcinile atribuite.
- Actualizează starea sarcinilor.
- Înregistrează orele lucrate.
- Adaugă comentarii și atașamente.

## 3. Cerințe funcționale

CF01 - Înregistrarea utilizatorilor.
CF02 - Autentificarea și deconectarea.
CF03 - Gestionarea rolurilor și accesului.
CF04 - Gestionarea proiectelor.
CF05 - Gestionarea echipelor.
CF06 - Gestionarea sarcinilor.
CF07 - Panou Kanban drag-and-drop prin fetch.
CF08 - Gestionarea dependențelor dintre sarcini.
CF09 - Înregistrarea și gestionarea pontajului.
CF10 - Calcularea drumului critic CPM.
CF11 - Compararea efortului planificat și realizat.
CF12 - Gestionarea comentariilor.
CF13 - Încărcarea securizată a atașamentelor.
CF14 - Importul și exportul CSV sau JSON.
CF15 - Căutare, filtrare, sortare și paginare.
CF16 - API REST cu autentificare prin token.
CF17 - Integrarea unui API extern prin cURL.
CF18 - Opțiunea securizată Ține-mă minte.

## 4. Cerințe nefuncționale

CN01 - PHP 8.4 sau mai nou; PHP 8.5 local.
CN02 - Composer și autoîncărcare PSR-4.
CN03 - Respectarea standardului PSR-12.
CN04 - Arhitectură MVC și Repository.
CN05 - MySQL sau MariaDB cu minimum 13 tabele.
CN06 - PDO și instrucțiuni pregătite.
CN07 - Protecție CSRF și antete de securitate.
CN08 - Parole protejate prin password_hash.
CN09 - Secrete păstrate în fișierul .env.
CN10 - Interfață responsive și ușor de utilizat.
CN11 - Minimum 25 teste PHPUnit.
CN12 - Minimum 20 commit-uri distribuite în timp.
CN13 - API REST cu minimum 5 endpoint-uri.
CN14 - Audit OWASP Top 10:2025.
CN15 - Publicarea aplicației.
CN16 - Validare, repopulare și ciclul PRG.
CN17 - Utilizarea facilităților POO moderne.
CN18 - Migrări, chei străine și tranzacții.
CN19 - Limitarea încercărilor de autentificare.
CN20 - Jurnalizarea erorilor și excepții proprii.
CN21 - Front controller și rutare cu parametri.

## 5. Tabele planificate

1. utilizatori
2. roluri
3. proiecte
4. echipe
5. membri_echipe
6. proiecte_echipe
7. sarcini
8. dependente
9. pontaje
10. comentarii
11. atasamente
12. remember_tokens
13. api_tokens
14. login_attempts
15. audit_logs

## 6. Stările sarcinilor

- De realizat (To Do)
- În progres (In Progress)
- În verificare (Review)
- Finalizat (Done)

## 7. Concluzie

Am stabilit cerințele funcționale și
nefuncționale ale aplicației TaskFlow.

Aceste cerințe vor reprezenta baza
implementării în etapele următoare.