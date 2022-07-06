<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CategoriesRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Backpack\CRUD\app\Library\Widget;

/**
 * Class CategoriesCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class CategoriesCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Categories::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/categories');
        CRUD::setEntityNameStrings('тип редуктора', 'Типы редукторов');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::addColumn(
            [
                'name'      => 'image',
                'label'     => 'Изображение',
                'type'      => 'image',
                'prefix' => 'storage/thumbnails/categories/',

            ]
        );
//        CRUD::addColumn(
//            [
//                'name'      => 'icon',
//                'label'     => 'Иконка',
//                'type'      => 'image',
//                'prefix' => 'storage/thumbnails/categories/icons/',
//
//            ]
//        );
        CRUD::addColumn(['name' => 'name', 'type' => 'text','label'=>'Название','wrapper'   => [
            'class'      => 'form-group col-md-6'
        ],]);

        CRUD::addColumn(['name' => 'descr', 'type' => 'text','label'=>'Описание']);

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
        CRUD::setValidation(CategoriesRequest::class);
        CRUD::addField(['name' => 'name', 'type' => 'text','label'=>'Название','wrapper'   => [
            'class'      => 'form-group col-md-6'
        ],]);
        CRUD::addField([
            'name'=>'slug',
            'label'=>'Уникальная ссылка',
            'type'=>'text',
            'attributes' => [
                'readonly'    => 'readonly',
            ], // change the HTML attributes of your input
            'wrapper'   => [
                'class'      => 'form-group col-md-6'
            ],
        ]);
        CRUD::addField(['name' => 'descr', 'type'  => 'text','label'=>'Описание']);
        CRUD::addField(['name' => 'image', 'type' => 'upload','label'=>'Изображение','upload'=>true]);
        CRUD::addField(['name' => 'icon', 'type' => 'upload','label'=>'Иконка','upload'=>true]);
        Widget::add()->type('script')->content('js/slug.js');


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
