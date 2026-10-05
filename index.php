<?php
$titolo = "Il mio catalogo di libri";

$libri = [
    "Il piccolo principe",
    "1984",
    "Siddharta",
];
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $titolo ?></title>
</head>
<body>
    <h1><?= $titolo ?></h1>

    <p>Libri nel catalogo: <?= count($libri) ?></p>

    <ul>
        <?php foreach ($libri as $libro): ?>
            <li><?= htmlspecialchars($libro, ENT_QUOTES, "UTF-8") ?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>