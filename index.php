<?php

echo "<h1>Ejercicios de Lógica en PHP</h1>\n";
echo "<hr>\n\n";

// =============================================================================
// 1. PROBLEMA DE LISTA INVERTIDA
// =============================================================================

echo "<h2>1. Lista Invertida</h2>\n";

/**
 * Función que invierte un array de números
 * @param array $numeros Array de números a invertir
 * @return array Array invertido
 */
function invertirLista($numeros) {
    return array_reverse($numeros);
}

// Ejemplo de uso
$numerosOriginales = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
$numerosInvertidos = invertirLista($numerosOriginales);

echo "Array original: [" . implode(", ", $numerosOriginales) . "]\n";
echo "Array invertido: [" . implode(", ", $numerosInvertidos) . "]\n";
echo "<br><br>\n\n";

// =============================================================================
// 2. PROBLEMA DE SUMA DE NÚMEROS PARES
// =============================================================================

echo "<h2>2. Suma de Números Pares</h2>\n";

/**
 * Función que suma todos los números pares de un array
 * @param array $numeros Array de números enteros
 * @return int Suma de los números pares
 */
function sumarNumerosPares($numeros) {
    $suma = 0;
    foreach ($numeros as $numero) {
        if ($numero % 2 == 0) {
            $suma += $numero;
        }
    }
    return $suma;
}

// Ejemplo de uso
$arrayNumeros = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12];
$sumaPares = sumarNumerosPares($arrayNumeros);

echo "Array de números: [" . implode(", ", $arrayNumeros) . "]\n";
echo "Números pares encontrados: ";
$pares = [];
foreach ($arrayNumeros as $num) {
    if ($num % 2 == 0) {
        $pares[] = $num;
    }
}
echo "[" . implode(", ", $pares) . "]\n";
echo "Suma total de números pares: $sumaPares\n";
echo "<br><br>\n\n";

// =============================================================================
// 3. PROBLEMA DE FRECUENCIA DE CARACTERES
// =============================================================================

echo "<h2>3. Frecuencia de Caracteres</h2>\n";

/**
 * Función que cuenta la frecuencia de cada carácter en una cadena
 * @param string $texto Cadena de texto a analizar
 * @return array Array asociativo con la frecuencia de cada carácter
 */
function frecuenciaCaracteres($texto) {
    $frecuencia = [];
    $longitud = strlen($texto);
    
    for ($i = 0; $i < $longitud; $i++) {
        $caracter = $texto[$i];
        if (isset($frecuencia[$caracter])) {
            $frecuencia[$caracter]++;
        } else {
            $frecuencia[$caracter] = 1;
        }
    }
    
    return $frecuencia;
}

// Ejemplo de uso
$textoEjemplo = "Hola Mundo PHP";
$frecuencias = frecuenciaCaracteres($textoEjemplo);

echo "Texto analizado: \"$textoEjemplo\"\n";
echo "Frecuencia de caracteres:\n";
foreach ($frecuencias as $caracter => $frecuencia) {
    if ($caracter == ' ') {
        echo "  '[espacio]' => $frecuencia veces\n";
    } else {
        echo "  '$caracter' => $frecuencia veces\n";
    }
}
echo "<br><br>\n\n";

// =============================================================================
// 4. PROBLEMA DE BUCLE ANIDADO - PIRÁMIDE DE ASTERISCOS
// =============================================================================

echo "<h2>4. Pirámide de Asteriscos</h2>\n";

/**
 * Función que imprime una pirámide de asteriscos
 * @param int $altura Altura de la pirámide
 */
function imprimirPiramide($altura) {
    for ($i = 1; $i <= $altura; $i++) {
        // Imprimir espacios para centrar
        for ($j = 1; $j <= ($altura - $i); $j++) {
            echo " ";
        }
        
        // Imprimir asteriscos
        for ($k = 1; $k <= (2 * $i - 1); $k++) {
            echo "*";
        }
        
        // Nueva línea
        echo "\n";
    }
}

echo "Pirámide de altura 5:\n";
echo "<pre>\n";
imprimirPiramide(5);
echo "</pre>\n";

echo "Pirámide de altura 8:\n";
echo "<pre>\n";
imprimirPiramide(8);
echo "</pre>\n";

// =============================================================================
// EJEMPLOS ADICIONALES Y PRUEBAS
// =============================================================================

echo "<hr>\n";
echo "<h2>Ejemplos Adicionales</h2>\n";

// Ejemplo adicional para lista invertida con diferentes tipos de datos
echo "<h3>Lista Invertida - Ejemplo con strings</h3>\n";
$nombres = ["Ana", "Carlos", "Diana", "Eduardo", "Fernanda"];
$nombresInvertidos = invertirLista($nombres);
echo "Nombres originales: [" . implode(", ", $nombres) . "]\n";
echo "Nombres invertidos: [" . implode(", ", $nombresInvertidos) . "]\n";
echo "<br>\n";

// Ejemplo adicional para suma de pares
echo "<h3>Suma de Pares - Ejemplo con números negativos</h3>\n";
$numerosVariados = [-4, -3, -2, -1, 0, 1, 2, 3, 4, 5];
$sumaParesVariados = sumarNumerosPares($numerosVariados);
echo "Array con negativos: [" . implode(", ", $numerosVariados) . "]\n";
echo "Suma de números pares: $sumaParesVariados\n";
echo "<br>\n";

// Ejemplo adicional para frecuencia de caracteres
echo "<h3>Frecuencia de Caracteres - Texto más complejo</h3>\n";
$textoComplejo = "Programación en PHP es divertida!";
$frecuenciasComplejas = frecuenciaCaracteres($textoComplejo);
echo "Texto: \"$textoComplejo\"\n";
echo "Caracteres únicos encontrados: " . count($frecuenciasComplejas) . "\n";
$caracterMasFrecuente = array_keys($frecuenciasComplejas, max($frecuenciasComplejas))[0];
$maxFrecuencia = max($frecuenciasComplejas);
if ($caracterMasFrecuente == ' ') {
    echo "Carácter más frecuente: [espacio] ($maxFrecuencia veces)\n";
} else {
    echo "Carácter más frecuente: '$caracterMasFrecuente' ($maxFrecuencia veces)\n";
}
echo "<br>\n";

echo "<hr>\n";
echo "<p><strong>Ejercicios completados exitosamente!</strong></p>\n";
echo "<p>Fecha de ejecución: " . date('Y-m-d H:i:s') . "</p>\n";

?>