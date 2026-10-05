<?php

function e(string $testo): string
{
    return htmlspecialchars(
        $testo,
        ENT_QUOTES | ENT_SUBSTITUTE,
        "UTF-8"
    );
}