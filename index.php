<?php
require_once __DIR__ . '/vendor/autoload.php';

use App\Calculadora;

$resultado = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $valor1 = $_POST['valor1'];
    $valor2 = $_POST['valor2'];
    $operacao = $_POST['operacao'];
    
    $calculadora = new Calculadora();
    
    try {switch ($operacao) {
        case 'somar':
            $resultado = $calculadora->somar($valor1, $valor2);
            break;
        case 'subtrair':
            $resultado = $calculadora->subtrair($valor1, $valor2);
            break;
        case 'multiplicar':
            $resultado = $calculadora->multiplicar($valor1, $valor2);
            break;
        case 'dividir':$resultado = $calculadora->dividir($valor1, $valor2);
            break;
        }
        $resultado = "Resultado: " . $resultado;
    } catch (Exception $e) {
        $resultado = "Erro: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Calculadora PHP</title>
    </head>
    <body>
        <form action="index.php" method="post">
            <input type="number" name="valor1" required="required" placeholder="Valor 1">
            <input type="number" name="valor2" required="required" placeholder="Valor 2">
            <div>
                <input type="radio" name="operacao" value="somar" id="somar" 
                required="required">
                <label for="somar">Somar</label>
                <input type="radio" name="operacao" value="subtrair" id="subtrair">
                <label for="subtrair">Subtrair</label>
                <input type="radio" name="operacao" value="multiplicar" id="multiplicar">
                <label for="multiplicar">Multiplicar</label>
                <input type="radio" name="operacao" value="dividir" id="dividir">
                <label for="dividir">Dividir</label>
            </div>
            <button type="submit">Calcular</button>
        </form>
        <?php echo $resultado;?>
    </body>
    </html>