<?php

namespace App\Admin\Controllers;

use App\Models\Hint;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Auth;

class HintController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Hint';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Hint());
        $grid->model()->where('admin_user_id', Auth::guard('admin')->user()->id);
        $grid->column('id', __('Id'));
        $grid->column('description', __('Description'));
        $grid->column('type', __('Type'));
        $grid->column('brand', __('Brand'));
        $grid->column('model', __('Model'));
        $grid->column('version', __('Version'));
        $grid->column('admin_user_id', __('Admin user id'));

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
        $show = new Show(Hint::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('description', __('Description'));
        $show->field('type', __('Type'));
        $show->field('brand', __('Brand'));
        $show->field('model', __('Model'));
        $show->field('version', __('Version'));
        $show->field('admin_user_id', __('Admin user id'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Hint());

        $form->textarea('description', __('Description'));
        $form->select('type')->options(['car'=>'carro','truck'=>'truck','motorcycle'=>'motorcycle']);
        $form->text('brand', __('Brand'));
        $form->text('model', __('Model'));
        $form->text('version', __('Version'));
        $form->hidden('admin_user_id')->value(Auth::guard('admin')->user()->id);

        return $form;
    }
}
