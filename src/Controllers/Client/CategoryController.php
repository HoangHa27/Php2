<?php

namespace Hoangha\FpolyBaseWeb3014\Controllers\Client;
use Hoangha\FpolyBaseWeb3014\Commons\Controller;
use Hoangha\FpolyBaseWeb3014\Commons\Helper;
use Hoangha\FpolyBaseWeb3014\Models\Category;

class CategoryController extends Controller{
    private Category $category;

    public function __construct()
    {
        $this->category = new Category();
    }

    public function detail($id)
    {
        $category = $this->category->findByID($id);

        $this->renderViewClient('category', [
            'category' => $category
        ]);
    }
}