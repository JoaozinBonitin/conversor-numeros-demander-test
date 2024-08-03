<?php
    require('converter-number.php');

    $resultado = '';
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $valor = $_POST['valorConverter'];
        $converter = new Conversor();
    
        if (is_numeric($valor)) {
            // Se for um número arábico
            $resultado = $converter->converterRomano((int)$valor);
        } else {
            // Se for um número romano
            $resultado = $converter->converterArabico($valor);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversor - teste Demander</title>

    <!-- Utilização de estilizaçã propria para ajustes -->
    <link rel="stylesheet" href="./css/style.css">

    <!-- link para poder fazer a utilização do UIkit via cdn -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.21.9/dist/css/uikit.min.css" />

    <!-- link para uso do google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
</head>
<body>

    <div class="">
        <!-- Imagem meramente ilustrativa pra melhor visualização da interface -->
        <div class="uk-text-center img-header">
            <img src="./img/img-1.svg" width="150" alt="">
        </div>

        <div class="form-box uk-align-center">
            <div class="">
                <form class="." action="" method="post">
                    <label for="">Converter <strong>De</strong></label>
                    <select name="" id="">
                        <option value="">Romano</option>
                        <option value="">Arábico</option>
                    </select>
                    <label for="">converter <strong>Para</strong></label>
                    <select name="" id="">
                        <option value="">Arábico</option>
                        <option value="">Romano</option>
                    </select>

                    <label class="valor" for=""><strong>Valor</strong></label>
                    <input class="insert-text" type="text" name="valorConverter" placeholder="Ex: 10 ou X" id="valorConverter" required>
                    <input class="button" type="submit" value="Converter">
                </form>
            

                <div class="resposta uk-align-center uk-text-center">
                    <?php echo $resultado; ?>
                </div>

            </div>
        </div>
    </div>


</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/uikit@3.21.9/dist/js/uikit.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/uikit@3.21.9/dist/js/uikit-icons.min.js"></script>