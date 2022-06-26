<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ArticlesRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Backpack\CRUD\app\Library\Widget;

/**
 * Class ArticlesCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ArticlesCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Articles::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/articles');
        CRUD::setEntityNameStrings('articles', 'articles');
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
        'type'=>'text'
    ]);
    CRUD::addColumn([
        'name'=>'status_id',
        'label'=>'Статус',
        'type'=>'select',
        'entity'=>'status',
        'model'=>'App\Models\Articles'
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
        CRUD::setValidation(ArticlesRequest::class);
        CRUD::addField([
            'name'=>'name',
            'label'=>'Название',
            'type'=>'text',
            'wrapper'   => [
                'class'      => 'form-group col-md-6'
            ],
        ]);
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
            'wrapper'   => [
                'class'      => 'form-group col-md-6'
            ],
        ]);

        CRUD::addField(['label'     => "Тэги",
            'type'      => 'select_multiple',
            'name'      => 'tags', // the method that defines the relationship in your Model

            // optional
            'entity'    => 'tags', // the method that defines the relationship in your Model
            'model'     => "App\Models\Tag", // foreign key model
            'attribute' => 'name',
            'wrapper'   => [
                'class'      => 'form-group col-md-6'
            ], ]);
        CRUD::addField([   // DateTime
            'name'  => 'publish_at',
            'label' => 'Дата публикации',
            'type'  => 'datetime',

        ]);
        CRUD::addField(['name' => 'content', 'type'  => 'summernote',
            'options' => [
                'toolbar' => [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen']]
                ]
            ],'label'=>'Содержание']);

        Widget::add()->type('script')->content('js/publishTime.js');
        Widget::add()->type('script')->content('js/summernote.js');

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
        CRUD::addColumn([
            'name'=>'slug',
            'type'=>'text',
            'label'=>'SLUG'
        ]);
        CRUD::addColumn([
            'name'=>'status_id',
            'type'=>'select',
            'entity'=>'status',
            'label'=>'Статус',
            'attribute' => 'name', // foreign key attribute that is shown to user
            'model'     => "App\Models\Articles"
//            'attributes'=>'name'
        ]);
        CRUD::addColumn([
            'name'=>'publish_at',
            'type'=>'text',
            'label'=>'Дата публикации',
        ]);
        CRUD::addColumn([
            'name'=>'tags',
            'type'=>'select_multiple',
            'label'=>'Тэги',
            'entity'    => 'tags', // the method that defines the relationship in your Model
//            'attribute' => 'name', // foreign key attribute that is shown to user
            'model'     => 'App\Models\Articles', // fo
        ]);


    }

}
