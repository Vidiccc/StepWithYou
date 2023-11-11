<?php

namespace App\Admin\Controllers;

use App\Events\ImageUploaded;
use App\Models\Products;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
Use Illuminate\Http\Request;

class ProductsController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Products';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Products());

        $grid->column('id', __('Id'));
        $grid->column('pname', __('Product Name'));
        $grid->column('brand', __('Brand'));
        $grid->column('price', __('Price'));
        $grid->column('categoryID', __('CategoryID'));
        $grid->column('description', __('Description'));
        $grid->column('imageURL', __('ImageURL'));

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Products::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('pname', __('Product Name'));
        $show->field('brand', __('Brand'));
        $show->field('price', __('Price'));
        $show->field('categoryID', __('CategoryID'));
        $show->field('description', __('Description'));
        $show->field('imageURL', __('ImageURL'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Products());

        $form->text('pname', __('Product Name'));
        $form->text('brand', __('Brand'));
        $form->decimal('price', __('Price'));
        $form->number('categoryID', __('CategoryID'));
        $form->text('description', __('Description'));
        $form->image('imageURL', __('ImageURL'));

        


        return $form;
    }






}
