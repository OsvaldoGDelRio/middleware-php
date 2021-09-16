<?php
namespace src;

use src\PeticionInterface;
use src\FactoryInterface;

interface MiddlewareInterface
{
    public function __construct(FactoryInterface $Factory);
    public function __invoke(PeticionInterface $peticion, callable $next);
}