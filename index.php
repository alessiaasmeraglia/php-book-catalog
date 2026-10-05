<?php
$titolo = "Il mio catalogo di libri";

$libri = [
    [
        "titolo" => "Il piccolo principe",
        "autore" => "Antoine de Saint-Exupéry",
        "genere" => "Narrativa",
        "anno" => 1943,
    ],
    [
        "titolo" => "1984",
        "autore" => "George Orwell",
        "genere" => "Distopia",
        "anno" => 1949,
    ],
    [
        "titolo" => "Siddharta",
        "autore" => "Hermann Hesse",
        "genere" => "Romanzo",
        "anno" => 1922,
    ],
];

function e(string $testo): string
{
    return htmlspecialchars(
        $testo, 
        ENT_QUOTES | ENT_SUBSTITUTE, 
        "UTF-8"
    );
}

$ricerca = $_GET["q"] ?? "";

if (!is_string($ricerca)) {
    $ricerca = "";
}

$ricerca = trim($ricerca);

$libriFiltrati = array_filter(
        $libri,
        function (array $libro) use ($ricerca): bool {
            return $ricerca === ""
                || stripos($libro["titolo"], $ricerca) !== false;
        }
    );
?>



<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= e($titolo) ?></title>
</head>
    <body>
        <main>
            <h1><?= e($titolo) ?></h1>

            <form method="get" action="index.php">
                <label for="ricerca">Cerca un libro</label>

                <input
                    type="search"
                    id="ricerca"
                    name="q"
                    placeholder="Scrivi un titolo"
                    value="<?= e($ricerca) ?>"
                >

                <button type="submit">Cerca</button>
                <a href="index.php">Mostra tutti</a>
            </form>

            <p>
                Libri trovati: <?= count($libriFiltrati) ?>
                su <?= count($libri) ?>
            </p>

            <?php if (count($libriFiltrati) === 0): ?>
                <p>Nessun libro trovato. Prova con un altro titolo.</p>
            <?php else: ?>
                <?php foreach ($libriFiltrati as $libro): ?>
                    <article>
                        <h2><?= e($libro["titolo"]) ?></h2>

                        <p>
                            <strong>Autore:</strong>
                            <?= e($libro["autore"]) ?>
                        </p>

                        <p>
                            <strong>Genere:</strong>
                            <?= e($libro["genere"]) ?>
                        </p>

                        <p>
                            <strong>Anno:</strong>
                            <?= $libro["anno"] ?>
                        </p>
                    </article>
                <?php endforeach; ?>
            <?php endif; ?>
        </main>
    </body>
</html>