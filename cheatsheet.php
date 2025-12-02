<?php
/**
 * PHP Cheat Sheet pro Visual Studio Code
 * 
 * Jak používat:
 * 1. Otevři tento soubor ve Visual Studio Code
 * 2. Nainstaluj extension "PHP Intelephense" – krásně ti zvýrazní kód i komentáře
 * 3. Spusť přes XAMPP / Laragon / nebo php -S localhost:8000
 * 4. Všechny otázky zodpovíš jen z komentářů vedle kódu (žádné samostatné sekce)
 * 5. Každý příklad je plně funkční – můžeš ho hned vyzkoušet
 * 
 * Tip: Použij Ctrl + klik na sekci pro rychlé složení/rozložení komentářů
 */

echo "<pre style='font-family: Consolas; font-size: 16px; line-height: 1.6;'>";
echo "<h1>PHP Cheat Sheet – praktické příklady s komentáři vedle kódu</h1>\n\n";

// ======================================================
// Webový server a PHP
// ======================================================
echo "Toto vidíš, protože PHP běží přes webový server!";   // Rozdíl mezi spuštěním v konzoli a skrze server:
                                                          // Konzole: php soubor.php → výstup do terminálu, žádné $_GET/$_POST
                                                          // Server: http://localhost/soubor.php → máš $_GET, $_POST, HTTP headery, HTML výstup
                                                          // Co je webový server? Apache (sám), XAMPP/WAMP = Apache + MySQL + PHP v jednom balíčku pro lokální vývoj
                                                          // Jaký soubor konfiguruje PHP? php.ini (např. C:\xampp\php\php.ini) – nastavuje chyby, limity uploadu atd.
                                                          // Jak vkládáme PHP do HTML? <?php kód ?> nebo <?= výraz ?> přímo mezi HTML tagy

// ======================================================
// Proměnné a syntaxe
// ======================================================
$jmeno = "Anna";               // Deklarace proměnných: vždy začínají $, žádný typ není potřeba
$vek   = 25;                   // Změna hodnot: základní operátory
$vek += 5;                     // +=  → $vek je teď 30
$vek++;                        // ++   → $vek je teď 31
$cena  = 199.90;               // Základní typy: string, integer, float
$isStudent = true;             // boolean
$pole = [];                    // složitější typ: array
$objekt = new stdClass();      // složitější typ: object
echo "$jmeno má $vek let\n";   // Vypisování typů:
                               // gettype($vek) → "integer"
                               // var_dump($vek) → int(31)  (podrobné info)
                               // Kód teče shora dolů, větvíme ho podmínkami a cykly

// ======================================================
// Datové typy a přetypování (casting)
// ======================================================
$text = "42";                  // string
$cislo = (int)$text;           // Přetypování (casting) na integer → $cislo je teď 42 (typ integer)
$desetinne = (float)"3.14";    // Přetypování na float
$pravda = (bool)1;             // Přetypování na boolean → true
echo "Přetypováno: $cislo\n";  // PHP automaticky přetypovává, ale ruční casting je bezpečnější

// ======================================================
// Podmínky + Operátory
// ======================================================
if ($vek < 13) {                          // Struktura if
    echo "Dítě\n";
} elseif ($vek < 18) {                    // elseif
    echo "Teenager\n";
} else {                                  // else
    echo "Dospělý\n";
}                                         // switch příklad:
$barva = "zelená";                        // 
switch ($barva) {                         // 
    case "červená": echo "STOP\n"; break; // 
    case "zelená":  echo "JEĎ\n";  break; // 
    default:        echo "Čekej\n";       // 
}                                         // Logické operátory: && (and), || (or)
                                          // Porovnávací: <= >= == === != !==
$a = 10; $b = "10";                       // Operátory +, -, *, /, %, ., &&, ||, <=, >=
echo $a + 5 . "\n";                       // + → 15
echo $a == $b ? "== rovné\n" : "";        // == porovnává hodnotu (true)
echo $a === $b ? "" : "=== nerovné\n";    // === porovnává hodnotu + typ (false)
                                          // Rozdíl == a = : = je přiřazení, == je porovnání

// ======================================================
// Pole
// ======================================================
$ovoce = ["jablko", "hruška", "banán"];   // Indexované pole – inicializace a indexování
$ovoce[] = "pomeranč";                    // Přidání na konec
echo $ovoce[1] . "\n";                    // Výběr z pole → hruška (index 1)
                                          // Procházení for:
for ($i = 0; $i < count($ovoce); $i++) {  // 
    echo "for: " . $ovoce[$i] . "\n";     // 
}                                         // Procházení foreach:
foreach ($ovoce as $o) {                  // 
    echo "foreach: $o\n";                 // 
}                                         // Asociativní (jmenná) pole:
$uzivatel = [                             // 
    "jmeno" => "Petr",                    // 
    "vek"   => 30,                        // 
    "mesto" => "Praha"                    // 
];                                        // 
echo $uzivatel["mesto"] . "\n";           // Přístup přes klíč → Praha

// ======================================================
// Cyklus
// ======================================================
echo "Sudá čísla 0-20:\n";                      // Rozdíly: for = známý počet, while = dokud podmínka,
for ($i = 0; $i <= 20; $i += 2) echo "$i ";    // foreach = jen pro pole
echo "\nNásobky 3 do 30:\n";                    // Nekonečný cyklus = podmínka nikdy false
$i = 3;                                         // (např. while(true) bez break)
while ($i <= 30) {                              // 
    echo "$i ";                                 // 
    $i += 3;                                    // 
}                                               // 
echo "\n2D trojúhelník:\n";                     // 
for ($radek = 1; $radek <= 5; $radek++) {       // 
    for ($hv = 1; $hv <= $radek; $hv++) {       // 
        echo "* ";                              // 
    }                                           // 
    echo "\n";                                  // 
}

// ======================================================
// Funkce
// ======================================================
function pozdrav($jmeno, $vek = 20) {     // Definice funkce, vstupní parametry (attributy)
    return "Ahoj $jmeno, je ti $vek let.\n"; // return = výstup funkce
}                                         // Využití: opakovaně voláme stejný kód
echo pozdrav("Karel");                    // výchozí věk 20
echo pozdrav("Lucie", 35);                // přepsaný věk

// ======================================================
// Vestavěné funkce
// ======================================================
$text = "  Ahoj světe!  ";                     // 3 aplikované vestavěné funkce
echo trim($text) . "\n";                       // trim() – odstraní mezery z kraje
echo strlen($text) . "\n";                     // strlen() – délka řetězce (z hlavy)
$poleF = explode(" ", trim($text));            // explode() – rozdělí řetězec na pole
echo count($poleF) . "\n";                     // count() – počet prvků v poli (z hlavy)
                                               // Další na https://www.w3schools.com/php/php_ref_overview.asp

// ======================================================
// GIT vs GitHub
// ======================================================
echo "GIT = lokální správa verzí, GitHub = web pro sdílení\n";
                                          // git init → vytvoří repozitář
                                          // git add . → přidá změny
                                          // git commit -m \"popis\" → uloží změny
                                          // Merge konflikty = dva lidé upravili stejný řádek jinak
                                          // CI/CD = automatické testování a nasazování (GitHub Actions)

// ======================================================
// HTML a Formuláře
// ======================================================
?>                                        <!-- HTML základ: tagy <tag>obsah</tag> -->
<form method="post" action="">            <!-- Formulář odesílá data do PHP -->
    Jméno: <input type="text" name="jmeno"><br><br>
    Věk: <input type="number" name="vek"><br><br>
    <button type="submit" name="odeslat">Odeslat</button>
</form>
<a href="?jmeno=Tomáš&vek=25">GET příklad (klikni)</a><br><br>
<?php
                                          // $_GET = data v URL (viditelné), $_POST = skrytá data
if (isset($_POST["odeslat"])) {           // isset() kontroluje existenci
    $jmeno = $_POST["jmeno"] ?? "";       // Validace:
    $vek   = $_POST["vek"] ?? 0;          // porovnání == <= >=, empty(), is_numeric()
    if ($jmeno !== "" && is_numeric($vek) && $vek >= 0 && $vek <= 150) {
        echo "POST: Ahoj $jmeno, je ti $vek let.\n";
    } else {
        echo "Chyba ve validaci!\n";
    }
}
if (!empty($_GET)) {                      // GET příklad
    $jmeno = $_GET["jmeno"] ?? "";
    $vek   = $_GET["vek"] ?? "";
    echo "GET: Ahoj $jmeno, je ti $vek let.\n";
}

// ======================================================
// Práce se soubory (TXT, CSV, XML)
// ======================================================
file_put_contents("pokus.txt", "Ahoj z PHP!\nDnes: " . date("d.m.Y"));  // file_put_contents() – zápis do TXT
echo file_get_contents("pokus.txt") . "\n";                            // file_get_contents() – čtení TXT

$csv = "Jan,30,Praha\nPetr,25,Brno";                                   // CSV příklad
file_put_contents("uzivatele.csv", $csv);                              // 
$radky = file("uzivatele.csv");                                        // 
foreach ($radky as $r) {                                               // 
    list($jmeno, $vek, $mesto) = str_getcsv($r);                       // 
    echo "$jmeno ($vek) – $mesto\n";                                   // 
}                                                                      // 

$xml = "<uzivatele><osoba>Anna</osoba></uzivatele>";                   // XML příklad
file_put_contents("data.xml", $xml);                                   // 
$xmlObj = simplexml_load_file("data.xml");                             // 
echo "XML hodnota: " . $xmlObj->osoba . "\n";                           // 

echo "\nHotovo! Vše funguje – stačí aktualizovat stránku a vyzkoušet formulář.";
echo "</pre>";
?>