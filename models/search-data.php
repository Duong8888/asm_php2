<?php
include_once 'env.php';
include_once 'db.php';
include_once 'Product.php';
use Web\Product;
$product = new Product();
$arrData = $product->searchProduct($_SESSION['key']);
?>
<tr>
    <th>Select</th>
    <th>Name</th>
    <th>Image</th>
    <th>Price</th>
    <th>Info</th>
    <th>Action</th>
<tr>
<?php if (count($arrData) == 0) { ?>
<tr>
    <td colspan="6" style="text-align: center;">không có bản gi nào</td>
<tr>
<?php } else { ?>
    <?php foreach ($arrData as $key => $value) { ?>
        <td><input type="checkbox" name="<?= $value['idpro'] ?>" id="<?= $value['idpro'] ?>"></td>
        <td><?= $value['product_name'] ?></td>
        <td>
            <!--                ảnh làm său-->
            <img src="<?= $product->getProduct(false, $value['idpro'])[0]['src'] ?>" alt="">
        </td>
        <td><span><?= $value['product_price'] ?></span>$</td>
        <td>
            <a href="">
                <span class="material-symbols-outlined">
                    visibility
                </span>
            </a>
        </td>
        <td>
            <a href="?url=edit-product&idpro=<?= $value['idpro'] ?>">
                <span class="material-symbols-outlined">
                    rate_review
                </span>
            </a>
            <a onclick="return confirm('Bạn chắc chắn muốn xóa chứ.')" href="?url=delete-product&id=<?= $value['idpro'] ?>">
                <span class="material-symbols-outlined">
                    delete
                </span>
            </a>
        </td>
</tr>
<?php }} ?>