@extends('layout.index')
@section('content')
    <div class="main">
        <form class="form-list" action="{{BASE_URL.'update-product-category'}}" method="post">
            <div class="banner">
                <img src="{{$path.$category['image']}}">
                <p class="name-category">{{$category['categories_name']}}</p>
            </div>
            <div class="action-product">
                <div class="btn-action">
                    <a href="{{BASE_URL.'delete/'.$category['iddm']}}" onclick="event.preventDefault(); opentPopup(this,'delete')" class="delete-category">Delete category</a>
                    <a class="select-all">Select all</a>

                    <select name="category-1" id="">
                        @foreach($listCategory as $item)
                            <option value="{{$item['iddm']}}">{{$item['categories_name']}}</option>
                        @endforeach
                    </select>

                    <button onclick="event.preventDefault(); opentPopup(this)" class="delete-all"
                            type="button">lưu thay đổi
                    </button>

                </div>
            </div>
            @if(isset($_SESSION['erro']))
                <p style="color: red" class="message-category">{{$_SESSION['erro']}}</p>
            @endif
            <p class="message-category">Những sản phẩm thuộc danh mục hiện tại</p>
            <table class="table-main" id="table-top">
                <tr>
                    <th>Select</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Price</th>
                    <th>Descripton</th>
                </tr>
                @foreach($product as $item)
                    <tr>
                        <td><input type="checkbox" name="{{$item['idpro']}}" id="{{$item['idpro']}}"></td>
                        <td>{{$item['product_name']}}</td>
                        <td>
                            <img src="{{$path.$productAll->getProduct(false, $item['idpro'])[0]['src']}}" alt="">
                        </td>
                        <td><span>{{$item['product_price']}}</span>$</td>
                        <td>
                            {{$item['descripton']}}
                        </td>
                    </tr>
                @endforeach
            </table>
        </form>
    </div>
@endsection