@extends('layout.index')
@section('content')
    <p class="title">Category list</p>
    <div class="main">
        <form class="form-list" action="delete-product&products" method="post">
            <div class="action-product">
                <div class="btn-action">
                    <a href="add-category">Add new category</a>
                </div>
            </div>
            <div class="main">
                <div class="main-category">
                    @foreach($listCategory as $item)
                        <a href="{{BASE_URL.'category-delete/'.$item['iddm']}}" class="category-item">
                            <img src="{{$item['image']}}"
                                 alt="">
                            <div class="info-category">
                                <div class="category-name">{{$item['categories_name']}}</div>
                                <div class="quantity">Tươi ngon thượng hạng</div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </form>
@endsection