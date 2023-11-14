<?php

use Airam\Store\Shop;
use Airam\Store\MixedServices;
use Airam\Store\NormalServices;
use Airam\Store\Elements;
use Airam\Store\Products;
use Airam\Store\EventsServices;
use Airam\Store\SessionsServices;
use Airam\Store\PerishableProduct;

$shop = new Shop();

// 5 PRODUCTOS:

// 2 Productos no perecederos
$shop->addElements(new Products("Sobre de Magic", 22.00, "HASBRO", 20,  1));
$shop->addElements(new Products("Teclado x123", 300, "RAZER", 100,  25));
// 1 Producto perecedero caducado
$shop->addElements(new Products("Lays sabor Campesinas", 2.10, "LAYS", 67,  14,  "2014/10/12"));
// 1 Producto perecedero que caduque en 2 o 3 dias

$today = new DateTime();
$todayafterTwoDays = (clone $today)->add(new DateInterval('P2D'));
$shop->addElements(new Products("Coca Cola", 1.98, "Coca Cola", 20, $todayafterTwoDays->format('Y/m/d')));
// 1 Producto perecedero que caduque en 20 o 25 dias
$todayafterTwentyDays = (clone $today)->add(new DateInterval('P20D'));
$shop->addElements(new Products("Agua mineral sin gas", 1.98, "Coca Cola", 20, $todayafterTwentyDays->format('Y/m/d')));

// 9 SERVICIOS:


//uno caducado
$shop->addElements(new EventsServices("Scape-Room", 100.00,"2021/10/10"));
$shop->addElements(new EventsServices("Evento Caducado: Siam park", 50.00, $today->format('Y/m/d')));
$todayafterTwoMonths = (clone $today)->add(new DateInterval('P2M'));
$shop->addElements(new EventsServices("Concierto Artic Monkeys", 70.00, $todayafterTwoMonths->format('Y/m/d')));
// 2 servicios por sesiones: uno al que le quedan pocas sesiones y otro al que no le queda ninguna
$shop->addElements(new SessionsServices("Yoga", 58, 3));
$shop->addElements(new SessionsServices("futbol", 100, 2));
// 2 servicios mixtos: uno caducado y otro no.
$shop->addElements(new MixedServices("Ingles", 19.99, "2020/11/11", 100));
$shop->addElements(new MixedServices("Frances", 300, "2023/12/10", 209));
// 2 servicios normales.
$shop->addElements(new NormalServices("Gimnasio", 29.99));
$shop->addElements(new NormalServices("Aprobar el examen", 20));

$shop = new Shop();
