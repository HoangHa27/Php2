<?php

namespace Hoangha\FpolyBaseWeb3014\Controllers\Admin;

use Hoangha\FpolyBaseWeb3014\Commons\Controller;
use Hoangha\FpolyBaseWeb3014\Commons\Helper;
use Hoangha\FpolyBaseWeb3014\Models\Order;


class OrderController extends Controller{
    private Order $order;

    public function __construct()
    {
        $this->order = new Order();
    }

    public function index(){
        $orders = $this->order->all();
        $this->renderViewAdmin('orders.index',[
            'orders' => $orders
        ]);
    }

    public function show($id){
        $order = $this->order->findByID($id);
        $this->renderViewAdmin('orders.show',[
            'order' => $order
        ]);
    }

  
    
}