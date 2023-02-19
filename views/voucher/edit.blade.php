@extends('layout.index')
@section('content')
    <div class="main">
        <p class="sub-title">Edit voucher</p>
        <form action="{{BASE_URL.'update-voucher/'.$infoVoucher['idvc'].'/save'}}" method="post"  class="form-add-product">
            <div class="form-left">
                <input type="text" value="{{$infoVoucher['content']}}" name="content" id="" placeholder="name">

                <input type="number" value="{{$infoVoucher['discount']}}" name="discount" id="" placeholder="discount">

            </div>
            <div class="form-right">
                <input type="number" value="{{$infoVoucher['quantity']}}" name="quantity" id="" placeholder="Quantity">

                <input type="date" min="{{date('Y-m-d')}}" value="{{$infoVoucher['exp_date']}}" name="exp_date" id="">

            </div>
            <button name="add-product" type="submit">Update voucher</button>
        </form>
    </div>
@endsection