@extends('layout.index')
@section('content')
    <p class="title">Product list</p>
    <div class="main">
        @if(count($arrSlide) > 0)
            <div class="main">
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">
                        @foreach($arrSlide as $key => $value)
                            <div class="swiper-slide">
                                <img src="{{$value["image"]}}" alt="">
                                <div class="box-text">
                                    <p>{{$value["title"]}}</p>
                                    <p>{{$value["description"]}}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        @endif
        <form class="form-list" action="{{BASE_URL.'delete-all-slider'}}" method="post">
            <div class="action-product">
                <div class="btn-action">
                    <a href="add-slider">Add new slider</a>
                    <a class="select-all">Select all</a>
                    <button onclick="event.preventDefault(); opentPopup(this)" class="delete-all" type="button">Delete
                    </button>
                </div>
            </div>
            <table class="table-main" id="table-top">
                <tr>
                    <th>Select</th>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Action</th>
                @foreach($arrSlide as $key => $value)
                    <tr>
                        <td><input type="checkbox" name="{{$value["id"]}}" id="{{$value["id"]}}"></td>
                        <td>
                            <img src="{{$value["image"]}}" alt="">
                        </td>
                        <td><span>{{$value["title"]}}</span></td>
                        <td><span>{{$value["description"]}}</span></td>
                        <td>
                            <a href="edit-slider/{{$value["id"]}}">
                        <span class="material-symbols-outlined">
                            rate_review
                        </span>
                            </a>
                            <a onclick="event.preventDefault(); opentPopup(this,'delete')" class="a-popup"
                               href="delete-one-slider/{{$value["id"]}}">
                        <span class="material-symbols-outlined">
                            delete
                        </span>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </form>
    </div>
@endsection