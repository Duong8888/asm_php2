<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nguyễn Ánh Dương</title>
    @include('layout.css')
</head>

<body>
<div class="overlay">
    <div class="popup-main">
        <div class="popup-header">
                <span onclick="closePopup()" class="material-symbols-outlined">
                    close
                </span>
        </div>
        <div class="popup-content">
            <p class="message">Bạn muốn xóa chứ</p>
            <div class="popup-btn">
                <button onclick="result(this)">OK</button>
                <button onclick="result(this)">Cancel</button>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="sub-left"></div>
    <div class="lef">
        <div class="logo">
            <img src="https://demo.dashboardpack.com/user-management-html/img/logo.png" alt="">
        </div>
        <ul class="sidebar">
            <li class="item">
                <div>
                        <span class="material-symbols-outlined">
                            home
                        </span>
                    <a href="home">Home</a>
                </div>
            </li>
            <li class="item">
                <div>
                        <span class="material-symbols-outlined">
                            home
                        </span>
                    <a href="/asm_php2/product-list">Product</a>
                </div>
            </li>
            <li class="item">
                <div>
                        <span class="material-symbols-outlined">
                            home
                        </span>
                    <a href="/asm_php2/category">Categories</a>
                </div>
            </li>
            <li class="item">
                <div>
                        <span class="material-symbols-outlined">
                            home
                        </span>
                    <a href="">User</a>
                </div>
            </li>
        </ul>
    </div>
    <div class="rigth">
        <div class="header">
            <form action="" class="search-header">
                <input type="search" name="" id="" placeholder="Search">
                <button type="button">
                        <span class="material-symbols-outlined">
                            search
                        </span>
                </button>
            </form>
            <div class="user">
                <img src="http://genk.mediacdn.vn/k:thumb_w/640/2015/screen-shot-2015-07-30-at-2-31-57-pm-1438334096188/cau-chuyen-ve-nguoi-tao-ra-chu-ech-xanh-than-thanh.png"
                     alt="">
                <ul class="popup">
                    <li><a href="">Nguyễn Ánh Dương</a></li>
                    <li><a href="">Profile</a></li>
                    <li><a href="">Log out</a></li>
                </ul>
            </div>
        </div>
        @yield('content')
    </div>
</div>
</div>
@include('layout.js')
</body>

</html>