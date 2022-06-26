<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ProductsRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Backpack\CRUD\app\Library\Widget;
use Illuminate\Http\Request;

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
//        CRUD::addColumn([
//            'name'=>'image',
//            'label'=>'Изображение',
//            'type'=>'model_function',
//            'function_name'=>'getMainImageThumbnail'
//        ]);
        CRUD::addColumn([
            'name'=>'name',
            'label'=>'Название',
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
        CRUD::setValidation(ProductsRequest::class);
//        CRUD::addField([
//            'name'=>'mainImage',
//            'type'=>'upload',
//            'label'=>'Основное изображение'
//        ]);
//        CRUD::addField([
//            'name'=>'galleryImage',
//            'type'=>'upload_multiple',
//            'label'=>'Галлерея изображений',
//
//        ]);
        CRUD::addField([
            'name'=>'name',
            'type'=>'text',
            'label'=>'Название',
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
        CRUD::addField([
            'name'=>'number_of_transfer_stages',
            'type'=>'select',
            'label'=>'Количество передаточный ступней',
            'entity'=>'numberOfTransferStages',
//            'model'=>'App\Models\NumberOfTransferStages',

        ]);
        CRUD::addField([
            'name'=>'series_id',
            'type'=>'select',
            'label'=>'Серия',
            'entity'=>'series',
//            'model'=>'App\Models\NumberOfTransferStages',

        ]);
        CRUD::addField([
            'name'=>'location_of_axes',
            'type'=>'select',
            'label'=>'Расположение осей',
            'entity'=>'locationOfAxes',
//            'model'=>'App\Models\LocationOfAxes',
            'wrapper'   => [
                'class'      => 'form-group col-md-4'
            ],
        ]);
        CRUD::addField([
            'name'=>'climatic_version',
            'type'=>'text',
            'label'=>'Климатическое исполнение',
            'wrapper'   => [
                'class'      => 'form-group col-md-4'
            ],
        ]);
        CRUD::addField([
            'name'=>'gost',
            'type'=>'checkbox',
            'label'=>'ГОСТ',
            'wrapper'   => [
                'class'      => 'form-group col-md-4'
            ],
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
                    ['view', ['fullscreen']]
                ]
            ],
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
                    ['view', ['fullscreen']]
                ]
            ],
        ]);
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
    }
    public function storeImages(Request $request){
        dd($request);
    }
}
