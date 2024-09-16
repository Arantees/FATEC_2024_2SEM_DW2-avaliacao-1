<?php
$url = "https://www.canalti.com.br/api/pokemons.json";
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$pokemons = json_decode(curl_exec($ch));

if (count($pokemons->pokemon)) {
  shuffle($pokemons->pokemon);
  $pokemonsSelecionados = array_slice($pokemons->pokemon, 0, 6);
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="../images/fav_icon.png" type="image/x-icon">
  <title>Pokemóns</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
  <link rel="stylesheet" type="text/css" href="canalti.css">

  <style>
    .card-image {
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .card-image img {
      max-width: 100%;
      height: auto;
    }
  </style>
</head>

<body>
  <section class="bg-info text-white text-center py-5">
    <div class="container">
      <h1 class="display-4">Canal TI - Listagem de Pokémons Aleatórios</h1>
      <p class="lead">Consumo de API com PHP</p>
    </div>
  </section>

  <div class="alert alert-danger text-center">
    <span class="badge badge-danger">Inscreva-se</span>
    <a target="_blank" href="https://www.youtube.com/channel/UCEQ-nGDGFupHyta90z6hVNQ?sub_confirmation=1" class="text-danger">Canal TI</a>
  </div>

  <section class="container">
    <div class="row">
      <?php if (count($pokemonsSelecionados)) {
        foreach ($pokemonsSelecionados as $Pokemon) { ?>
          <div class="col-md-4 mb-4">
            <div class="card">
              <div class="card-image">
                <img src="<?= $Pokemon->img ?>" alt="<?= $Pokemon->name ?>">
              </div>
              <div class="card-body text-center">
                <h5 class="card-title"><?= $Pokemon->name ?></h5>
                <p class="card-text">
                  <?php
                  if (isset($Pokemon->next_evolution) && count($Pokemon->next_evolution)) {
                    echo "Próximas evoluções: ";
                    foreach ($Pokemon->next_evolution as $ProximaEvolucao) {
                      echo " < " . $ProximaEvolucao->name . " > ";
                    }
                  } else {
                    echo "Não possui próximas evoluções ";
                  }
                  ?>
                </p>
              </div>
            </div>
          </div>
        <?php }
      } else { ?>
        <div class="col-12 text-center">
          <strong>Nenhum Pokémon retornado pela API</strong>
        </div>
      <?php } ?>
    </div>
  </section>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>