<?php

?>
<p class="title">Product list</p>
<div class="main">
    <form class="form-list" action="delete-product&products" method="post">
        <div class="action-product">
            <div class="btn-action">
                <a href="add-product">Add new product</a>
                <a class="select-all">Select all</a>
                <button  onclick="event.preventDefault(); opentPopup(this)"  class="delete-all" type="button">Delete</button>
            </div>

            <div class="tabel-form">
                <span class="material-symbols-outlined">
                    search
                </span>
                <input type="search" placeholder="Search" name="search-table" id="search-table">
            </div>
        </div>
        <table class="table-main" id="table-top">
            <tr>
                <th>Select</th>
                <th>Name</th>
                <th>Image</th>
                <th>Price</th>
                <th>Info</th>
                <th>Action</th>
                <?php foreach ($productsPages

                    as $key => $value) { ?>
            <tr>
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
                    <a href="edit-product/<?= $value['idpro'] ?>">
                        <span class="material-symbols-outlined">
                            rate_review
                        </span>
                    </a>
                    <a onclick="event.preventDefault(); opentPopup(this)" class="a-popup" href="delete-product&id=<?= $value['idpro'] ?>">
                        <span class="material-symbols-outlined">
                            delete
                        </span>
                    </a>
                </td>
            </tr>
        <?php } ?>
        </table>
    </form>
    <ul class="pagination">
        <?php for ($i = 1; $i <= $productsPagesCount; $i++) { ?>
            <a href="?pageIndex=<?= $i ?>#table-top">
                <li class="item-pagination <?php if (!isset($_GET['pageIndex']) && $i == 1) {
                                                echo "active";
                                            } else if (isset($_GET['pageIndex']) && $_GET['pageIndex'] == $i) {
                                                echo "active";
                                            }; ?>"><?= $i ?></li>
            </a>
        <?php } ?>
    </ul>