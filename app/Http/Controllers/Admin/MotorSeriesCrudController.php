<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\MotorSeriesRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class MotorSeriesCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class MotorSeriesCrudController extends CrudController
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
        CRUD::setModel(\App\Models\MotorSeries::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/motor-series');
        CRUD::setEntityNameStrings('серию мотор-редуктора', 'Серии мотор-редукторов');
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
            'label'=>'Серия',
            'type'=>'text'
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
        CRUD::setValidation(MotorSeriesRequest::class);

        CRUD::addField([
            'name'=>'name',
            'label'=>'Серия',
            'type'=>'text'
        ]);
        CRUD::addField([
            'name'=>'paws',
            'type'=>'select2_multiple',
            'label'=>'Монтажное положение на лапах',
            'entity'=>'paws',
            'attribute' => 'name',
            'wrapper'=>[
                'class'=>'form-group col-md-6'
            ]
        ]);
        CRUD::addField([
            'name'=>'flanges',
            'type'=>'select2_multiple',
            'label'=>'Монтажное положение на фланце',
            'entity'=>'flanges',
            'attribute' => 'name',
            'wrapper'=>[
                'class'=>'form-group col-md-6'
            ]
        ]);
        CRUD::addField([
            'name'=>'outputShafts',
            'type'=>'select2_multiple',
            'label'=>'Выходной вал',
            'entity'=>'outputShafts',
            'attribute' => 'name',
            'wrapper'=>[
                'class'=>'form-group col-md-6'
            ]
        ]);
        CRUD::addField([
            'name'=>'gearRatios',
            'type'=>'select2_multiple',
            'label'=>'Передаточные отношения',
            'entity'=>'gearRatios',

        ]);
        /**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number']));
         */
    }
    protected function setupShowOperation(){
        CRUD::addColumn([
           'name'=>'name',
           'label'=>'Название'
        ]);
        CRUD::addColumn([
            'name'=>'paws',
            'label'=>'Монтажное положение на лапах'
        ]);
        CRUD::addColumn([
            'name'=>'flanges',
            'label'=>'Монтажное положение на фланце'
        ]);
        CRUD::addColumn([
            'name'=>'outputShafts',
            'label'=>'Выходной вал',
            'attribute'=>'name'
        ]);
        CRUD::addColumn([
            'name'=>'gearRatios',
            'label'=>'Передаточные отношения'
        ]);
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
