<?php
// 1. PROBLEMA DE LA SERIE FIBONACCI

/**
 * Función que genera los primeros n términos de la serie Fibonacci
 * La serie comienza con 0 y 1, y cada término es la suma de los dos anteriores
 * 
 * @param int $n Número de términos a generar
 * @return array Array con los términos de la serie Fibonacci
 */
function generarFibonacci($n) {
    // Validar que n sea un número positivo
    if ($n <= 0) {
        return [];
    }
    
    // Inicializar el array para almacenar la serie
    $fibonacci = [];
    
    // Casos base: los primeros dos términos son 0 y 1
    if ($n >= 1) {
        $fibonacci[0] = 0;
    }
    if ($n >= 2) {
        $fibonacci[1] = 1;
    }
    
    // Generar los términos restantes usando la fórmula F(n) = F(n-1) + F(n-2)
    for ($i = 2; $i < $n; $i++) {
        $fibonacci[$i] = $fibonacci[$i - 1] + $fibonacci[$i - 2];
    }
    
    return $fibonacci;
}

// ====================================
// 2. PROBLEMA DE NÚMEROS PRIMOS
// ====================================

/**
 * Función que determina si un número es primo
 * Un número primo solo es divisible por 1 y por sí mismo
 * 
 * @param int $numero El número a verificar
 * @return bool true si es primo, false si no lo es
 */
function esPrimo($numero) {
    // Los números menores que 2 no son primos
    if ($numero < 2) {
        return false;
    }
    
    // El 2 es el único número primo par
    if ($numero == 2) {
        return true;
    }
    
    // Los números pares mayores que 2 no son primos
    if ($numero % 2 == 0) {
        return false;
    }
    
    // Verificar divisibilidad desde 3 hasta la raíz cuadrada del número
    // Solo necesitamos verificar números impares
    for ($i = 3; $i <= sqrt($numero); $i += 2) {
        if ($numero % $i == 0) {
            return false; // Si encontramos un divisor, no es primo
        }
    }
    
    return true; // Si no encontramos divisores, es primo
}

// ====================================
// 3. PROBLEMA DE PALÍNDROMOS
// ====================================

/**
 * Función que determina si una cadena es un palíndromo
 * Un palíndromo se lee igual en ambas direcciones
 * 
 * @param string $texto La cadena a verificar
 * @return bool true si es palíndromo, false si no lo es
 */
function esPalindromo($texto) {
    // Convertir a minúsculas y eliminar espacios y caracteres especiales
    $textoLimpio = strtolower(preg_replace('/[^a-zA-Z0-9]/', '', $texto));
    
    // Obtener la longitud del texto limpio
    $longitud = strlen($textoLimpio);
    
    // Comparar caracteres desde los extremos hacia el centro
    for ($i = 0; $i < $longitud / 2; $i++) {
        // Si los caracteres en posiciones simétricas no coinciden, no es palíndromo
        if ($textoLimpio[$i] !== $textoLimpio[$longitud - 1 - $i]) {
            return false;
        }
    }
    
    return true; // Si todos los caracteres coinciden, es palíndromo
}

// ====================================
// PRUEBAS Y EJEMPLOS DE USO
// ====================================

echo "<h2>EJERCICIOS DE LÓGICA PHP - MÓDULO 4 ACTIVIDAD 2</h2>\n";
echo "<hr>\n";

// Prueba 1: Serie Fibonacci
echo "<h3>1. SERIE FIBONACCI</h3>\n";
$n = 10;
$fibonacci = generarFibonacci($n);
echo "Los primeros $n términos de Fibonacci son: " . implode(", ", $fibonacci) . "\n";
echo "<br><br>\n";

// Prueba 2: Números Primos
echo "<h3>2. NÚMEROS PRIMOS</h3>\n";
$numerosParaProbar = [2, 3, 4, 17, 25, 29, 100, 101];
foreach ($numerosParaProbar as $num) {
    $resultado = esPrimo($num) ? "SÍ es primo" : "NO es primo";
    echo "El número $num: $resultado\n<br>";
}
echo "<br>\n";

// Prueba 3: Palíndromos
echo "<h3>3. PALÍNDROMOS</h3>\n";
$palabrasParaProbar = [
    "radar", 
    "hello", 
    "A man a plan a canal Panama",
    "race a car",
    "anita lava la tina",
    "12321"
];

foreach ($palabrasParaProbar as $palabra) {
    $resultado = esPalindromo($palabra) ? "SÍ es palíndromo" : "NO es palíndromo";
    echo "'$palabra': $resultado\n<br>";
}

// ====================================
// FUNCIONES ADICIONALES PARA MOSTRAR PROCESO
// ====================================

/**
 * Función auxiliar que muestra el proceso de generación de Fibonacci paso a paso
 */
function mostrarProcesoFibonacci($n) {
    echo "<h4>Proceso paso a paso de Fibonacci($n):</h4>\n";
    
    if ($n <= 0) {
        echo "No se pueden generar términos para n <= 0\n";
        return;
    }
    
    $a = 0; $b = 1;
    echo "F(0) = 0\n<br>";
    
    if ($n > 1) {
        echo "F(1) = 1\n<br>";
        
        for ($i = 2; $i < $n; $i++) {
            $siguiente = $a + $b;
            echo "F($i) = F(" . ($i-2) . ") + F(" . ($i-1) . ") = $a + $b = $siguiente\n<br>";
            $a = $b;
            $b = $siguiente;
        }
    }
}

/**
 * Función auxiliar que muestra el proceso de verificación de primo
 */
function mostrarProcesoPrimo($numero) {
    echo "<h4>Proceso de verificación si $numero es primo:</h4>\n";
    
    if ($numero < 2) {
        echo "$numero < 2, por lo tanto NO es primo\n<br>";
        return;
    }
    
    if ($numero == 2) {
        echo "$numero es igual a 2, por lo tanto SÍ es primo\n<br>";
        return;
    }
    
    if ($numero % 2 == 0) {
        echo "$numero es par y mayor que 2, por lo tanto NO es primo\n<br>";
        return;
    }
    
    echo "Verificando divisores impares desde 3 hasta √$numero (" . (int)sqrt($numero) . "):\n<br>";
    
    for ($i = 3; $i <= sqrt($numero); $i += 2) {
        if ($numero % $i == 0) {
            echo "$numero ÷ $i = " . ($numero / $i) . " (divisible), por lo tanto NO es primo\n<br>";
            return;
        } else {
            echo "$numero ÷ $i = " . ($numero / $i) . " (no es entero)\n<br>";
        }
    }
    
    echo "No se encontraron divisores, por lo tanto $numero SÍ es primo\n<br>";
}

echo "\n<hr>\n";
echo "<h3>EJEMPLOS DETALLADOS:</h3>\n";

// Mostrar proceso detallado
mostrarProcesoFibonacci(8);
echo "<br>\n";
mostrarProcesoPrimo(17);

?>