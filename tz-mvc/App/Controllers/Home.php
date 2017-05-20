<?php
namespace App\Controllers;

use Libs;

class Home extends Libs\Controller
{
    public function getIndex()
    {
        $this->View->render('home',['title'=>'ticket']);
    }
}
