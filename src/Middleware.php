<?php
namespace src;

use src\PeticionInterface;
use src\MiddlewareInterface;

class Middleware
{
    protected $start;

    public function __construct()
    {
        $this->start = function ($peticion){
            return $peticion;
        };
    }

    public function add(MiddlewareInterface $midleware)
    {
        $next = $this->start;

        $this->start = function (PeticionInterface $peticion) use ($midleware, $next)
        {
            return $midleware($peticion, $next);
        };
    }

    public function handle(PeticionInterface $peticion)
    {
        return call_user_func($this->start, $peticion);
    }
}