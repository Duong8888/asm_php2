@extends('layout.index')
@section('content')
    <div class="main">
        @if(isset($_SESSION['success']) && isset($_GET['msg']) )
            <span style="color: green">{{ $_SESSION['success'] }}</span>
        @endif
        <p class="sub-title">Add new product</p>
        <form action="add-data-product" method="post" enctype="multipart/form-data" class="form-add-product">
            <div class="form-left">
                <input type="text" name="product_name" id="" placeholder="name">
                @if(isset($_SESSION['errors']) && isset($_GET['msg']) )
                    <span style="color: red">{{ $_SESSION['errors']['product_name'] }}</span>
                @endif
                <input type="text" name="product_price" id="" placeholder="price">
                @if(isset($_SESSION['errors']) && isset($_GET['msg']) )
                    <span style="color: red">{{ $_SESSION['errors']['product_price'] }}</span>
                @endif
                <select name="category" id="">
                    <option value="0">Lựa chọn danh mục</option>
                    @foreach($listCategory as $item)
                        <option value="{{$item['iddm']}}">{{$item['categories_name']}}</option>
                    @endforeach
                </select>
                @if(isset($_SESSION['errors']) && isset($_GET['msg']) )
                    <span style="color: red">{{ $_SESSION['errors']['category'] }}</span>
                @endif
            </div>
            <div class="form-right">
                <input type="text" name="description" id="" placeholder="description">
                @if(isset($_SESSION['errors']) && isset($_GET['msg']) )
                    <span style="color: red">{{ $_SESSION['errors']['description'] }}</span>
                @endif
                <label for="img" class="box-img">
                <span class="material-symbols-outlined box-2 box-1">
                    add_photo_alternate
                </span>
                </label>
                <input type="file" name="img-product[]" id="img" class="img-2" multiple>
            </div>
            <button name="add-product">Add new product</button>
        </form>
    </div>
@endsection