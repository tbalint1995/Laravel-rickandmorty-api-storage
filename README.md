> [!NOTE]
> Az alkalmazás egy publikusan elérhető API-ról lekérdezi a Rick and Morty sorozat epizódjait és
karaktereit, eltárolja azokat és megjeleníti a mentett adatokat.

> [!IMPORTANT]
> Időráfordítás

:speaking_head:

1. APIController folyamatok, adatbázis: 4.5 óra
- Az APIController létrehozása és konfigurálása.
- Adatok letöltése külső API-ból és mentése az adatbázisba.

2. Nézet, javascript: 2 óra
- Nézetek kialakítása és frontend kód írása.
- Javascript funkciók hozzáadása az oldalakhoz.

3. Lapozás, rendezés, tesztelés: 4 óra
- Lapozás és rendezés funkcióinak implementálása.
- Alapos tesztelés a projekt működésének ellenőrzésére.

4. Kereső kb 2 óra
- Kereső funkció kialakítása az alkalmazásban.

-------------------------------------------------------------------------------------------------------------

> [!NOTE]
> Laravel Projekt Letöltése GitHubról

1. Git telepítése: Telepítse a Git verziókezelőt, ha még nincs telepítve a gépén.

2. Projekt klónozása: Nyissa meg a parancssor/terminált, majd navigáljon a projekt letöltéséhez kívánt mappába.

3. Composer telepítése: Navigáljon a projekt mappájába, majd telepítse a Laravel függőségeit Composer segítségével.

4. .env fájl beállítása: Hozzon létre egy másolatot a .env.example fájlból az .env néven.
Nyissa meg a .env fájlt és állítsa be az adatbázis és egyéb környezeti változókat.

5. Alkalmazás kulcs generálása: Generálja le az alkalmazás kulcsát.

6. Én személy szerint az adatbázis kapcsolathoz Laragon szervert használtam. De bármi más is használható.

7. Adatbázis migráció és magvetés: Migrálja az adatbázist és vegye fel az alapvető adatokat.

8. Szerver indítása: Indítsa el a Laravel beépített fejlesztői szerverét.

9. _"Sync list"_ megnyomása után meg kell várni, amíg a szinkronizálás befejeződik. 
Majd ezután tudunk az időpontok között _keresgélni_, azokat _törölni_, illetve a _karakterek funkció_ elérésével különböző karakterekhez fűzött értékeket láthatjuk.