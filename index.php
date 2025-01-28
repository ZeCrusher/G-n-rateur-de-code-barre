<html lang="en"><head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
        <meta name="format-detection" content="telephone=no">
        <meta charset="UTF-8">

        <title>Extranet de l'Office de Tourisme de Martigues</title>
		<link rel="icon" href="img/favicon.ico" type="image/x-icon">    
        <!-- CSS -->
		
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/animate.min.css" rel="stylesheet">
		<link href="css/font-awesome.min.css" rel="stylesheet">
		<link href="css/form.css" rel="stylesheet">
		<link href="css/calendar.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet">
		<link href="css/icons.css" rel="stylesheet">
		<link href="css/generics.css" rel="stylesheet">
		<link href="css/jquery.dataTables.css" rel="stylesheet">  
	</head>

	<body id="skin16" style="background-position: center;background-repeat: no-repeat;background-size: cover;">	
<!-- END WAYBACK TOOLBAR INSERT -->
 
        <section id="login">
            <header>

            </header>
        
            <div class="clearfix"></div>
                            <center> <h1>CODE BARRE - TEST V0.1-2021</h1>
                             <p>Génération d'un code-barres sans bibliothèque externe</p> </center>
            <!-- Login -->
            <form class="box tile animated" id="box-login">
                <h2 class="m-t-0 m-b-15">Login</h2>
                <input type="text" class="login-control m-b-10" placeholder="Username or Email Address">
                <input type="password" class="login-control" placeholder="Password">
                <div class="checkbox m-b-20">
                    <label>
                        <div class="icheckbox_minimal" aria-checked="false" aria-disabled="false" style="position: relative;"><input type="checkbox" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
                        Code barre :
                    </label>
                </div>
                <button class="btn btn-sm m-r-5">Sign In</button>
            </form>
            
            <!-- Forgot Password -->
            <form class="box animated tile active" id="box-reset" action="test.php">
                <h2 class="m-t-0 m-b-15">Générateur de Code Barre</h2>
                <p>Convertir un nombre en code-barres</p>
                <input  class="login-control m-b-20" name="nombre" placeholder="Chiffres...">    

                <button class="btn btn-sm m-r-5">Créer Code</button>

                <!-- <small><a class="box-switcher" data-switch="box-login" href="">Already have an Account?</a></small> -->
            </form>            
            
            <?php 
                if (isset($_GET['nombre'])) { /* 9782919208333 */
                       echo genererCodeBarreHtml($_GET['nombre']);
                  
                       
                }
            ?>
 


        </section>                      
        
        <!-- Javascript Libraries -->
        <!-- jQuery -->
 <?php
function genererCodeBarreHtml($nombre) {
    // Là, je vais vérifier si l'entrée est un nombre (car oui, le Code-128 peut contenir des lettres et des chiffres ou alors une mauvaise manip du USER :D )
    if (empty($nombre)) {
        return "Le code-barres ne peut pas être vide.";
    }

    // Code-barres Code-128 simplifié (complet pour chaque caractère)
    // Chaque caractère sera mappé à un code-barres.
    $barres = [
					0		=> '11011001100',
					1		=> '11001101100',
					2		=> '11001100110',
					3 		=> '10010011000',
					4 		=> '10010001100',
					5 		=> '10001001100',
					6 		=> '10011001000',
					7		=> '10011000100',
					8 		=> '10001100100',
					9 		=> '11001001000',
					10 		=> '11001000100',
					11 		=> '11000100100',
					12 		=> '10110011100',
					13 		=> '10011011100',
					14 		=> '10011001110',
					15 		=> '10111001100',
					16 		=> '10011101100',
					17 		=> '10011100110',
					18 		=> '11001110010',
					19 		=> '11001011100',
					20 		=> '11001001110',
					21 		=> '11011100100',
					22 		=> '11001110100',
					23 		=> '11101101110',
					24 		=> '11101001100',
					25 		=> '11100101100',   
					26 		=> '11100100110',
					27 		=> '11101100100',
					28 		=> '11100110100',
					29 		=> '11100110010',
					30 		=> '11011011000',
					31 		=> '11011000110',
					32 		=> '11000110110',
					33 		=> '10100011000',
					34 		=> '10001011000',
					35 		=> '10001000110',
					36 		=> '10110001000',
					37 		=> '10001101000',
					38 		=> '10001100010',
					39 		=> '11010001000',
					40 		=> '11000101000',
					41 		=> '11000100010',
					42 		=> '10110111000',
					43 		=> '10110001110',
					44 		=> '10001101110',
					45 		=> '10111011000',
					46 		=> '10111000110',
					47 		=> '10001110110',
					48 		=> '11101110110',
					49 		=> '11010001110',
					50 		=> '11000101110',
					51 		=> '11011101000',
					52 		=> '11011100010',
					53 		=> '11011101110',
					54 		=> '11101011000',
					55 		=> '11101000110',
					56 		=> '11100010110',
					57 		=> '11101101000',
					58 		=> '11101100010',
					59 		=> '11100011010',
					60 		=> '11101111010',
					61 		=> '11001000010',
					62 		=> '11110001010',
					63 		=> '10100110000',
					64 		=> '10100001100',
					65 		=> '10010110000',
					66 		=> '10010000110',
					67 		=> '10000101100',
					68 		=> '10000100110',
					69 		=> '10110010000',
					70 		=> '10110000100',
					71 		=> '10011010000',
					72 		=> '10011000010',
					73 		=> '10000110100',
					74 		=> '10000110010',
					75 		=> '11000010010',
					76 		=> '11001010000',
					77 		=> '11110111010',
					78 		=> '11000010100',
					79 		=> '10001111010',
					80 		=> '10100111100',
					81 		=> '10010111100',
					82 		=> '10010011110',
					83 		=> '10111100100',
					84 		=> '10011110100',
					85 		=> '10011110010',
					86 		=> '11110100100',
					87 		=> '11110010100',
					88 		=> '11110010010',
					89 		=> '11011011110',
					90 		=> '11011110110',
					91 		=> '11110110110',
					92 		=> '10101111000',
					93 		=> '10100011110',
					94		=> '10001011110',
					95 		=> '10111101000',
					96		=> '10111100010',
					97 		=> '11110101000',
					98 		=> '11110100010',
					99  	=> '10111011110',    // 99 et 'c' sont identiques ne nous sert que pour le checksum
					100 	=> '10111101110',    // 100 et 'b' sont identiques ne nous sert que pour le checksum
					101 	=> '11101011110',    // 101 et 'a' sont identiques ne nous sert que pour le checksum
					102 	=> '11110101110',    // 102 correspond à FNC1 ne nous sert que pour le checksum
					'c' 	=> '10111011110',
					'b' 	=> '10111101110',
					'a' 	=> '11101011110',
					'A' 	=> '11010000100',
					'B' 	=> '11010010000',
					'C'		=> '11010011100',
					'S'		=> '1100011101011'
    ];

    // Le "Start code" et "Stop code" (les motifs de départ et d'arrêt) pour Code-128 sont spécifiques et doivent être ajoutés.
    $startCode = '11010010000';  // Code-128 Start Code simplifié (réellement plus complexe)
    $stopCode = '11000111010';   // Code-128 Stop Code simplifié

    // Début du code-barres
    $codeBarres = $startCode;

    // Ajouter les motifs pour chaque caractère dans le code-barres
    foreach (str_split($nombre) as $chiffre) {
        if (isset($barres[$chiffre])) {
            $codeBarres .= $barres[$chiffre];
        } else {
            return "Caractère non supporté dans le code-barres.";
        }
    }

    // Ajouter le stop code
    $codeBarres .= $stopCode;

    // Générer le HTML des barres
    $barresHtml = '<div id="code-barre" style="
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        /* background-color: white; */
        height: 30vh;
    ">
        <div style="display: flex; padding: 10px; border: 5px solid #ff0000; background-color: white;">';

    // Créer les barres noires et blanches
    foreach (str_split($codeBarres) as $bit) {
        $couleur = $bit === '1' ? 'black' : 'white';
        $barresHtml .= '<div style="
            width: 2px;
            height: 100px;
            background-color: ' . $couleur . ';
        "></div>';
    }

    $barresHtml .= '</div>';

    // Ajouter les chiffres sous le code-barres
    $barresHtml .= '<div style="
        font-family: Arial, sans-serif;
        font-size: 16px;
        margin-top: 10px;
    ">
        ' . implode(' ', str_split($nombre)) . '
    </div>';

    // Ajouter le bouton de téléchargement avec le passage de la variable
    $barresHtml .= '<button onclick="telechargerCodeBarre(\'' . $nombre . '\')" style="
        margin-top: 20px;
        padding: 10px 20px;
        background-color: black;
        color: white;
        border: none;
        cursor: pointer;
        font-size: 16px;
    ">
        Télécharger le code-barres
    </button>';

    $barresHtml .= '</div>';

    return $barresHtml;
}

 
?>
<script>
    // Fonction JavaScript pour télécharger le code-barres
    function telechargerCodeBarre(codeBarreNumber) {
        const element = document.getElementById('code-barre');
        html2canvas(element).then(canvas => {
            const lien = document.createElement('a');
            lien.download = `code-barre-${codeBarreNumber}.png`; // Inclure le nombre dans le nom
            lien.href = canvas.toDataURL('image/png');
            lien.click();
        });
    }
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>


</body></html>
