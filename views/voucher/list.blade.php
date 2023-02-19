@extends('layout.index')
@section('content')
    <p class="title">Voucher list</p>
    <div class="main">
        <form class="form-list" action="delete-voucher" method="post">
            <div class="action-product">
                <div class="btn-action">
                    <a href="add-voucher">Add new voucher</a>
                    <a class="select-all">Select all</a>
                    <button onclick="event.preventDefault(); opentPopup(this)" class="delete-all" type="button">Delete
                    </button>
                </div>
            </div>
            <table class="table-main" id="table-top">
                <tr>
                    <th>Select</th>
                    <th>Name</th>
                    <th>Discount</th>
                    <th>Quantity</th>
                    <th>Exp_date</th>
                    <th>Action</th>
                @foreach($arrVoucher as $key => $value)
                    <tr>
                        <td><input type="checkbox" name="{{$value["idvc"]}}" id="{{$value["idvc"]}}"></td>
                        <td>{{$value["content"]}}</td>
                        <td>{{$value["discount"]}}%</td>
                        <td><span>{{$value["quantity"]}}</span></td>
                        <td><span>{{$value["exp_date"]}}</span></td>
                        <td>
                            <a href="edit-voucher/{{$value["idvc"]}}">
                        <span class="material-symbols-outlined">
                            rate_review
                        </span>
                            </a>
                            <a onclick="event.preventDefault(); opentPopup(this,'delete')" class="a-popup"
                               href="delete-one-voucher/{{$value["idvc"]}}">
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
            @for($i = 1;$i <= $voucherPagesCount; $i++)
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