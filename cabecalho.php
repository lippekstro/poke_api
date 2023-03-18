<?php
require_once "vendor/autoload.php";
$tipos = array(
    "normal" => "#A8A77A",
    "fire" => "#EE8130",
    "water" => "#6390F0",
    "grass" => "#7AC74C",
    "electric" => "#F7D02C",
    "ice" => "#96D9D6",
    "fighting" => "#C22E28",
    "poison" => "#A33EA1",
    "ground" => "#E2BF65",
    "flying" => "#A98FF3",
    "psychic" => "#F95587",
    "bug" => "#A6B91A",
    "rock" => "#B6A136",
    "ghost" => "#735797",
    "dark" => "#705746",
    "dragon" => "#6F35FC",
    "steel" => "#B7B7CE",
    "fairy" => "#D685AD"
);
$icones_tipos = array(
    "normal" => "imgs/normal.png",
    "fire" => "imgs/fogo.png",
    "water" => "imgs/agua.png",
    "grass" => "imgs/grama.png",
    "electric" => "imgs/eletrico.png",
    "ice" => "imgs/gelo.png",
    "fighting" => "imgs/lutador.png",
    "poison" => "imgs/veneno.png",
    "ground" => "imgs/terrestre.png",
    "flying" => "imgs/voador.png",
    "psychic" => "imgs/psiquico.png",
    "bug" => "imgs/inseto.png",
    "rock" => "imgs/pedra.png",
    "ghost" => "imgs/fantasma.png",
    "dark" => "imgs/escuridao.png",
    "dragon" => "imgs/dragao.png",
    "steel" => "imgs/aco.png",
    "fairy" => "imgs/fada.png"
)

?>


<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokemons Api</title>
    <link rel="shortcut icon" href="imgs/pokedex.webp" type="image/x-icon">

    <link rel="stylesheet" href="style.css">
    <script src="script.js" defer></script>
</head>

<body>
    <header>
        <nav>
            <a href="index.php">Inicio</a>
        </nav>
    </header>

    <form action="detalhes.php" method="get" autocomplete="off">
        <div class="campo-busca">
            <input type="search" name="nome" id="nome" required>
            <button type="submit">Buscar</button>
        </div>
    </form>