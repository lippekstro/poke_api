<?php
require_once "cabecalho.php";

$limite = 15; /* define quantos posts por pagina */

$paginas = ceil(151 / $limite);

if (isset($_GET['pagina'])) {
    $pagina = $_GET['pagina'];
} else {
    $pagina = 1;
}

$comeca = ($pagina - 1) * $limite;

$poke_nome = "https://pokeapi.co/api/v2/pokemon/?limit=$limite&offset=$comeca";
$data_nome = file_get_contents($poke_nome);
$result = json_decode($data_nome);

for ($i = $comeca; $i < $limite + $comeca; $i++) {
    $array_nomes[$i] = $result->results[$i-$comeca]->name;
    $base2 = "https://pokeapi.co/api/v2/pokemon-form/$array_nomes[$i]";
    $data = file_get_contents($base2);
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
                <div class="id">
                    <span>#<?= $p->id ?></span>
                </div>
                <div class="icone-tipo">
                    <img src="<?= $icones_tipos[$p->types[0]->type->name] ?>" alt="<?= $p->name ?>" title="<?= $p->types[0]->type->name ?>">
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

<div class="pagination">
    <?php if ($pagina == 1) : ?><!-- logica para a pagina 1 -->
        <a href="index.php?pagina=<?= $pagina - 1 ?>" style="display: none;">&laquo;</a>
    <?php else : ?>
        <a href="index.php?pagina=<?= $pagina - 1 ?>">&laquo;</a>
    <?php endif; ?>

    <?php for ($i = 1; $i < $paginas + 1; $i++) : ?> <!-- gerador das paginas -->
        <a class="active" href="index.php?pagina=<?= $i ?>"><?= $i ?></a>
    <?php endfor; ?>

    <?php if ($pagina == $paginas) : ?><!-- logica para ultima pagina -->
        <a href="index.php?pagina=<?= $pagina + 1 ?>" style="display: none;">&raquo;</a>
    <?php else : ?>
        <a href="index.php?pagina=<?= $pagina + 1 ?>">&raquo;</a>
    <?php endif; ?>
</div>


<?php
require_once "rodape.php";
?>