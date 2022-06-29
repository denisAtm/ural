<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\MetaPageRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class MetaPageCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class MetaPageCrudController extends CrudController
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
        CRUD::setModel(\App\Models\MetaPage::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/meta-page');
        CRUD::setEntityNameStrings('meta page', 'meta pages');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {

        CRUD::addColumn(['name' => 'meta_title', 'type' => 'text','label'=>'Заголовок']);

        CRUD::addColumn(['name' => 'meta_description', 'type' => 'text','label'=>'Описание']);

        CRUD::addColumn(['name' => 'img_description', 'type' => 'text','label'=>'alt изображению']);

        CRUD::addColumn(['name' => 'meta_keywords', 'type' => 'text','label'=>'Ключевые слова']);

        CRUD::addColumn(['name' => 'meta_url', 'type' => 'text','label'=>'Ссылка на страницу']);



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
        CRUD::setValidation(MetaPageRequest::class);

        CRUD::addField([
            'name' => 'meta_title',
            'label' => trans('meta_title'),
        ]);
        CRUD::addField([
            'name' => 'meta_url',
            'label' => trans('meta_url'),
        ]);
        CRUD::addField([
            'name' => 'meta_description',
            'label' => trans('meta_description'),
        ]);
        CRUD::addField([
            'name' => 'img_description',
            'label' => trans('img_description'),
        ]);
         CRUD::addField([
            'name' => 'meta_keywords',
            'type' => 'textarea',
            'label' => trans('meta_keywords'),
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
