<?php

use Phroute\Phroute\RouteCollector;

$url = !isset($_GET['url']) ? "/" : $_GET['url'];

$router = new RouteCollector();

// filter check đăng nhập
$router->filter('auth', function(){
    if(!isset($_SESSION['auth']) || empty($_SESSION['auth'])){
        header('location: ' . BASE_URL . 'sign-in');die;
    }
});


// bắt đầu định nghĩa ra các đường dẫn
$router->get('/', function(){
    return "trang chủ";
});


$router->get('product-list', [Web\ProductController::class, 'listProduct']);
$router->get('add-product', [Web\ProductController::class, 'addProductForm']);
$router->post('add-data-product', [Web\ProductController::class, 'addDataProduct']);
$router->get('/edit-product/{id}',function ($id){
    (new Web\ProductController())->editProduct($id,false);
});
$router->get('delete-one/{id}',function ($id){
    (new Web\ProductController())->deleteProduct($id);
});// xóa tất cả các mục đã chọn
$router->post('delete-product',[Web\ProductController::class,'deleteProductAll']);// xóa từng mục một


$router->get('category',[Web\CategoryController::class,'listCategory']);
$router->get('add-category',[Web\CategoryController::class,'showFormAdd']);
$router->get('sign-in',[Web\UserController::class,'showSignIn']);
$router->get('sign-up',[Web\UserController::class,'showSignUp']);

$router->post('add-category',[Web\CategoryController::class, 'addCategory']);
$router->get('category-delete/{id}',function ($id){
    (new Web\CategoryController())->categoryDelete($id);
});

$router->post('update-product-category',[Web\CategoryController::class, 'updateProduct']);
$router->get('delete/{id}',function ($id){
    (new Web\CategoryController())->deleteCategory($id);
});
//$router->get();

# NB. You can cache the return value from $router->getData() so you don't have to create the routes each request - massive speed gains
$dispatcher = new Phroute\Phroute\Dispatcher($router->getData());

$response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $url);

// Print out the value returned from the dispatched function
echo $response;


?>
