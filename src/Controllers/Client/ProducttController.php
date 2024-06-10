<?php

namespace Hoangha\FpolyBaseWeb3014\Controllers\Client;

use Hoangha\FpolyBaseWeb3014\Commons\Controller;
use Hoangha\FpolyBaseWeb3014\Models\Product1;

class ProducttController extends Controller
{

    private Product1 $product1;

    public function __construct()
    {

        $this->product1 = new Product1();
    }

    public function index()
    {
        [$products,$totalPage] = $this->product1->paginate($_GET['page']?? 2);
       $this->renderViewClient('product1',[
        'products' =>$products,
        'totalPage' => $totalPage
        ]);
    }

    public function detail($id)
    {
        $product = $this->product1->findByID($id);

        $this->renderViewClient('product-details', [
            'product' => $product
        ]);
    }
}
