@extends('layout.index')
@section('content')
    <p class="title">Product list</p>
    <div class="main">
        <form class="form-list" action="delete-user" method="post">
            <div class="action-product">
                <div class="btn-action">
                    <a href="add-user">Add new user</a>
                    <a class="select-all">Select all</a>
                    <button onclick="event.preventDefault(); opentPopup(this)" class="delete-all" type="button">Delete
                    </button>
                </div>
            </div>
            <table class="table-main" id="table-top">
                <tr>
                    <th>Select</th>
                    <th>User name</th>
                    <th>Image</th>
                    <th>Email</th>
                    <th>phone</th>
                    <th>Action</th>
                @foreach($arrUser as $key => $value)
                    <tr>
                        <td><input type="checkbox" name="{{$value["iduser"]}}" id="{{$value["iduser"]}}"></td>
                        <td>{{$value["user_name"]}}</td>
                        <td>
                            <img src="{{$value["avatar"]}}" alt="">
                        </td>
                        <td><span>{{$value["email"]}}</span></td>
                        <td><span>{{$value["phone"]}}</span></td>
                        <td>
                            <a href="edit-product/{{$value["iduser"]}}">
                        <span class="material-symbols-outlined">
                            rate_review
                        </span>
                            </a>
                            <a onclick="event.preventDefault(); opentPopup(this,'delete')" class="a-popup"
                               href="delete-one-user/{{$value["iduser"]}}">
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
            @for($i = 1;$i <= $userPagesCount; $i++)
                <a href="?pageIndex={{$i}}#table-top">
                    <li class="item-pagination <?php if (!isset($_GET['pageIndex']) && $i == 1) {
                                            echo "active";
                                        } else if (isset($_GET['pageIndex']) && $_GET['pageIndex'] == $i) {
                                            echo "active";
                                        }; ?>"><?= $i ?></li>
                </a>
            @endfor
        </ul>
    </div>
@endsection