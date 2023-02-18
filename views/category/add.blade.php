@extends('layout.index')
@section('content')
    <div class="main">
        @if(isset($_SESSION['success']) && isset($_GET['msg']) )
            <span style="color: green">{{ $_SESSION['success'] }}</span>
        @endif
        <p class="sub-title">Add new category</p>
        <form action="add-category" method="post" enctype="multipart/form-data" class="form-add-product">
            <div class="form-left">
                <input type="text" name="category_name" id="" placeholder="name">
                @if(isset($_SESSION['errors']) && isset($_GET['msg']) )
                    <span style="color: red">{{ $_SESSION['errors']['category_name'] }}</span>
                @endif
            </div>

            <div class="form-right">
                <label for="img" class="box-img">
                <span class="material-symbols-outlined box-2 box-1">
                    add_photo_alternate
                </span>
                </label>
                <input type="file" name="img-category" id="img" class="img-2">
                @if(isset($_SESSION['errors']) && isset($_GET['msg']) )
                    <span style="color: red">{{ $_SESSION['errors']['img-category'] }}</span>
                @endif
            </div>
            <button name="add-product">Add new category</button>
        </form>
    </div>
@endsection