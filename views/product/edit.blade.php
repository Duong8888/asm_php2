@extends('layout.index')
@section('content')
    <div class="main">
        <p class="sub-title">Edit product</p>
        <form action="{{BASE_URL."save-edit-product/".$productInfo['idpro']}}" method="post"
              enctype="multipart/form-data" class="form-add-product">
            <div class="form-left">
                <input type="text" value="{{$productInfo['product_name']}}" name="product_name" id=""
                       placeholder="name">
                <input type="text" value="{{$productInfo['product_price']}}" name="product_price" id=""
                       placeholder="price">
                <select name="category" id="">
                    @foreach($listCategory as $item)
                        <option <?=($productInfo['iddm'] == $item['iddm'])?"selected":""?> value="{{$item['iddm']}}">{{$item['categories_name']}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-right">
                <input type="text" value="{{$productInfo['descripton']}}" name="description" id=""
                       placeholder="description">
                <label for="img" class="box-img">
                    @if(count($getImage) == 0)
                        <span class="material-symbols-outlined box-1">
                        add_photo_alternate
                        </span>
                    @endif
                    @foreach($getImage as $imgItem)
                        <span class="box-1">
                        <label onclick="closeImg(this)" for="{{$imgItem['id']}}" class="close-img">
                            <span class="material-symbols-outlined">
                                close
                            </span>
                        </label>
                        <input type="checkbox" class="input-close" name="{{$imgItem['id']}}" id="<?=$imgItem['id']?>">
                        <img src=".{{$imgItem['src']}}" alt="">
                    </span>
                    @endforeach
                </label>
                <label for="img" class="box-display"></label>
                <input type="file" name="img-product[]" id="img" class="img-1" multiple>
            </div>
            <button name="add-product">Save edit</button>
        </form>
    </div>
@endsection