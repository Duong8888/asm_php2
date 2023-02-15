<?php

namespace Web;
class CategoryController extends BaseController
{
    public function listCategory(){
        $pagination = new Pagination('categories','iddm','5');
        $listCategory = $pagination->page();
        $pagesCount = $pagination->countPage();
        $path = '';
        $this->render('category.list',compact('listCategory','pagesCount','path'));
    }
    public function showFormAdd(){
        $path = '';
        $this->render('category.add',compact('path'));
    }
}