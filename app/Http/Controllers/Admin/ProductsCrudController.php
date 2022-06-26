<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ProductsRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Backpack\CRUD\app\Library\Widget;

/**
 * Class ProductsCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ProductsCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Products::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/products');
        CRUD::setEntityNameStrings('products', 'products');
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
                'prefix' => 'storage/thumbnails/products/',

            ]
        );
        CRUD::addColumn(['name' => 'title', 'type' => 'text','label'=>'Заголовок']);

//        CRUD::addColumn(['name' => 'type_of_transmission', 'type' => 'text','label'=>'Тип передачи']);
//
//        CRUD::addColumn(['name' => 'number_of_transfer_stages', 'type' => 'text','label'=>'Количество передаточных ступеней']);
//
//        CRUD::addColumn(['name' => 'gear_ratio', 'type' => 'text','label'=>'Передаточное отношение']);
//
//        CRUD::addColumn(['name' => 'location_of_axes', 'type' => 'text','label'=>'Расположение осей']);
//
//        CRUD::addColumn(['name' => 'climatic_version', 'type' => 'text','label'=>'Климатическое исполнение']);
//
//        CRUD::addColumn(['name' => 'build_option', 'type' => 'text','label'=>'Вариант сборки']);
//
//        CRUD::addColumn(['name' => 'state_standard', 'type' => 'text','label'=>'ГОСТ']);
//
//        CRUD::addColumn(['name' => 'desc', 'type' => 'text','label'=>'Описание']);
//
//        CRUD::addColumn(['name' => 'size', 'type' => 'text','label'=>'Размеры']);

//        CRUD::addColumn(['name' => 'created_at', 'type' => 'date','label'=>'Дата публикации']);

//        CRUD::addColumn(['label'     => "Категории",
//            'type'      => 'select_multiple',
//            'name'      => 'categories', // the method that defines the relationship in your Model
//
//            // optional
//            'entity'    => 'categories', // the method that defines the relationship in your Model
//            'model'     => "App\Models\Categories", // foreign key model
//            'attribute' => 'name',]); // foreign key attribute that is shown to user]);

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
        CRUD::setValidation(ProductsRequest::class);

        CRUD::addField(['name' => 'title', 'type' => 'text','label'=>'Заголовок']);

        CRUD::addField(['name' => 'type_of_transmission', 'type' => 'select','label'=>'Тип передачи','entity'=>'typeOfTransmission']);

        CRUD::addField(['name' => 'number_of_transfer_stages', 'type' => 'select','label'=>'Количество передаточных ступеней','entity'=>'numberOfTransferStages']);

        CRUD::addField(['name' => 'gear_ratio', 'type' => 'select','label'=>'Передаточное отношение','entity'=>'gearRatio']);

        CRUD::addField(['name' => 'location_of_axes', 'type' => 'select','label'=>'Расположение осей','entity'=>'locationOfAxes']);

        CRUD::addField(['name' => 'climatic_version', 'type' => 'text','label'=>'Климатическое исполнение']);

        CRUD::addField(['name' => 'build_option', 'type' => 'text','label'=>'Вариант сборки']);

        CRUD::addField(['name' => 'state_standard', 'type' => 'text','label'=>'ГОСТ']);



        CRUD::addField(['name' => 'slug', 'type' => 'text','label'=>'slug']);

        CRUD::addField(['label'     => "Категории",
            'type'      => 'select_multiple',
            'name'      => 'categories', // the method that defines the relationship in your Model

            // optional
            'entity'    => 'Categories', // the method that defines the relationship in your Model
            'model'     => "App\Models\Categories", // foreign key model
            'attribute' => 'name',]);
        CRUD::addField(['name' => 'desc', 'type'  => 'summernote',
            'options' => [
                'toolbar' => [
                    ['font', ['bold', 'underline', 'italic']],
                ]
            ],'label'=>'Содержание']);
//        CRUD::addField(['name' => 'size', 'type'  => 'summernote',
//            'options' => [
//                'toolbar' => [
//                    ['font', ['bold', 'underline', 'italic']],
//                    ['para', ['ul']],
//                    ['insert', ['link', 'picture', 'video']],
//
//                ]
//            ],'label'=>'Размеры']);
        CRUD::addField([
            'name'=>'size',
            'type'=>'view',
            'view'=>'vendor.backpack.custom-fields.motor-sizes'
        ]);
        CRUD::addField(['name' => 'image', 'type' => 'upload','label'=>'Изображение','upload'=>true]);
        Widget::add()->type('script')->content('js/motor-sizes.js');

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
//        CRUD::removeColumn('image');
//        CRUD::addColumn(
//            [
//                'name'      => 'image',
//                'label'     => 'Изображение',
//                'type'      => 'image',
//                'prefix' => 'storage/images/news/',
//                'width'=>'300px',
//                'height'=>'300px',
//
//            ]
//        );
//        CRUD::addColumn([
//            'name'=>'desc',
//            'label'=>'Содержание',
//            'type' => 'model_function',
//            'function_name'=>'descAttribute'
//        ]);

    }
}
