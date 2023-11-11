<?php

namespace App\Admin\Controllers;

use App\Models\OrderDetails;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class OrderDetailsController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'OrderDetails';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new OrderDetails());

        $grid->column('id', __('Id'));
        
        $grid->column('orderID', __('OrderID'));
        $grid->column('productID', __('ProductID'));
        $grid->column('color', __('Color'));
        $grid->column('size', __('Size'));
        $grid->column('quantity', __('Quantity'));
        

        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

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
        $show = new Show(OrderDetails::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));
        $show->field('orderID', __('OrderID'));
        $show->field('color', __('Color'));
        $show->field('size', __('Size'));
        $show->field('quantity', __('Quantity'));
        $show->field('productID', __('ProductID'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new OrderDetails());

        $form->number('orderID', __('OrderID'));
        $form->color('color', __('Color'));
        $form->decimal('size', __('Size'));
        $form->number('quantity', __('Quantity'));
        $form->number('productID', __('ProductID'));

        return $form;
    }
}
