<html>
    <?php
    echo "Practica #1";
    printf('<br>');
    echo "Integrantes:";
    printf('<br>');
    echo "Neishany Lopez";
    printf('<br>');
    echo "Martin Torres";
    printf('<br>');
    echo "Miguel Martinez";
    printf('<br>');
    echo "Jorge Mendoza";
    printf('<br>');
    printf('<br>');
    
    printf("Problema #1");
    printf('<br>');

    //Con PHP, realizar un algoritmo que tome una temperatura en Celsius y la convierta a Fahrenheit. 
    // Luego, clasificar el resultado en: 
    //Frío (menos de 50°F). 
    //Templado (50-86°F). 
    //Caliente (más de 86°F). 

    $temperatura = random_int(1, 100);
    printf("La temperatura en Celsius: %.2f°C", $temperatura);
    printf('<br>');

    $Fahrenheit = $temperatura * (9/5) + 32;
    printf("Esta temperatura en Fahrenheit es: %.2f°F", $Fahrenheit); 
    printf('<br>');

    if($Fahrenheit < 50) {echo 'El clima esta Frio'; }
    elseif($Fahrenheit >= 50 && $Fahrenheit <=86) {echo 'El clima esta Templado'; }
    elseif($Fahrenheit > 86) {echo 'El clima esta Caliente'; }


    printf('<br>');
    printf('<br>');

    printf("Problema #2");
    printf('<br>');
    //Con PHP, realizar una calculadora de IMC (Índice de masa corporal), 
    //para calcularlo se utiliza la siguiente fórmula  IMC = peso en kg / altura en metros al cuadrado. 
    //Si el resultado es menor a 18.5 debe indicar que está bajo de peso, 
    //el rango saludable es cuando el resultado está entre 18.5  y 24.9, 
    //alguien sobrepeso tiene un índice entre 25 y 29.9; 
    //y si el resultado da 30 o más entonces es obesidad.  
    $peso = rand(500, 1200) / 10;
    $altura = rand(150, 200) / 100;

    $imc = $peso / ($altura * $altura);

    echo "Peso: $peso kg";
    printf('<br>');
    echo "Altura: $altura m";
    printf('<br>');
    printf("IMC:%.2f ", $imc);
    printf('<br>');

    if ($imc < 18.5) {
        echo "Estado: Bajo de peso\n";
    } elseif ($imc >= 18.5 && $imc <= 24.9) {
        echo "Estado: Peso normal\n";
    } elseif ($imc >= 25 && $imc <= 29.9) {
        echo "Estado: Sobrepeso\n";
    } else {
        echo "Estado: Obesidad\n";
    }

    printf('<br>');
    printf('<br>');


    printf("Problema #3");
    printf('<br>');
    //Crear un algoritmo con PHP donde se tenga dos números enteros y un operador matemático (+, -, *, /). 
    //El programa debe: Realizar la operación correspondiente. 
    //Manejar explícitamente estos errores: 
    //Si el usuario ingresa algo que no es un número, mostrar: "Error: Debes ingresar números enteros." 
    //Si el operador no es válido (ej: &), mostrar: "Error: Operador no válido. Usa +, -, *, o /". 
    //Si todo es correcto, mostrar el resultado. 
    
    //Campos Input
    $num1 = 3; 
    $num2 = 9;
    $operador = "*";
    $resultado;
    
    if (!is_numeric($num1) || !is_numeric($num2) ||
        intval($num1) != $num1 || intval($num2) != $num2) {
        echo "Error: Debes ingresar números enteros.<br>";
    }
    else{
        $num1 = intval($num1);
        $num2 = intval($num2);
    
        $operadoresValidos = ['+', '-', '*', '/'];
        if (!in_array($operador, $operadoresValidos)) {
            echo "Error: Operador no válido. Usa +, -, *, o /. <br>" ;
        }
        else{
            switch ($operador) {
                case '+': $resultado = $num1 + $num2;
                        echo "$num1 + $num2 = $resultado<br>";
                        break;
                case '-': $resultado = $num1 - $num2;
                        echo "$num1 - $num2 = $resultado<br>";
                        break;
                case '*': $resultado = $num1 * $num2;
                        echo "$num1 * $num2 = $resultado<br>";
                        break;
                case '/':$resultado = $num1 / $num2;
                        echo "$num1 / $num2 = $resultado<br>";
                        break;
            }
        }
    }
    ?>
</html>