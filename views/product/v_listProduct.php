<?php
?>
<p class="title">Product list</p>
<div class="main">
    <div class="action-product">
        <div class="btn-action">
            <a href="">Add new product</a>
            <a href="">Select all</a>
            <a href="">Delete</a>
        </div>


        <div class="tabel-form">
                        <span class="material-symbols-outlined">
                            search
                        </span>
            <input type="search" placeholder="Search" name="search-table" id="">
        </div>
    </div>
    <table class="table-main">
        <tr>
            <th>Select</th>
            <th>Name</th>
            <th>Image</th>
            <th>Price</th>
            <th>Info</th>
            <th>Action</th>
            <?php foreach ($product

            as $key => $value){ ?>
        <tr>
            <td><input type="checkbox" name="<?= $key ?>"></td>
            <td><?= $value['product_name'] ?></td>
            <td>
                <!--                ảnh làm său-->
                <img src="http://genk.mediacdn.vn/k:thumb_w/640/2015/screen-shot-2015-07-30-at-2-31-57-pm-1438334096188/cau-chuyen-ve-nguoi-tao-ra-chu-ech-xanh-than-thanh.png"
                     alt=""></td>
            <td><span><?= $value['product_price'] ?></span>$</td>
            <td>
                <a href="">
                                <span class="material-symbols-outlined">
                                    visibility
                                </span>
                </a>
            </td>
            <td>
                <a href="">
                                <span class="material-symbols-outlined">
                                    rate_review
                                </span>
                </a>
                <a href="">
                                <span class="material-symbols-outlined">
                                    delete
                                </span>
                </a>
            </td>
        </tr>
        <?php } ?>
    </table>
    <ul class="pagination">
        <li class="item-pagination">1</li>
        <li class="item-pagination">2</li>
        <li class="item-pagination">3</li>
        <li class="item-pagination active">4</li>
        <li class="item-pagination">5</li>
    </ul>