<?php
$url = "https://swapi.dev/api/people/";
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$starwars = json_decode(curl_exec($ch));

// Verifica se a API retornou os resultados
if (isset($starwars->results)) {
    $personagens = $starwars->results;
} else {
    $personagens = [];
}

function getPersonagemId($url) {
    // Extrai o ID do personagem do URL da SWAPI
    $parts = explode('/', rtrim($url, '/'));
    return end($parts);
}

$personagens = array_slice($personagens, 0, 10);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Star Wars Personagens</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .card-background {
            background-size: cover;
            background-position: center;
            height: 300px;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }
        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.5);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-align: center;
        }
        .nomePersonagem
    </style>
</head>
<body>
    <section class="bg-primary text-white text-center py-5">
        <div class="container">
            <div class="container has-text-centered">
                <h1 class="display-4">Star Wars Personagens</h1>
                <h2 class="lead">Com Imagens de Todos os Personagens</h2>
            </div>
        </div>
    </section>

    <section class="container py-5">
        <div class="row">
            <?php if (count($personagens)) {
                foreach ($personagens as $personagem) {
                    $id = getPersonagemId($personagem->url);
                    $imagem = "https://starwars-visualguide.com/assets/img/characters/$id.jpg"; ?>

                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <div class="card-background" style="background-image: url('<?=$imagem?>');">
                                <div class="overlay">
                                    <div>
                                        <h5 class="card-title"><?=$personagem->name?></h5>
                                        <p>Altura: <?=$personagem->height?> cm</p>
                                        <p>Cor do cabelo: <?=$personagem->hair_color?></p>
                                        <p>Gênero: <?=$personagem->gender?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php }
            } else { ?>
                <strong>Nenhum personagem retornado pela API</strong>
            <?php } ?>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
