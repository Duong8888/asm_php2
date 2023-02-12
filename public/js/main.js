const inputFile = document.querySelector('#img');
const box2 = document.querySelector('.box-2');
if (inputFile) {
    const imgDisplay = document.querySelector('.box-img .material-symbols-outlined');
    const lable = document.querySelector('.box-img');
    inputFile.addEventListener('change', (e) => {
        imgDisplay.style.display = 'none';
        // var arr = e.target.files;
        // arr.splice(0, 1);
        var newFileList = Array.from(e.target.files);// lấy thông tin file nhập vào chuyển thành dạng mảng
        console.log(newFileList.length);
        if (box2){lable.innerHTML = '';}
        if (newFileList.length === 0) {
            if (box2){
                lable.innerHTML = `
            <span class="material-symbols-outlined box-2">
                add_photo_alternate
            </span>
            `;
            }else {
                lable.innerHTML += `
            <span class="material-symbols-outlined box-1">
                add_photo_alternate
            </span>
            `;
            }
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

const btnSelect = document.querySelector('.select-all');
if (btnSelect) {
    const inputCheck = document.querySelectorAll('.table-main input[type="checkbox"]');
    const btnDelete = document.querySelector('.delete-all');
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

    btnDelete.addEventListener('click', (e) => {
        var result = confirm('Bạn muốn xóa tất cả chứ !');
        if (result) {
            btnDelete.setAttribute('type', 'submit');
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