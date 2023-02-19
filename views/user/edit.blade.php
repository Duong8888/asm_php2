@extends('layout.index')
@section('content')
    <div class="main">

        <p class="sub-title">Edit user</p>
        <form action="{{BASE_URL.'save-data-user/'.$infoUser['iduser'].'/save'}}" method="post" enctype="multipart/form-data" class="form-add-product">
            <div class="form-left">
                <input type="text" value="{{$infoUser['user_name']}}" name="user_name" id="" placeholder="name">

                <input type="password" value="{{$infoUser['pass']}}" name="pass" id="" placeholder="password">

                <input type="password" value="{{$infoUser['pass']}}" name="re-pass" id="" placeholder="re-password">

            </div>
            <div class="form-right">
                <input type="text" value="{{$infoUser['email']}}" name="email" id="" placeholder="email">

                <input type="number" value="{{$infoUser['phone']}}" name="phone" id="" placeholder="phone">

                <label for="img" class="box-img">
                <span class="material-symbols-outlined box-2 box-1">
                    <img src="{{$path.$infoUser['avatar']}}" alt="">
                </span>
                </label>

                <input type="file" name="img-user" id="img" class="img-2">
            </div>
            <button name="add-product">Add new user</button>
        </form>
    </div>
@endsection