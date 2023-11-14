<?php
require_once '../vendor/autoload.php';

use Airam\ExamenT3\Shop;
use Airam\ExamenT3\MixedServices;
use Airam\ExamenT3\NormalServices;
use Airam\ExamenT3\Elements;
use Airam\ExamenT3\Products;
use Airam\ExamenT3\EventsServices;
use Airam\ExamenT3\SessionsServices;
use Airam\ExamenT3\PerishableProduct;

$shop = new Shop();

// 5 PRODUCTOS:

// 2 Productos no perecederos
$shop->addElements(new Products("Raton", 32, "Logitech", 50, 120));
$shop->addElements(new Products("Teclado", 42.99, "Krom", 100, 200));
// 1 Producto perecedero caducado
$shop->addElements(new PerishableProduct("Refresco", 1.50, "CocaCola", 2, 4, "2022/12/30"));
// 1 Producto perecedero que caduque en 2 o 3 dias
$shop->addElements(new PerishableProduct("Monitor", 100, "NOC", 500, 800, "2023/11/20"));
// 1 Producto perecedero que caduque en 20 o 25 dias
$shop->addElements(new PerishableProduct("PC", 230, "Koke", 2000, 3000, "2023/12/10"));

// 9 SERVICIOS:

// 3 eventos: uno caducado, otro que caduque hoy y otro que caduque en unos meses
$shop->addElements(new EventsServices("Concierto de Feid", 30, "2023/10/10"));
$shop->addElements(new EventsServices("Concierto de Mora", 50, "2023/11/10"));
$shop->addElements(new EventsServices("Concierto de Mora", 50, "2024/01/01"));
// 2 servicios por sesiones: uno al que le quedan pocas sesiones y otro al que no le queda ninguna
// $shop->addElements(new SessionsServices("Entrenamiento", 30, 10));
// $shop->addElements(new SessionsServices("Entrenamiento de futbol", 100, 2));
// 2 servicios mixtos: uno caducado y otro no.
$shop->addElements(new MixedServices("Curso de Ingles", 199.99, "2023/10/10", 10));
$shop->addElements(new MixedServices("Curso de LLados", 300, "2023/12/10", 20));
// 2 servicios normales.
$shop->addElements(new NormalServices("Bono de guauga", 29.99));
$shop->addElements(new NormalServices("Servicio de Atencion al cliente", 20));