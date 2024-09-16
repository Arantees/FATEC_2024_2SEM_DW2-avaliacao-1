<?php
$url = "https://swapi.dev/api/people/"; // URL da API SWAPI para listar personagens
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
    return end($parts); // Último elemento é o ID
}

// Limitar a 10 personagens
$personagens = array_slice($personagens, 0, 10);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Star Wars Personagens</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.min.css" />
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
    </style>
</head>
<body>
    <section class="hero is-primary">
        <div class="hero-body">
            <div class="container has-text-centered">
                <h1 class="title">Star Wars Personagens</h1>
                <h2 class="subtitle">Com Imagens de Todos os Personagens</h2>
            </div>
        </div>
    </section>

    <section class="container">
        <div class="columns is-multiline">
            <?php if (count($personagens)) {
                foreach ($personagens as $personagem) {
                    $id = getPersonagemId($personagem->url);
                    $imagem = "https://starwars-visualguide.com/assets/img/characters/$id.jpg"; ?>

                    <div class="column is-4">
                        <div class="card">
                            <div class="card-background" style="background-image: url('<?=$imagem?>');">
                                <div class="overlay">
                                    <div>
                                        <h4 class="title"><?=$personagem->name?></h4>
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
</body>
</html>
