@extends('layout.index')
@section('content')
    <div class="main">
        @if(isset($_SESSION['success']) && isset($_GET['msg']) )
            <span style="color: green">{{ $_SESSION['success'] }}</span>
        @endif
        <p class="sub-title">Add new user</p>
        <form action="add-data-user" method="post" enctype="multipart/form-data" class="form-add-product">
            <div class="form-left">
                <input type="text" name="user_name" id="" placeholder="name">
                @if(isset($_SESSION['errors']) && isset($_GET['msg']) )
                    <span style="color: red">{{ $_SESSION['errors']['user_name'] }}</span>
                @endif
                <input type="password" name="pass" id="" placeholder="password">
                @if(isset($_SESSION['errors']) && isset($_GET['msg']) )
                    <span style="color: red">{{ $_SESSION['errors']['pass'] }}</span>
                @endif
                <input type="password" name="re-pass" id="" placeholder="re-password">
                @if(isset($_SESSION['errors']) && isset($_GET['msg']) )
                    <span style="color: red">{{ $_SESSION['errors']['re-pass'] }}</span>
                @endif
            </div>
            <div class="form-right">
                <input type="text" name="email" id="" placeholder="email">
                @if(isset($_SESSION['errors']) && isset($_GET['msg']) )
                    <span style="color: red">{{ $_SESSION['errors']['email'] }}</span>
                @endif
                <input type="number" name="phone" id="" placeholder="phone">
                @if(isset($_SESSION['errors']) && isset($_GET['msg']) )
                    <span style="color: red">{{ $_SESSION['errors']['phone'] }}</span>
                @endif
                <label for="img" class="box-img">
                <span class="material-symbols-outlined box-2 box-1">
                    add_photo_alternate
                </span>
                </label>
                @if(isset($_SESSION['errors']) && isset($_GET['msg']) )
                    <span style="color: red">{{ $_SESSION['errors']['img-user'] }}</span>
                @endif
                <input type="file" name="img-user" id="img" class="img-2">
            </div>
            <button name="add-product">Add new user</button>
        </form>
    </div>
@endsection