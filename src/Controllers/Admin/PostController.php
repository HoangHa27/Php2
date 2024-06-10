<?php

namespace Hoangha\FpolyBaseWeb3014\Controllers\Admin;

use Hoangha\FpolyBaseWeb3014\Commons\Controller;
use Hoangha\FpolyBaseWeb3014\Commons\Helper;
use Hoangha\FpolyBaseWeb3014\Models\Post;
use Hoangha\FpolyBaseWeb3014\Models\Category;
use Rakit\Validation\Validator;

class PostController extends Controller
{
    private Post $post;
    private Category $category;

    public function __construct()
    {
        $this->post = new Post();
        $this->category = new Category();
    }
    public function index()
    {
        $posts = $this->post->all();

        $this->renderViewAdmin('posts.index', [
            'posts' => $posts
        ]);
    }

    public function create()
    {
        $categories = $this->category->all();

        $categoryPluck = array_column($categories, 'name', 'id');

        $this->renderViewAdmin('posts.create', [
            'categoryPluck' => $categoryPluck
        ]);
    }

    public function store()
    {
        // VALIDATE
        $validator = new Validator;
        $validation = $validator->make($_POST + $_FILES, [
            'name'                  => 'required|max:50',
            'review'                => 'required',
            'content'               => 'required',
            'image'                => 'uploaded_file:0,2048K,png,jpeg,jpg',
        ]);
        $validation->validate();

        if ($validation->fails()) {
            $_SESSION['errors'] = $validation->errors()->firstOfAll();

            header('Location: ' . url('admin/posts/create'));
            exit;
        } else {
            $data = [
                'category_id'   => $_POST['category_id'],
                'name'           => $_POST['name'],
                'review'        => $_POST['review'],
                'content'       => $_POST['content'],
            ];

            if (!empty($_FILES['image']) && $_FILES['image']['size'] > 0) {

                $from = $_FILES['image']['tmp_name'];
                $to   = 'assets/uploads/' . time() . $_FILES['image']['name'];

                if (move_uploaded_file($from, PATH_ROOT . $to)) {
                    $data['image'] = $to;
                } else {
                    $_SESSION['errors']['image'] = 'Upload KHÔNG thành công!';

                    header('Location: ' . url('admin/posts/create'));
                    exit;
                }
            }

            $this->post->insert($data);

            $_SESSION['status'] = true;
            $_SESSION['msg'] = 'Thao tác thành công!';

            header('Location: ' . url('admin/posts'));
            exit;
        }
    }

    public function show($id)
    {
        $post = $this->post->findByID($id);

        $this->renderViewAdmin('posts.show', [
            'post' => $post
        ]);
    }

    public function edit($id)
    {
        $post = $this->post->findByID($id);
        $categories = $this->category->all();

        $categoryPluck = array_column($categories, 'name', 'id');

        $this->renderViewAdmin('posts.edit', [
            'post' => $post,
            'categoryPluck' => $categoryPluck,
        ]);
    }

    public function update($id)
    {
        $post = $this->post->findByID($id);

        // VALIDATE
        $validator = new Validator;
        $validation = $validator->make($_POST + $_FILES, [
            'category_id'           => 'required',
            'name'                  => 'required|max:50',
            'review'                => 'required',
            'content'               => 'required',
            'image'                => 'required|uploaded_file:0,2048K,png,jpeg,jpg',
        ]);
        $validation->validate();

        if ($validation->fails()) {
            $_SESSION['errors'] = $validation->errors()->firstOfAll();

            header('Location: ' . url("admin/posts/$id/edit"));
            exit;
        } else {
            $data = [
                'category_id'   => $_POST['category_id'],
                'name'           => $_POST['name'],
                'review'        => $_POST['review'],
                'content'       => $_POST['content'],
            ];

            if (!empty($_FILES['image']) && $_FILES['image']['size'] > 0) {

                $from = $_FILES['image']['tmp_name'];
                $to   = 'assets/uploads/' . time() . $_FILES['image']['name'];

                if (move_uploaded_file($from, PATH_ROOT . $to)) {
                    $data['image'] = $to;
                } else {
                    $_SESSION['errors']['image'] = 'Upload KHÔNG thành công!';

                    header('Location: ' . url("admin/posts/$id/edit"));
                    exit;
                }
            }

            $this->post->update($id, $data);

            if ($post['image'] && file_exists(PATH_ROOT . $post['image'])) {
                unlink(PATH_ROOT . $post['image']);
            }

            $_SESSION['status'] = true;
            $_SESSION['msg'] = 'Thao tác thành công!';

            //header('Location: ' . url("admin/posts/$id/edit"));
            header('Location: ' . url("admin/posts"));
            exit;
        }
    }





    public function delete($id)
    {
        try {
            $this->post->delete($id);

            $_SESSION['status'] = true;
            $_SESSION['msg'] = 'Thao tác thành công!';

            header('Location: ' . url('admin/posts'));
            exit();
        } catch (\Throwable $th) {
            $_SESSION['status'] = true;
            $_SESSION['msg'] = 'Thao tác KHÔNG thành công!';
        }
    }
}
