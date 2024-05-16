<?php

	$xmlFile = 'memory.xml';
	$xml = simplexml_load_file($xmlFile);

	if(!isset($_GET['i'])){
		header("location:opzioni.html");
	}
    else if(isset($_GET['i'])){
    	echo '
      <!DOCTYPE html>
      <html>
      <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Elimina</title>
        <link href="https://cdn.jsdelivr.net/npm/daisyui@4.11.1/dist/full.min.css" rel="stylesheet" type="text/css" />
        <script src="https://cdn.tailwindcss.com"></script>
      </head>
      <body>
      <form name="invio" method="POST">
      <h1> Sicuro di eliminare il personaggio ? <h1>
        <div class="overflow-x-auto">
        <table class="table">
          <thead>
            <tr>
              <th>Nome</th>
              <th>Suggerimenti</th>
              <th>Soluzioni</th>
              <th></th>
            </tr>
          </thead>
          <tbody>';
            
          
    foreach ($xml as $personaggi => $personaggio) {
    	if($personaggio->indice == $_GET['i']){
    		echo '
          <tr>
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
       
    }

    echo '
	        </tbody> 
	        </table>
	     </div>
	     <br><br><br>
	     <div style="text-align: center;">
		    <button name="btn" style="zoom: 200%; margin-right: 100px;" class="btn btn-success">Conferma</button>
		    <button type="button" onclick="window.location.href=\'opzioni.html\' "style="zoom: 200%;" class="btn btn-error">Annulla</button>
		</div>
	  </form>
      </body>
      </html>
    ';
    }

    if(isset($_POST['btn'])){

		$xmlFile = 'memory.xml';
		$xml = simplexml_load_file($xmlFile);

		$indice = $_GET['i'];
		    foreach ($xml->personaggio as $personaggio) {
		        if ($personaggio->indice == $indice) {
		            unset($personaggio[0]);
		            break;
		        }
		    }

		    foreach ($xml->personaggio as $personaggio) {
		        if ($personaggio->indice > $indice) {
		            $personaggio->indice = intval($personaggio->indice) - 1;
		        }
		    }

		
		$xml->asXML($xmlFile);
		header("location:opzioni.html");
    }
      

?>