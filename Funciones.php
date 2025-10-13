<?php
// Función 1: Área de un círculo
function areaCirculo($radio) {
    if ($radio == 0) {
        return "El radio no puede ser 0";
    }
    define("PI", 3.1415926535898);
    return PI * pow($radio, 2);
}


// Función 2: Área de un triángulo
function areaTriangulo($base, $altura) {
    if ($base == 0 || $altura == 0) {
        return "La base o altura no pueden ser 0";
    }
    return ($base * $altura) / 2;
}

// Función 3: Etapa de vida según edad
function etapaVida($edad) {
    if ($edad == 0) {
        return "La edad no puede ser 0";
    }

    switch (true) {
        case ($edad > 0 && $edad < 6):
            return "Infancia";
        case ($edad >= 6 && $edad < 12):
            return "Niñez";
        case ($edad >= 12 && $edad < 20):
            return "Adolescencia";
        case ($edad >= 20 && $edad < 25):
            return "Juventud";
        case ($edad >= 25 && $edad < 60):
            return "Adultez";
        case ($edad >= 60):
            return "Vejez / Ancianidad";
        default:
            return "Edad no válida";
    }
}

// Función 4: Imprimir arreglo con while
function imprimirConWhile($arreglo) {
    if (empty($arreglo)) {
        echo "El arreglo está vacío\n";
        return;
    }

    $i = 0;
    while ($i < count($arreglo)) {
        echo $arreglo[$i] . "\n";
        $i++;
    }
}

// Función 5: Imprimir arreglo con do-while
function imprimirConDoWhile($arreglo) {
    if (empty($arreglo)) {
        echo "El arreglo está vacío\n";
        return;
    }

    $i = 0;
    do {
        echo $arreglo[$i] . "\n";
        $i++;
    } while ($i < count($arreglo));
}

// Función 6: Imprimir arreglo con foreach
function imprimirConForeach($arreglo) {
    if (empty($arreglo)) {
        echo "El arreglo está vacío\n";
        return;
    }

    foreach ($arreglo as $valor) {
        echo $valor . "\n";
    }
}

// Función 7: Selector de ciclo
function imprimirArreglo($arreglo, $modo) {
    switch ($modo) {
        case -1:
            imprimirConWhile($arreglo);
            break;
        case 0:
            imprimirConDoWhile($arreglo);
            break;
        case 1:
            imprimirConForeach($arreglo);
            break;
        default:
            echo "Modo no válido. Usa -1, 0 o 1.\n";
    }
}

// Función 8: Imprimir lista de personas
function imprimirPersonas($listaPersonas) {
    if (empty($listaPersonas)) {
        echo "La lista de personas está vacía\n";
        return;
    }

    foreach ($listaPersonas as $persona) {
        echo "Nombre: " . $persona["nombre"] . "\n";
        echo "Edad: " . $persona["edad"] . "\n";
        echo "Ciudad: " . $persona["ciudad"] . "\n";
        echo "-------------------------\n";
    }
}

// Ejemplos de uso (puedes comentar o descomentar según lo que quieras probar)

// echo areaCirculo(5);
// echo areaTriangulo(10, 4);
// echo etapaVida(23);

// $datos = array("uno", "dos", "tres");
// imprimirArreglo($datos, 1);

// $personas = array(
//     array("nombre" => "Jose", "edad" => 25, "ciudad" => "Tijuana"),
//     array("nombre" => "Ana", "edad" => 30, "ciudad" => "Monterrey"),
//     array("nombre" => "Luis", "edad" => 22, "ciudad" => "Guadalajara")
// );
// imprimirPersonas($personas);


// Nathalie Leyva Legy
?>