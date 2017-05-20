<?php
namespace Libs;

class Controller
{
    protected $View;

    public function __construct()
    {
        $this->View = new View();
    }
}