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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.min.css" />
  <link rel="stylesheet" type="text/css" href="canalti.css">
</head>

<body>
  <section class="hero is-info is-small">
    <div class="hero-body">
      <div class="container has-text-centered">
        <p class="title">
          Canal TI - Listagem de Pokémons Aleatórios
        </p>
        <p class="subtitle">
          Consumo de API com PHP
        </p>
      </div>
    </div>
  </section>
  <div class="box cta">
    <p class="has-text-centered">
      <span class="tag is-danger">Inscreva-se</span> <a target="_blank" href="https://www.youtube.com/channel/UCEQ-nGDGFupHyta90z6hVNQ?sub_confirmation=1">Canal TI</a>
    </p>
  </div>
  <section class="container">
    <div class="columns is-multiline">
      <?php if (count($pokemonsSelecionados)) {
        $i = 0;
        foreach ($pokemonsSelecionados as $Pokemon) {
          $i++; ?>
          <div class="column is-4">
            <div class="card">
              <div class="card-image has-text-centered">
                <figure class="image is-128x128">
                  <img src="<?= $Pokemon->img ?>" alt="<?= $Pokemon->name ?>">
                </figure>
              </div>
              <div class="card-content has-text-centered">
                <div class="content">
                  <h4><?= $Pokemon->name ?></h4>
                  <p>
                  <ul>
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
                  </ul>
                  </p>
                </div>
              </div>
            </div>
          </div>
          <?php if ($i % 3 == 0) {
          ?>
    </div>
    <div class="columns is-multiline">
  <?php }
        }
      } else { ?>
  <strong>Nenhum Pokémon retornado pela API</strong>
<?php } ?>
    </div>
  </section>
</body>

</html>