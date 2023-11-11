<?php

namespace App\Admin\Controllers;

use App\Models\Stock;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class StockController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Stock';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Stock());

        $grid->column('id', __('Id'));
        $grid->column('productID', __('ProductID'));
        $grid->column('color', __('Color'));
        $grid->column('size', __('Size'));
        $grid->column('stock', __('Stock'));

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
        $show = new Show(Stock::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('productID', __('ProductID'));
        $show->field('color', __('Color'));
        $show->field('size', __('Size'));
        $show->field('stock', __('Stock'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Stock());

        $form->number('productID', __('ProductID'));
        $form->color('color', __('Color'));
        $form->decimal('size', __('Size'));
        $form->number('stock', __('Stock'));

        return $form;
    }
}
