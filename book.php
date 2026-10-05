<?php

require_once __DIR__ . "/books.php";
require_once __DIR__ . "/helpers.php";

$id = filter_input(
    INPUT_GET,
    "id",
    FILTER_VALIDATE_INT,
    ["options" => ["min_range" => 1]]
);

$libroSelezionato = null;
$messaggio = "";

if ($id === false || $id === null) {
    http_response_code(400);
    $messaggio = "L’identificativo del libro non è valido.";
} else {
    foreach ($libri as $libro) {
        if ($libro["id"] === $id) {
            $libroSelezionato = $libro;
            break;
        }
    }

    if ($libroSelezionato === null) {
        http_response_code(404);
        $messaggio = "Il libro richiesto non è presente nel catalogo.";
    }
}

$titoloPagina = $libroSelezionato !== null
    ? $libroSelezionato["titolo"]
    : "Libro non disponibile";
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= e($titoloPagina) ?> — Catalogo libri</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main>
        <p>
            <a href="index.php">← Torna al catalogo</a>
        </p>

        <?php if ($libroSelezionato !== null): ?>
            <article class="book-card">
                <h1><?= e($libroSelezionato["titolo"]) ?></h1>

                <p>
                    <strong>Autore:</strong>
                    <?= e($libroSelezionato["autore"]) ?>
                </p>

                <p>
                    <strong>Genere:</strong>
                    <?= e($libroSelezionato["genere"]) ?>
                </p>

                <p>
                    <strong>Anno:</strong>
                    <?= $libroSelezionato["anno"] ?>
                </p>
            </article>
        <?php else: ?>
            <h1><?= e($titoloPagina) ?></h1>
            <p><?= e($messaggio) ?></p>
        <?php endif; ?>
    </main>
</body>
</html>