<?php

namespace Hoangha\FpolyBaseWeb3014\Controllers\Admin;

use Hoangha\FpolyBaseWeb3014\Commons\Controller;
use Hoangha\FpolyBaseWeb3014\Commons\Helper;
use Hoangha\FpolyBaseWeb3014\Models\Category;
use Rakit\Validation\Validator;

class CategoryController extends  Controller{
    private Category $category ;

    public function __construct()
    {
        $this->category= new Category();
    }

    public function index(){
        $category = $this->category->all();
        $this->renderViewAdmin('categorys.index',[
            'category' =>$category
        ]);
    }

    public function show($id){
        $category = $this->category->findByID($id);
        $this->renderViewAdmin('categorys.show',[
            'category' =>$category
        ]);
    }

  
    public function create()
    {
        $this->renderViewAdmin('categorys.create');
    }

        
       public function store()
       {
           // VALIDATE
           $validator = new Validator;
           $validation = $validator->make($_POST + $_FILES, [
               'name'                  => 'required|max:50',
           ]);
           $validation->validate();
   
           if ($validation->fails()) {
               $_SESSION['errors'] = $validation->errors()->firstOfAll();
   
               header('Location: ' . url('admin/categorys/create'));
               exit;
           } else {
               $data = [
                    //'id' => $_POST['id'],
                   'name' => $_POST['name']
               ];
   
               $this->category->insert($data);
   
               $_SESSION['status'] = true;
               $_SESSION['msg'] = 'Thao tác thành công!';
   
               header('Location: ' . url('admin/categorys'));
               exit;
           }
       }
       public function edit($id)
       {
           $category = $this->category->findByID($id);
   
           $this->renderViewAdmin('categorys.edit', [
               'category' => $category
           ]);
       }
   
       public function update($id)
       {
           $category = $this->category->findByID($id);
   
           $validator = new Validator;
           $validation = $validator->make($_POST + $_FILES, [
               'name'                  => 'required|max:50',
           ]);
           $validation->validate();
   
           if ($validation->fails()) {
               $_SESSION['errors'] = $validation->errors()->firstOfAll();
   
               header('Location: ' . url("admin/categorys/{$category['id']}/edit"));
               exit;
           } else {
               $data = [
                   'name'     => $_POST['name'],
        
               ];
   
               $this->category->update($id, $data);
   
               $_SESSION['status'] = true;
               $_SESSION['msg'] = 'Thao tác thành công';
   
               header('Location: ' . url("admin/categorys/{$category['id']}/edit"));
               exit;
           }
       }
   

        public function delete($id)
        {
            try {
                $this->category->delete($id);
    
                $_SESSION['status'] = true;
                $_SESSION['msg'] = 'Thao tác thành công!';
    
                header('Location: ' . url('admin/categorys'));
                exit();
            } catch (\Throwable $th) {
                $_SESSION['status'] = true;
                $_SESSION['msg'] = 'Thao tác KHÔNG thành công!';
            }
        }
    }
     

