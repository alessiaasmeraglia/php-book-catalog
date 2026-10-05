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
    return htmlspecialchars($testo, ENT_QUOTES | ENT_SUBSTITUTE, "UTF-8");
}
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

        <p>Libri nel catalogo: <?= count($libri) ?></p>

        <?php foreach ($libri as $libro): ?>
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
    </main>
</body>
</html>