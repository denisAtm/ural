<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\GearMotorRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Backpack\CRUD\app\Library\Widget;

/**
 * Class GearMotorCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class GearMotorCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\GearMotor::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/gear-motor');
        CRUD::setEntityNameStrings('gear motor', 'gear motors');
        Widget::add()->type('script')->content('js/slug.js');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::addColumn([
            'name'=>'name',
            'label'=>'Название',
        ]);
        CRUD::addColumn([
            'name'=>'category_id',
            'type'=>'select',
            'label'=>'Тип редуктора',
            'entity'=>'category'
        ]);
        CRUD::addColumn([
            'name'=>'series_id',
            'type'=>'select',
            'label'=>'Серия',
            'entity'=>'series'
        ]);

        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']);
         */
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(GearMotorRequest::class);

        CRUD::addField([
            'name'=>'name',
            'label'=>'Название',
            'type'=>'text',
            'wrapper'=>[
                'class'=>'form-group col-md-6'
            ]
        ]);
        CRUD::addField([
            'name'=>'slug',
            'label'=>'slug',
            'type'=>'text',
            'wrapper'=>[
                'class'=>'form-group col-md-6'
            ],
            'attributes'=>[
                'readonly'=>'readonly'
            ]
        ]);
        CRUD::addField([
            'name'=>'category_id',
            'type'=>'select',
            'label'=>'Тип редуктора',
            'entity'=>'category',
            'model'=>'App\Models\Categories',
            'wrapper'=>[
                'class'=>'form-group col-md-6'
            ]
        ]);
        CRUD::addField([
            'name'=>'series_id',
            'type'=>'select',
            'label'=>'Серия',
            'entity'=>'series',
            'model'=>'App\Models\MotorSeries',
            'wrapper'=>[
                'class'=>'form-group col-md-6'
            ]
        ]);
        CRUD::addField([
            'name'=>'number_of_transfer_stages_id',
            'type'=>'select',
            'label'=>'Количество передаточных ступней',
            'entity'=>'NumberOfTransferStages',
            'model'=>'App\Models\NumberOfTransferStages',
            'wrapper'=>[
                'class'=>'form-group col-md-6'
            ]
        ]);
        CRUD::addField([
            'name'=>'location_of_axes_id',
            'type'=>'select',
            'label'=>'Расположение осей',
            'entity'=>'locationOfAxes',
            'model'=>'App\Models\locationOfAxes',
            'wrapper'=>[
                'class'=>'form-group col-md-6'
            ]
        ]);
        CRUD::addField([
            'name'=>'climatic_version',
            'label'=>'Климатическое исполнение',
            'type'=>'text',
            'wrapper'=>[
                'class'=>'form-group col-md-4'
            ]
        ]);
        CRUD::addField([
            'name'=>'console_load',
            'label'=>'Консольная нагрузка',
            'type'=>'text',
            'wrapper'=>[
                'class'=>'form-group col-md-4'
            ]
        ]);
        CRUD::addField([
            'name'=>'weight',
            'label'=>'Масса',
            'type'=>'text',
            'wrapper'=>[
                'class'=>'form-group col-md-4'
            ]
        ]);
        CRUD::addField([
            'name'=>'gearRatios',
            'type'=>'select_multiple',
            'label'=>'Передаточное отношение',
            'entity'=>'gearRatios',
            'wrapper'=>[
                'class'=>'form-group col-md-4'
            ]
        ]);
//        CRUD::addField([
//            'name'=>'outputShafts',
//            'type'=>'select_multiple',
//            'label'=>'Выходной вал',
//            'entity'=>'outputShafts',
//            'attribute' => 'name',
//            'wrapper'=>[
//                'class'=>'form-group col-md-6'
//            ]
//        ]);
//        CRUD::addField([
//            'name'=>'paws',
//            'type'=>'select_multiple',
//            'label'=>'Монтажное положение на лапах',
//            'entity'=>'paws',
//            'attribute' => 'name',
//            'wrapper'=>[
//                'class'=>'form-group col-md-6'
//            ]
//        ]);
//        CRUD::addField([
//            'name'=>'flanges',
//            'type'=>'select_multiple',
//            'label'=>'Монтажное положение на фланце',
//            'entity'=>'flanges',
//            'attribute' => 'name',
//            'wrapper'=>[
//                'class'=>'form-group col-md-6'
//            ]
//        ]);
        CRUD::addField([
            'name'=>'gost',
            'type'=>'checkbox',
            'label'=>'ГОСТ'
        ]);
        CRUD::addField([
            'name'=>'desc',
            'type'=>'summernote',
            'label'=>'Описание',
            'options' => [
                'toolbar' => [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen']]
                ]]
        ]);
        CRUD::addField([
            'name'=>'size',
            'type'=>'summernote',
            'label'=>'Размеры',
            'options' => [
                'toolbar' => [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen']]
                ]]
        ]);

        /**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number']));
         */
    }

    /**
     * Define what happens when the Update operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
