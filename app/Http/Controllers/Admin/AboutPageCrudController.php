<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AboutPageRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class AboutPageCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class AboutPageCrudController extends CrudController
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
        CRUD::setModel(\App\Models\AboutPage::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/about-page');
        CRUD::setEntityNameStrings('about page', 'about pages');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::addColumn(['name' => 'title', 'type' => 'text','label'=>'Заголовок']);

        CRUD::addColumn(['name' => 'text', 'type' => 'text','label'=>'Текст']);

        CRUD::addColumn(
            [
                'name'      => 'image',
                'label'     => 'Изображение',
                'type'      => 'image',
                'prefix' => 'storage/thumbnails/about/',

            ]
        );

        CRUD::addColumn(['name' => 'slogan', 'type' => 'text','label'=>'Слоган']);

        CRUD::addColumn(
            [
                'name'      => 'slider',
                'label'     => 'Слайдер',
                'type'      => 'image',
                'prefix' => 'storage/thumbnails/about/',

            ]
        );
        CRUD::addColumn(
            [
                'name'      => 'gallery_images',
                'label'     => 'Галлерея',
                'type'      => 'image',
                'prefix' => 'storage/thumbnails/about/',

            ]
        );


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
        CRUD::setValidation(AboutPageRequest::class);

        CRUD::addField(['name' => 'title', 'type' => 'text','label'=>'Заголовок']);

        CRUD::addField(['name' => 'text', 'type' => 'text','label'=>'Текст']);

        CRUD::addField(['name' => 'image', 'type' => 'upload','label'=>'Изображение','upload'=>true]);

        CRUD::addField(['name' => 'slogan', 'type' => 'text','label'=>'Слоган']);

        CRUD::addField(['name' => 'slider', 'type' => 'upload_multiple','label'=>'Слайдер','upload'=>true]);

        CRUD::addField(['name' => 'gallery_images', 'type' => 'upload_multiple','label'=>'Галлерея','upload'=>true]);



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
                'prefix' => 'storage/images/about/',
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
