<?php

namespace Hoangha\FpolyBaseWeb3014\Controllers\Admin;

use Hoangha\FpolyBaseWeb3014\Commons\Controller;
use Hoangha\FpolyBaseWeb3014\Commons\Helper;

use Hoangha\FpolyBaseWeb3014\Models\Product;


class DashboardController extends Controller
{
    private Product $product;

    public function __construct()
    {
        $this->product = new Product();
    }

    public function dashboard() {    
        $products = $this->product->all();

        $analysisProduct = array_map(function ($item) {
            return [
                $item['name'],
                $item['category_id']
            ];
        }, $products);

        array_unshift($analysisProduct, ['Tên sản phẩm','giá sản phẩm']);

        $this->renderViewAdmin(__FUNCTION__, [
            'analysisProduct' => $analysisProduct
        ]);
    }
}