<?php

?>
<div class="main">
    <p class="sub-title">Edit product</p>
    <form action="?url=edit-product&save&idpro=<?= $_GET['idpro'] ?>" method="post" enctype="multipart/form-data" class="form-add-product">
        <div class="form-left">
            <input type="text" value="<?= $productInfo['product_name'] ?>" name="product_name" id="" placeholder="name">
            <input type="text" value="<?= $productInfo['product_price'] ?>" name="product_price" id="" placeholder="price">
            <select name="category" id="">
                <option value="1">cá</option>
                <option value="2">thịt</option>
                <option value="3">rău</option>
            </select>
        </div>
        <div class="form-right">
            <input type="text" value="<?= $productInfo['descripton'] ?>" name="description" id="" placeholder="description">
            <label for="img" class="box-img">
                <?php if(count($getImage) == 0){?>
                    <span class="material-symbols-outlined box-1">
                        add_photo_alternate
                    </span>
                <?php }?>
                <?php foreach ($getImage as $imgItem) { ?>

                    <span class="box-1">
                        <label onclick="closeImg(this)" for="<?=$imgItem['id']?>" class="close-img">
                            <span class="material-symbols-outlined">
                                close
                            </span>
                        </label>
                        <input type="checkbox" class="input-close"  name="<?=$imgItem['id']?>" id="<?=$imgItem['id']?>">
                        <img src="<?= $imgItem['src'] ?>" alt="">
                    </span>
                <?php } ?>
            </label>
            <input type="file" name="img-product[]" id="img" multiple>
        </div>
        <button name="add-product">Save edit</button>
    </form>
</div>