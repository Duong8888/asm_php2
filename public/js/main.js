const inputFile = document.querySelector('#img');
const box2 = document.querySelector('.box-2.box-1');
const inputFile1 = document.querySelector('.img-1');
const inputFile2 = document.querySelector('.img-2');
if (inputFile1) {

    inputFile1.addEventListener('change', (e) => {
        var box = document.querySelector('.box-display')
        var newFileList = Array.from(e.target.files);// lấy thông tin file nhập vào chuyển thành dạng mảng
        box.innerHTML = '';
        for (let j = 0; j < newFileList.length; j++) {
            console.log('111')
            let url = URL.createObjectURL(inputFile1.files[j]);// tạo đường dẫn ảo
            box.innerHTML += `
                 <span class="box-1">
                        <img src="${url}" alt="">
                </span>
            `;
        }
    });
}
if (inputFile && inputFile2) {
    const imgDisplay = document.querySelector('.box-img .material-symbols-outlined');
    const lable = document.querySelector('.box-img');
    inputFile.addEventListener('change', (e) => {
        imgDisplay.style.display = 'none';
        // var arr = e.target.files;
        // arr.splice(0, 1);
        var newFileList = Array.from(e.target.files);// lấy thông tin file nhập vào chuyển thành dạng mảng
        console.log(newFileList.length);
        if (box2) {
            lable.innerHTML = '';
        }
        if (newFileList.length === 0) {
            lable.innerHTML = `
            <span class="material-symbols-outlined box-1">
                add_photo_alternate
            </span>
            `;
        }
        for (var i = 0; i < newFileList.length; i++) {
            var url = URL.createObjectURL(inputFile.files[i]);// tạo đường dẫn ảo
            lable.innerHTML += `
                <span class="box-1">
                        <img src="${url}" alt="">
                </span>
            `;
        }
    });
}
const formList = document.querySelector('.form-list');
const btnDelete = document.querySelector('.delete-all');
const btnSelect = document.querySelector('.select-all');
if (btnSelect) {
    const inputCheck = document.querySelectorAll('.table-main input[type="checkbox"]');
    btnDelete.style.display = 'none';
    var count = 0;
    btnSelect.addEventListener('click', () => {
        count++;
        if (count % 2 != 0) {
            inputCheck.forEach((e) => {
                e.checked = true;
                console.log(e.value);
                btnDelete.style.display = 'inline';
                btnSelect.innerHTML = 'Unchecked';
            });
        } else {
            inputCheck.forEach((e) => {
                e.checked = false;
                console.log(e.value);
                btnDelete.style.display = 'none';
                btnSelect.innerHTML = 'Select all';
            });
        }
    });

}

function closeImg(e) {
    console.log(e.parentElement);
    e.parentElement.style.display = 'none'
}

function deleteImgUpload(e) {
    console.log(e);
    // newFileList.splice(1,1);
}

const ovelay = document.querySelector('.overlay');
const popup = document.querySelector('.popup-main');
const arrBtn = document.querySelectorAll('.popup-btn button');
var href = '';
var actionMain = '';

function opentPopup(e, action = 'test') {
    popup.style.transform = 'translate(-50%, -50%) scale(1)';
    popup.style.zIndex = '111';
    ovelay.style.zIndex = '100';
    href = e.href;
    actionMain = action;
    console.log(e.href)
}


function result(e) {
    if (e.innerText == 'Cancel') {
        closePopup();
    } else {
        closePopup();
        if (btnDelete) {
            if (actionMain == 'delete') {
                window.location = href;
            } else {
                formList.submit();
            }
        } else {
            window.location = href;
        }
    }
}

function closePopup() {
    popup.style.transform = 'translate(-50%, -50%) scale(0)';
    popup.style.zIndex = '-1';
    ovelay.style.zIndex = '-1';
};
