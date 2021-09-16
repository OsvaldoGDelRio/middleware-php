<?php

namespace src;

use src\PeticionInterface;
use src\Middleware;
use src\MiddlewareInterface;

class App
{
    protected $midleware;

    public function __construct(Middleware $midleware)
    {
        $this->midleware = $midleware;
    }

    public function add(array $midlewares)
    {
        foreach (array_reverse($midlewares) as $midleware)
        {
            $this->do($midleware);
        }
    }

    private function do(MiddlewareInterface $midleware)
    {
        $this->midleware->add($midleware);        
    }

    public function run(PeticionInterface $Peticion)
    {
        $this->midleware->handle($Peticion);
    }
}