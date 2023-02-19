@extends('layout.index')
@section('content')
    <div class="main">

        <p class="sub-title">Add new slider</p>
        <form action="{{BASE_URL.'edit-slider-save/'.$infoSlider['id']}}" method="post" enctype="multipart/form-data" class="form-add-product">
            <div class="form-left">
                <input type="text" value="{{$infoSlider['title']}}" name="title" id="" placeholder="title">

            </div>
            <div class="form-right">
                <input type="text" value="{{$infoSlider['description']}}" name="description" id="" placeholder="description">

                <label for="img" class="box-img">
                <span class="material-symbols-outlined box-2 box-1">
                    <img src="{{$path.$infoSlider['image']}}" alt="">
                </span>
                </label>
                
                <input type="file" name="img" id="img" class="img-2">
            </div>
            <button name="add-product">Save</button>
        </form>
    </div>
@endsection