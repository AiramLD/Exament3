<?php

namespace Airam\Examen;
use Airam\ExamenT3\Elements;

abstract class Services extends Elements {
    protected $services = [];
    public function __construct(array $data) {
        parent::__construct($data['name'], $data['basePrice']);
        $this->services = $data['services'];
    }
    }
    


