<?php

use Phroute\Phroute\RouteCollector;

$url = !isset($_GET['url']) ? "/" : $_GET['url'];

$router = new RouteCollector();

// filter check đăng nhập
$router->filter('auth', function () {
    if (!isset($_SESSION['auth']) || empty($_SESSION['auth'])) {
        header('location: ' . BASE_URL . 'sign-in');
        die;
    }
});


// bắt đầu định nghĩa ra các đường dẫn
$router->get('/', function () {
    return "trang chủ";
});
$router->get('home-user',function (){
    echo "Trang người dùng.";
});

$router->get('product-list', [Web\ProductController::class, 'listProduct']);
$router->get('add-product', [Web\ProductController::class, 'addProductForm']);
$router->post('add-data-product', [Web\ProductController::class, 'addDataProduct']);
$router->get('/edit-product/{id}', function ($id) {
    (new Web\ProductController())->editProduct($id, false);
});
$router->post('/save-edit-product/{id}', [Web\ProductController::class, 'editProduct']);
$router->get('delete-one/{id}',[Web\ProductController::class, 'deleteProduct']);
$router->post('delete-product', [Web\ProductController::class, 'deleteProductAll']);


$router->get('category', [Web\CategoryController::class, 'listCategory']);
$router->get('add-category', [Web\CategoryController::class, 'showFormAdd']);
$router->get('edit-category/{id}', [Web\CategoryController::class, 'showFormEdit']);
$router->post('edit-category-save/{id}', [Web\CategoryController::class, 'showFormEditSave']);

$router->get('sign-in', [Web\UserController::class, 'showSignIn']);
$router->get('sign-up', [Web\UserController::class, 'showSignUp']);
$router->post('check-signIn',[Web\UserController::class, 'checkSignIn']);
$router->get('logOut/{action}',[Web\UserController::class, 'checkSignIn']);

$router->post('add-category', [Web\CategoryController::class, 'addCategory']);
$router->get('category-delete/{id}',[Web\CategoryController::class, 'categoryDelete']);

$router->post('update-product-category', [Web\CategoryController::class, 'updateProduct']);
$router->get('delete/{id}',[Web\CategoryController::class, 'deleteCategory']);

$router->get('user-list', [\Web\UserController::class, 'userList']);
$router->get('add-user', [\Web\UserController::class, 'showFormAdd']);
$router->post('add-data-user', [\Web\UserController::class, 'addUser']);
$router->get('delete-one-user/{id}',[\Web\UserController::class, 'deleteUser']);
$router->post('delete-user',[\Web\UserController::class, 'deleteAllUser']);
$router->post('sign-up-save/{action}',[\Web\UserController::class, 'addUser']);
$router->get('edit-user/{id}',[\Web\UserController::class, 'editUser']);
$router->post('save-data-user/{id}/{action}',[\Web\UserController::class, 'editUser']);

$router->get('voucher',[Web\VoucherController::class,'listVoucher']);
$router->get('add-voucher',[Web\VoucherController::class,'formAdd']);
$router->post('add-data-voucher',[Web\VoucherController::class,'addVoucher']);
$router->post('delete-voucher',[Web\VoucherController::class,'deleteAll']);
$router->get('delete-one-voucher/{id}',[Web\VoucherController::class,'deleteAll']);

$router->get('edit-voucher/{id}',[Web\VoucherController::class,'updateVoucher']);
$router->post('update-voucher/{id}/{action}',[Web\VoucherController::class,'updateVoucher']);


$router->get('slider-list',[Web\SliderController::class,'showSlider']);
$router->get('delete-one-slider/{id}',[Web\SliderController::class,'deleteSlider']);
$router->post('delete-all-slider',[Web\SliderController::class,'deleteAll']);
$router->get('add-slider',[Web\SliderController::class,'showFormAdd']);
$router->post('add-slider-save',[Web\SliderController::class,'addSlider']);

$router->get('edit-slider/{id}',[Web\SliderController::class,'editSlider']);
$router->post('edit-slider-save/{id}',[Web\SliderController::class,'saveEdit']);

# NB. You can cache the return value from $router->getData() so you don't have to create the routes each request - massive speed gains
$dispatcher = new Phroute\Phroute\Dispatcher($router->getData());

$response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $url);

// Print out the value returned from the dispatched function
echo $response;
?>
