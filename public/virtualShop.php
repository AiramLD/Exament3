<?php
require_once '../vendor/autoload.php';

use Airam\Store\Shop;
use Airam\Store\MixedServices;
use Airam\Store\NormalServices;
use Airam\Store\Elements;
use Airam\Store\Products;
use Airam\Store\EventsServices;
use Airam\Store\SessionsServices;
use Airam\Store\PerishableProduct;

// 5 PRODUCTOS:

// 2 Productos no perecederos
$producto1 = new Products("Sobre de Magic", 22.00, "HASBRO", 20,  1);
$producto2 = new Products("Teclado x123", 300, "RAZER", 100,  25);
//1 producto perecedero ya caducado
$producto3 = new Products("Lays sabor Campesinas", 2.10, "LAYS", 67,  14,  "2014/10/12");
$today = new DateTime();
$todayafterTwoDays = (clone $today)->add(new DateInterval('P2D'));
// 1 producto perecedero que caduque en 2 o 3 días
$producto4 = new Products("Agua mineral", 2.98, "Coca Cola", 20, $hoyDespuesdeDosDias->format('Y/m/d'));

// 1 producto perecedero que caduque en 20 días
$todayafterTwentyDays = (clone $today)->add(new DateInterval('P20D'));
$producto5 = new Products("Agua mineral sin gas", 1.98, "Coca Cola", 20, $todayafterTwentyDays->format('Y/m/d'));

// 9 SERVICIOS:
//Servicios
// 3 Eventos
//uno caducado
$servicio1 = new EventsServices("Scape-Room", 100.00,"2021/10/10");

//uno que caduque today
$servicio2 = new EventsServices("Evento Caducado: Siam park", 50.00, $today->format('Y/m/d'));

//que caduque en unos meses
$todayafterTwoMonths = (clone $today)->add(new DateInterval('P3M'));
$servicio3 = new EventsServices("Concierto Artic Monkeys", 70.00, $todayafterTwentyDays->format('Y/m/d'));

// 2 servicios por sesiones: uno al que le quedan pocas sesiones y otro al que no le queda ninguna.
$servicio4 = new SessionsServices("Yoga", 58, 3);
$servicio5 = new SessionsServices("Natacion", 15.95, 0);

//2 Servicios Mixtos
//caducado
$servicio6 = new MixedServices("Escalada", 20, "2020/03/05", 8);

//sin caducar
$servicio7 = new MixedServices("Bicicleta", 30, "2023/12/10", 1);

// Servicios Normales
$servicio8 = new NormalServices("Andar", 0.01);
$servicio9 = new NormalServices("Cocinar", 10.01);


$shop = new Shop();
//Añadimos los Productos
$shop->addElement($producto1);
$shop->addElement($producto2);
$shop->addElement($producto3);
$shop->addElement($producto4);
$shop->addElement($producto5);
//Añade servicios
$shop->addElement($servicio1);
$shop->addElement($servicio2);
$shop->addElement($servicio3);
$shop->addElement($servicio4);
$shop->addElement($servicio5);
$shop->addElement($servicio6);
$shop->addElement($servicio7);
$shop->addElement($servicio8);
$shop->addElement($servicio9);

