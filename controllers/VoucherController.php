<?php

namespace Web;

class VoucherController extends BaseController
{
    public $voucher;

    public function __construct()
    {
        $this->voucher = new Voucher();
    }

    public function listVoucher()
    {
        $path = '';
        $message = "Bạn chắc chắn muỗn xóa chứ ?";
        $voucher = new Pagination('voucher', 'idvc', '5');
        $arrVoucher = $voucher->page();
        $voucherPagesCount = $voucher->countPage();
        $this->render('voucher.list', compact('voucherPagesCount', 'path', 'arrVoucher', 'message'));
    }

    public function formAdd()
    {
        $path = '';
        $this->render('voucher.add', compact('path',));
    }

    public function addVoucher()
    {
        $errors = [];
        if (empty($_POST['quantity'])) {
            $errors['quantity'] = 'Vui lòng nhập số lượng';
        }
        if (empty($_POST['discount'])) {
            $errors['discount'] = 'Vui lòng nhập % giảm giá';
        }
        if (isset($_POST['discount']) && $_POST['discount'] > 100) {
            $errors['discount'] = 'mức giảm giá tôi đa là 100.';
        }
        if (empty($_POST['content'])) {
            $errors['content'] = 'Vui lòng nhập tên voucher';
        }
        if (count($errors) != 0) {
            redirect('errors', $errors, 'add-voucher');
        }
        $data = [$_POST['quantity'], $_POST['discount'], $_POST['content'], $_POST['exp_date']];
        $this->voucher->addVoucher($data);
        redirect('success', "Thêm user thành công", 'add-voucher');
    }

    public function deleteAll($id = '')
    {
        if (!empty($id)) {
            $this->voucher->deleteVoucher($id);
        } else {
            foreach ($_POST as $key => $value) {
                $this->voucher->deleteVoucher($key);
            }
        }
        header('location:' . BASE_URL . 'voucher');
    }

    public function updateVoucher($id,$action = '')
    {
        if ($action == 'save') {
            $data = [$_POST['quantity'], $_POST['discount'], $_POST['content'], $_POST['exp_date'],$id];
            $this->voucher->updateVoucher($data);
            header('location:' . BASE_URL . 'voucher');
        } else {
            $path = '../';
            $infoVoucher = $this->voucher->getVoucher(false,$id);
            $this->render('voucher.edit',compact('path','infoVoucher'));
        }
    }
}