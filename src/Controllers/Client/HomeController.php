<?php

namespace Hoangha\FpolyBaseWeb3014\Controllers\Client;

use Hoangha\FpolyBaseWeb3014\Commons\Controller;
use Hoangha\FpolyBaseWeb3014\Models\Product;
use Hoangha\FpolyBaseWeb3014\Models\Category;

class HomeController extends Controller{
    private Category $category;
    private Product $product;

    public function __construct()
    {
        $this->category = new Category();
         $this->product = new Product();
    }

    public function index(){
        $category=$this->category->all();
        $products = $this->product->all();
        $this->renderViewClient('home',[
            'category' => $category,
            'products' => $products
        ]);
    }


}