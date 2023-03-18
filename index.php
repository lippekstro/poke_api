<?php
require_once "cabecalho.php";

$base2 = "https://pokeapi.co/api/v2/pokemon-form/";
for ($i = 1; $i <= 21; $i++) {
    $data = file_get_contents($base2 . $i . '/');
    $poke[$i] = json_decode($data);
}

?>

<h1>Pokédex</h1>
<div class="container-cards">
    <?php foreach ($poke as $p) : ?>
        <a href="detalhes.php?nome=<?= $p->name ?>">
            <div class="card" style="background-color: <?= $tipos[$p->types[0]->type->name] ?>;">
                <div class="img-container">
                    <img src="<?= $p->sprites->front_default ?>" alt="<?= $p->name ?>">
                </div>
                <div class="icone-tipo">
                    <img src="<?= $icones_tipos[$p->types[0]->type->name] ?>" alt="<?= $p->name ?>">
                </div>
                <div class="container">
                    <p>
                        <?= $p->name ?>
                    </p>
                </div>
            </div>
        </a>
    <?php endforeach; ?>
</div>

<?php
require_once "rodape.php";
?>