<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\SeriesRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class SeriesCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class SeriesCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Series::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/series');
        CRUD::setEntityNameStrings('серию редукторов', 'Серии редукторов');
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
        CRUD::setValidation(SeriesRequest::class);

        CRUD::addField([
            'name'=>'name',
            'label'=>'Серия',
            'type'=>'text'
        ]);
        CRUD::addField([
            'name'=>'frontShafts',
            'type'=>'select_multiple',
            'label'=>'Передний вал',
            'entity'=>'frontShafts',
            'attribute' => 'name',
            'wrapper'=>[
                'class'=>'form-group col-md-6'
            ]
        ]);
        CRUD::addField([
            'name'=>'outputShafts',
            'type'=>'select_multiple',
            'label'=>'Выходной вал',
            'entity'=>'outputShafts',
            'attribute' => 'name',
            'wrapper'=>[
                'class'=>'form-group col-md-6'
            ]
        ]);
        CRUD::addField([
            'name'=>'buildOptions',
            'type'=>'select_multiple',
            'label'=>'Варианты сборки',
            'entity'=>'buildOptions',

        ]);
        CRUD::addField([
            'name'=>'gearRatios',
            'type'=>'select_multiple',
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
            'name'=>'frontShafts',
            'label'=>'Входной вал',
            'attribute'=>'name'
        ]);
        CRUD::addColumn([
            'name'=>'outputShafts',
            'label'=>'Выходной вал',
            'attribute'=>'name'
        ]);
        CRUD::addColumn([
            'name'=>'buildOptions',
            'label'=>'Варианты сборки'
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
