<?php
require_once "cabecalho.php";

use Stichoza\GoogleTranslate\GoogleTranslate;

$nome = strtolower($_GET['nome']);
$base = "https://pokeapi.co/api/v2/pokemon-species/" . $nome;
$data = file_get_contents($base);
if (!$data) {
    header("Location: index.php");
    setcookie("notfound", true);
}
$poke = json_decode($data);

$base2 = "https://pokeapi.co/api/v2/pokemon-form/" . $nome;
$data2 = file_get_contents($base2);
$poke2 = json_decode($data2);

$tr = new GoogleTranslate();
$tr->setSource('en');
$tr->setTarget('pt-BR');
$texto = $tr->translate($poke->flavor_text_entries[6]->flavor_text);

?>

<?php if ($data && $data2) : ?>
    <h1><?= $nome ?></h1>
    <div class="container-cards">
        <div class="cardh" style="background-color: <?= $tipos[$poke2->types[0]->type->name] ?>;">
            <div class="img-container">
                <img src="<?= $poke2->sprites->front_default ?>" alt="<?= $nome ?>">
                <div class="icone-tipo">
                    <img src="<?= $icones_tipos[$poke2->types[0]->type->name] ?>" alt="<?= $poke2->types[0]->type->name ?>" title="<?= $poke2->types[0]->type->name ?>">
                </div>
            </div>
            <div class="container">
                <p>
                    <?= $texto ?>
                </p>
            </div>
        </div>
    </div>
<?php else : ?>
    <p>Não Encontrado</p>
<?php endif; ?>

<?php
require_once "rodape.php";
?>