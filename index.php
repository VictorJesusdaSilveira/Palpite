<?php
require_once("cartas.php");

// verifica se já existe um sorteio e se não existir ele fará um sorteio
$rand = isset($_GET["rand"]) ? $_GET["rand"] : rand(0, count($cartas) - 1);

// verifica se ja tem tentativas e se não tiver as tentativas começaram em 0
$tentativas = isset($_GET["tentativas"]) ? $_GET["tentativas"] : 0;

$mensagem = "";
$dica = "";

// controla se o jogo ainda estará ativo de acordo com a quantidade de tentativas
$jogoAtivo = $tentativas < 3;

if (isset($_GET["escolha"]) && $jogoAtivo) {
    $escolha = $_GET["escolha"];

    if ($escolha == $rand) {
        $mensagem = " Acertou! Novo jogo iniciado!";
        
        // reinicia o jogo
        $rand = rand(0, count($cartas) - 1);
        $tentativas = 0;

    } else {
        $tentativas++;

        if ($tentativas >= 3) {
            $mensagem = " Fim de jogo! Era: " . $cartas[$rand]->getNome();
            $jogoAtivo = false;
        } else {
            $mensagem = " Errou! Tente novamente.";
            $dica = $cartas[$rand]->getDica();
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Jogo</title>

<style>
body {
    font-family: Arial;
    background: #1e1e2f;
    color: white;
    text-align: center;
}

.cards {
    display: flex;
    justify-content: center;
    gap: 20px;
    flex-wrap: wrap;
}

.card img {
    width: 150px;
    border-radius: 10px;
    transition: 0.2s;
}

.card img:hover {
    transform: scale(1.1);
}

button {
    cursor: pointer;
}
</style>

</head>
<body>

<h1> Jogo de Adivinhação</h1>
<h3>Clique na carta correta</h3>

<p><?= $mensagem ?></p>

<?php if ($dica): ?>
    <p> Dica: <?= $dica ?></p>
<?php endif; ?>

<p>Tentativas: <?= $tentativas ?>/3</p>

<div class="cards">

<?php foreach ($cartas as $index => $carta): ?>
<!--passa os valores para a URL pelo formulário (ao clicar na imagem, sem ser necessário colocar os valores manualmente na URL-->
    <form method="get" class="card">
        <input type="hidden" name="escolha" value="<?= $index ?>">
        <input type="hidden" name="rand" value="<?= $rand ?>">
        <input type="hidden" name="tentativas" value="<?= $tentativas ?>">

        <button style="background:none; border:none;" <?= !$jogoAtivo ? 'disabled' : '' ?>>
            <img src="<?= $carta->getLink() ?>">
        </button>
    </form>

<?php endforeach; ?>

</div>

<?php if (!$jogoAtivo): ?> <!-- verifica se o jogo ainda está ativo, ou seja se ainda tem tentativas sobrando-->
    <br><br>
    <a href="index.php">
        <button> Jogar novamente</button>
    </a>
<?php endif; ?>

</body>
</html>
