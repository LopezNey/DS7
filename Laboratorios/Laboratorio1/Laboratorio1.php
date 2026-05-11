<html>
    <?php

    printf("Integrantes: Neishany Lopez, Martin Torres, Miguel Martinez");
    printf('<br>');
    //Salida de Datos: echo()

    //Con paréntisis
    echo("Hola, Mundo!");

    //Sin paréntisis
    echo "<p>Hola, Mundo!</p>";

    //Multiples argumentos
    echo "<p>Hola ", $nombre = "Mundo", "!</p>";


    //Salida de Datos: print() v printf()

    //print()
    print("<p>Hola, Mundo!</p>");

    //Retorna 1
    $r = print("Hola!");
    echo $r; //Imprime: 1

    //printf()
    $nombre = "Mundo";
    $n = 42;
    printf("<p>Hola, %s! N°: %d</p>", $nombre, $n);

    $p = 1234.5678;
    printf("<p>$%.2f</p>", $p); //$1234.57


    //Conversión de Tipos de Datos

    //Conversion Automatica
    // Número > String​
    $n = 123;
    $s = "El número es " . $n;
    printf($s."<br>");


    // String > Número​
    $s = "100";
    $r = $s + 50; // > 150​
    printf($r."<br>");


    // Bool > Número​
    $r = 10 + true; // > 11
    printf($r."<br>");

    
    //Conversion Explicita
    // Sintaxis general​
    //$var = (tipo) $original

    // String > int​
    $s = "123.45";
    $i = (int) $s;  // > 123​
    printf($i."<br>");

    // int > string​
    $n = 150;
    $s = (string) $n; // > "150"
    printf($s."<br>");

    

    //Constantes en PHP
    //define('NOMBRE', valor);
    
    define('PI', 3.1416);
    define('SITIO', 'MiWeb');
    
    echo PI;    // 3.1416​
    printf('<br>');
    echo SITIO; // MiWeb

    
    //const NOMBRE = valor;

    const VERSION = '8.0';
    printf('<br>');
    echo VERSION; // 8.0



    //Operadores de comparaciones

    // Igualdad (==)
    $r = (5 == "5");
    echo "Igualdad 5 == '5': ";
    var_dump($r);  // true

    printf('<br>');
    // Identidad (===)
    $r = (5 === "5");
    echo "Identidad 5 === '5': ";
    var_dump($r);  // false

    printf('<br>');
    // Desigualdad (!=)
    $r = (5 != 3);
    echo "Desigualdad 5 != 3: ";
    var_dump($r);  // true

    printf('<br>');
    // Desigualdad estricta (!==)
    $r = (5 !== "5");
    echo "Desigualdad estricta 5 !== '5': ";
    var_dump($r);  // true

    printf('<br>');
    // Mayor que (>)
    $r = (7 > 3);
    echo "Mayor que 7 > 3: ";
    var_dump($r);  // true

    printf('<br>');
    // Menor que (<)
    $r = (2 < 5);
    echo "Menor que 2 < 5: ";
    var_dump($r);  // true

    printf('<br>');
    // Mayor o igual (>=)
    $r = (5 >= 5);
    echo "Mayor o igual 5 >= 5: ";
    var_dump($r);  // true

    printf('<br>');
    // Nave espacial (<=>)  retorna -1, 0 o 1
    $r = (5 <=> 3);
    echo "Nave espacial 5 <=> 3: $r \n";  // 1


    //Operadores de asignacion

    $a = 10;
    echo "\nAsignación simple: $a \n"; // 10
    printf('<br>');

    $a += 5;
    echo "Suma y asigna +=: $a \n"; // 15
    printf('<br>');

    $a -= 3;
    echo "Resta y asigna -=: $a \n"; // 12
    printf('<br>');
     
    $a *= 2;
    echo "Multiplica y asigna *=: $a \n"; // 24
    printf('<br>');

    $a /= 4;
    echo "Divide y asigna /=: $a \n";  // 6
    printf('<br>');

    $a %= 4;
    echo "Módulo y asigna %%=: $a \n"; // 2
    printf('<br>');


    $s = "Hola";
    $s .= " Mundo";
    printf('<br>');
    echo "Concatena y asigna .=: $s \n"; // Hola Mundo

    $a = 2;
    $a **= 3;
    printf('<br>');
    echo "Exponente y asigna **=: $a \n"; // 8


    //Operadores logicos

    // AND (&&) -\
    $r = (true && false);
    printf('<br>');
    echo "\nAND true && false: ";
    var_dump($r);  // false

    // OR (||) 
    $r = (true || false);
    printf('<br>');
    echo "OR true || false: ";
    var_dump($r);  // true

    // NOT (!) 
    $r = !(true);
    printf('<br>');
    echo "NOT !(true): ";
    var_dump($r);  // false

    // XOR 
    $r = (true xor false);
    printf('<br>');
    echo "XOR true xor false: ";
    var_dump($r);  // true

    $r = (true xor true);
    printf('<br>');
    echo "XOR true xor true: ";
    var_dump($r);  // false

    ?>
</html>