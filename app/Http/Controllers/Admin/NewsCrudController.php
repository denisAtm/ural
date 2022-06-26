<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\NewsRequest;
use App\Models\News;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Backpack\CRUD\app\Library\Widget;

/**
 * Class NewsCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class NewsCrudController extends CrudController
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
        CRUD::setModel(\App\Models\News::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/news');
        CRUD::setEntityNameStrings('news', 'news');
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
                 'prefix' => 'storage/thumbnails/news/',

            ]
        );
        CRUD::addColumn(['name' => 'name', 'type' => 'text','label'=>'Заголовок']);
        CRUD::addColumn(['name' => 'created_at', 'type' => 'date','label'=>'Дата публикации']);
        CRUD::addColumn(['label'     => "Тэги",
            'type'      => 'select_multiple',
            'name'      => 'tags', // the method that defines the relationship in your Model

            // optional
            'entity'    => 'tags', // the method that defines the relationship in your Model
            'model'     => "App\Models\Tag", // foreign key model
            'attribute' => 'name',]); // foreign key attribute that is shown to user]);
        CRUD::addColumn(['name' => 'status_id', 'type' => 'model_function','label'=>'Статус','function_name'=>'getStatusName']);


    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(NewsRequest::class);
        CRUD::addField(['name' => 'name', 'type' => 'text','label'=>'Заголовок','wrapper'   => [
            'class'      => 'form-group col-md-6'
        ],]);
        CRUD::addField([
            'name'=>'slug',
            'label'=>'SLUG',
            'type'=>'text',
            'attributes' => [
                'readonly'    => 'readonly',
            ], // change the HTML attributes of your input
            'wrapper'   => [
                'class'      => 'form-group col-md-6'
            ],
        ]);
        CRUD::addField(['label'     => "Статус",
            'type'      => 'select',
            'name'      => 'status_id',
            'entity'    => 'status',

            // optional - manually specify the related model and attribute
            'model'     => "App\Models\NewsStatus", // related model
            'attribute' => 'name', // foreign key attribute that is shown to user
        ]);
        CRUD::addField(['label'     => "Тэги",
            'type'      => 'select_multiple',
            'name'      => 'tags', // the method that defines the relationship in your Model

            // optional
            'entity'    => 'tags', // the method that defines the relationship in your Model
            'model'     => "App\Models\Tag", // foreign key model
            'attribute' => 'name',]);
        CRUD::addField(['name' => 'desc', 'type'  => 'summernote',
            'options' => [
                'toolbar' => [
                    ['font', ['bold', 'underline', 'italic']]
                ]
            ],'label'=>'Содержание']);
        CRUD::addField(['name' => 'image', 'type' => 'upload','label'=>'Изображение','upload'=>true]);

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

    protected function setupShowOperation()
    {
        $this->setupListOperation();
        CRUD::removeColumn('image');
        CRUD::addColumn(
            [
                'name'      => 'image',
                'label'     => 'Изображение',
                'type'      => 'image',
                'prefix' => 'storage/images/news/',
                'width'=>'300px',
                'height'=>'300px',

            ]
        );
        CRUD::addColumn([
            'name'=>'desc',
            'label'=>'Содержание',
            'type' => 'model_function',
            'function_name'=>'descAttribute'
        ]);

    }
}
