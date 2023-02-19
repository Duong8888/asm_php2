@extends('layout.index')
@section('content')
    <div class="main">
        @if(isset($_SESSION['success']) && isset($_GET['msg']) )
            <span style="color: green">{{ $_SESSION['success'] }}</span>
        @endif
        <p class="sub-title">Add new slider</p>
        <form action="add-slider-save" method="post" enctype="multipart/form-data" class="form-add-product">
            <div class="form-left">
                <input type="text" name="title" id="" placeholder="title">
                @if(isset($_SESSION['errors']) && isset($_GET['msg']) )
                    <span style="color: red">{{ $_SESSION['errors']['title'] }}</span>
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
                @if(isset($_SESSION['errors']) && isset($_GET['msg']) )
                    <span style="color: red">{{ $_SESSION['errors']['img'] }}</span>
                @endif
                <input type="file" name="img" id="img" class="img-2">
            </div>
            <button name="add-product">Add new product</button>
        </form>
    </div>
@endsection