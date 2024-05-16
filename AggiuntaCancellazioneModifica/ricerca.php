<?php

		$xmlFile = 'memory.xml';
		$xml = simplexml_load_file($xmlFile);

    $onClick = "opzioni.html?";

    if(isset($_GET['c'])){
      $onClick = "cancella.php?i=";
    }

    else if(isset($_GET['m'])){
      $onClick = "modifica.php?i=";
    }

    echo '
      <!DOCTYPE html>
      <html>
      <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Ricerca</title>
        <link href="https://cdn.jsdelivr.net/npm/daisyui@4.11.1/dist/full.min.css" rel="stylesheet" type="text/css" />
        <script src="https://cdn.tailwindcss.com"></script>
      </head>
      <body>
        <div class="overflow-x-auto">
        <table class="table">
          <thead>
            <tr>
              <th>Selezionato</th>
              <th>Nome</th>
              <th>Suggerimenti</th>
              <th>Soluzioni</th>
              <th></th>
            </tr>
          </thead>
          <tbody>';
            
          
    foreach ($xml as $personaggi => $personaggio) {
       echo '
          <tr>
            <th>
                <button onclick="window.location.href=\''. $onClick .$personaggio->indice . '\' " class="btn btn-circle btn-outline">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
          </button>
            </th>
            <td>
              <div class="flex items-center gap-3">
                <div class="avatar">
                  <div class="mask mask-squircle w-12 h-12">
                    <img src="img/'.$personaggio->img.'" alt="no image" />
                  </div>
                </div>
                <div>
                  <div class="font-bold">'.$personaggio->n_completo.'</div>
                </div>
              </div>
            </td>
            <td>';
              $suggArray = json_decode(json_encode($personaggio->sugg), true);
              echo implode(", ", $suggArray);
            echo '</td>
            <td>';

              $guessArray = json_decode(json_encode($personaggio->guess), true);
              echo implode(", ", $guessArray);

            echo '</td>
          </tr>

      ';
    }

    echo '
          </tbody>

          
        </table>
      </div>
      </body>
      </html>
    ';
      

?>