@extends('layout.index')
@section('content')
    <div class="main">
        @if(isset($_SESSION['success']) && isset($_GET['msg']) )
            <span style="color: green">{{ $_SESSION['success'] }}</span>
        @endif
        <p class="sub-title">Add new voucher</p>
        <form action="add-data-voucher" method="post" enctype="multipart/form-data" class="form-add-product">
            <div class="form-left">
                <input type="text" name="content" id="" placeholder="name">
                @if(isset($_SESSION['errors']) && isset($_GET['msg']) )
                    <span style="color: red">{{ $_SESSION['errors']['content'] }}</span>
                @endif
                <input type="number" name="discount" id="" placeholder="discount">
                @if(isset($_SESSION['errors']) && isset($_GET['msg']) )
                    <span style="color: red">{{ $_SESSION['errors']['discount'] }}</span>
                @endif
            </div>
            <div class="form-right">
                <input type="number" name="quantity" id="" placeholder="Quantity">
                @if(isset($_SESSION['errors']) && isset($_GET['msg']) )
                    <span style="color: red">{{ $_SESSION['errors']['quantity'] }}</span>
                @endif
                <input type="date" min="{{date('Y-m-d')}}" value="{{date('Y-m-d')}}" name="exp_date" id="">
                @if(isset($_SESSION['errors']) && isset($_GET['msg']) )
                    <span style="color: red">{{ $_SESSION['errors']['exp_date'] }}</span>
                @endif
            </div>
            <button name="add-product">Add new voucher</button>
        </form>
    </div>
@endsection