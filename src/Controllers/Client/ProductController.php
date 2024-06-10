<?php

namespace Hoangha\FpolyBaseWeb3014\Controllers\Client;

use Hoangha\FpolyBaseWeb3014\Commons\Controller;
use Hoangha\FpolyBaseWeb3014\Models\Product;


class ProductController extends Controller
{
    private Product $product;
  

    public function __construct()
    {
        $this->product = new Product();

    }

    public function index()
    {
        [$products,$totalPage] = $this->product->paginate($_GET['page']?? 1);
       $this->renderViewClient('product',[
        'products' =>$products,
        'totalPage' => $totalPage
        ]);
    }

    public function detail($id)
    {
        $product = $this->product->findByID($id);

        $this->renderViewClient('product-details', [
            'product' => $product
        ]);
    }
}
