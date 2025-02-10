
<h2>Laravel Admin CMS Portal</h2>

<h3>Opis</h3>
<p>Ovaj projekt predstavlja Laravel Admin CMS za portal koji se sastoji od <strong>korisnika</strong>, <strong>proizvoda</strong>, <strong>kategorija</strong> i <strong>komentara</strong>. CMS omogućava administraciju tih entiteta, dok frontend omogućava korisnicima dodavanje komentara uz ocjene bez potrebe za registracijom.</p>

<h3>Funkcionalnosti</h3>

<h4>Admin CMS</h4>
<ul>
  <li><strong>Login funkcionalnost</strong>: Admini i moderatori mogu se prijaviti u Admin CMS koristeći Laravel autentifikaciju.</li>
  <li><strong>Korisnici i Rola</strong>: Admini mogu kreirati nove korisnike sa rolama (admin, moderator).</li>
  <li><strong>Kategorije</strong>: Admini mogu dodavati, uređivati i brisati kategorije. Kategorije mogu imati do 3 nivoa dubine.</li>
  <li><strong>Proizvodi</strong>: Admini mogu dodavati, uređivati i brisati proizvode. Proizvodi mogu imati više slika sa mogućnošću označavanja glavne slike. Svaki proizvod može imati jednu ili više kategorija, opis i cijenu.</li>
  <li><strong>Komentari</strong>: Admini i moderatori mogu uređivati i brisati komentare. Komentari mogu imati ocjenu i tekst.</li>
</ul>

<h4>Frontend i REST API</h4>
<ul>
  <li><strong>REST API Endpoint-ovi</strong>:
    <ul>
      <li>GET /categories: Prikaz svih kategorija.</li>
      <li>GET /categories/{id}: Prikaz pojedinačne kategorije.</li>
      <li>GET /products: Prikaz svih proizvoda.</li>
      <li>GET /products/{id}: Prikaz pojedinačnog proizvoda.</li>
      <li>POST /comments: Dodavanje komentara uz ocjenu.</li>
    </ul>
  </li>
  <li><strong>Rola Admin</strong>: Admin ima potpunu kontrolu nad svim entitetima.</li>
  <li><strong>Rola Moderator</strong>: Moderator može samo uređivati i brisati komentare.</li>
</ul>

<hr>

<h3>Upute za Pokretanje</h3>

<h4>Preduvjeti</h4>
<ol>
  <li><strong>Instalacija PHP-a</strong>: Laravel zahtijeva <strong>PHP 8.0 ili noviji</strong>.</li>
  <li><strong>Instalacija Composer-a</strong>: Trebaš imati instaliran Composer za instalaciju Laravel zavisnosti.</li>
</ol>

<h4>Instalacija</h4>
<ol>
  <li><strong>Kloniraj repozitorij</strong>:

    git clone https://github.com/your-username/your-repository.git
cd your-repository
  </li>
  <li><strong>Instaliraj zavisnosti</strong>:

    composer install
  </li>
  <li><strong>Postavi .env datoteku</strong>:

    Kopiraj .env.example u .env datoteku:

    cp .env.example .env
  </li>
  <li><strong>Generiraj aplikacijski ključ</strong>:

    php artisan key:generate
  </li>
  <li><strong>Postavi bazu podataka</strong>:

    Provjeri .env datoteku i postavi parametre za bazu podataka:

    DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=ime_baze
DB_USERNAME=root
DB_PASSWORD=
  </li>
  <li><strong>Migriraj bazu podataka</strong>:

    Pokreni migracije za stvaranje potrebnih tabela:

    php artisan migrate
  </li>

  <li><strong> Pokreni seeder baze podataka</strong>:

   U UserSeederu pronađi email i password korsnika za incijalnu prijavu
   
   php artisan db:seed
    
  </li>
  <li><strong>Pokreni razvojni server</strong>:

    Da bi pokrenuo aplikaciju na svom računaru, koristi:

    php artisan serve

    Posjeti aplikaciju na [http://localhost:8000](http://localhost:8000).
  </li>
</ol>

<hr>

<h3>Razvoj</h3>

<h4>Dodavanje Novih Proizvoda</h4>
<ol>
  <li>Proizvodi se mogu dodavati putem Admin CMS-a.</li>
  <li>Svaki proizvod treba imati naziv, opis, cijenu, i može biti dodan u jednu ili više kategorija.</li>
  <li>Admini mogu dodavati slike proizvoda i označiti glavnu sliku.</li>
</ol>

<h4>Upravljanje Kategorijama</h4>
<ul>
  <li>Kategorije su hijerarhijski organizovane i mogu imati do 3 nivoa dubine.</li>
  <li>Admin može dodavati, uređivati i brisati kategorije putem Admin CMS-a.</li>
</ul>

<h4>Komentari</h4>
<ul>
  <li>Korisnici mogu dodavati komentare uz ocjenu za proizvode putem frontend interfejsa.</li>
  <li>Moderatori i admini mogu uređivati i brisati komentare putem Admin CMS-a.</li>
</ul>

<hr>

<h3>Tehnologije</h3>
<ul>
  <li><strong>Laravel</strong>: PHP framework za izradu web aplikacija.</li>
  <li><strong>MySQL</strong>: Relacijska baza podataka za pohranu podataka.</li>
  <li><strong>Composer</strong>: Alat za upravljanje PHP paketima i zavisnostima.</li>
  <li><strong>REST API</strong>: Omogućava interakciju s podacima putem HTTP metoda (GET, POST).</li>
</ul>

<hr>

<h3>Zaključak</h3>
<p>Ovaj projekt je jednostavan CMS za upravljanje portalom koji omogućava osnovnu administraciju proizvoda, kategorija i komentara. Također, omogućava filtriranje proizvoda i dodavanje komentara bez potrebe za registracijom.</p>
