@extends('layout.index')
@section('content')
    <p class="title">Category list</p>
    <div class="main">
        <form class="form-list" action="delete-product&products" method="post">
            <div class="action-product">
                <div class="btn-action">
                    <a href="add-category">Add new category</a>
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
                    <th>#</th>
                    <th></th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Action</th>
                @foreach($listCategory as $key => $value)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td></td>
                        <td>{{$value["categories_name"]}}</td>
                        <td>
                            <img src="{{$value["image"]}}" alt="">
                        </td>
                        <td>
                            <a href="edit-category/{{$value["iddm"]}}">
                        <span class="material-symbols-outlined">
                            rate_review
                        </span>
                            </a>
                            <a onclick="event.preventDefault(); opentPopup(this)" class="a-popup"
                               href="delete-category&id={{$value["iddm"]}}">
                        <span class="material-symbols-outlined">
                            delete
                        </span>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </form>
        <ul class="pagination">
            @for($i = 1;$i <= $pagesCount; $i++)
                <a href="?pageIndex={{$i}}#table-top">
                    <li class="item-pagination <?php if (!isset($_GET['pageIndex']) && $i == 1) {
                                                echo "active";
                                            } else if (isset($_GET['pageIndex']) && $_GET['pageIndex'] == $i) {
                                                echo "active";
                                            }; ?>"><?= $i ?></li>
                </a>
            @endfor
        </ul>
@endsection