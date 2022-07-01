<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\StoreImage;
use App\Http\Requests\ReducerRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Backpack\CRUD\app\Library\Widget;
use Illuminate\Http\Request;

/**
 * Class ReducerCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ReducerCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Reducer::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/reducer');
        CRUD::setEntityNameStrings('reducer', 'reducers');
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
        CRUD::setValidation(ReducerRequest::class);

        CRUD::addField([
            'name'=>'name',
            'label'=>'Название',
            'type'=>'text',
            'wrapper'=>[
                'class'=>'form-group col-md-12'
            ]
        ]);
        CRUD::addField([
            'name'=>'slug',
            'label'=>'slug',
            'type'=>'text',
            'wrapper'=>[
                'class'=>'form-group col-md-12'
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
                'class'=>'form-group col-md-12'
            ]
        ]);
        CRUD::addField([
            'name'=>'series_id',
            'type'=>'select',
            'label'=>'Серия',
            'entity'=>'series',
            'model'=>'App\Models\Series',
            'wrapper'=>[
                'class'=>'form-group col-md-12'
            ]
        ]);
        CRUD::addField([
            'name'=>'number_of_transfer_stages_id',
            'type'=>'select',
            'label'=>'Количество передаточных ступней',
            'entity'=>'NumberOfTransferStages',
            'model'=>'App\Models\NumberOfTransferStages',
            'wrapper'=>[
                'class'=>'form-group col-md-12'
            ]
        ]);
        CRUD::addField([
            'name'=>'location_of_axes_id',
            'type'=>'select',
            'label'=>'Расположение осей',
            'entity'=>'locationOfAxes',
            'model'=>'App\Models\locationOfAxes',
            'wrapper'=>[
                'class'=>'form-group col-md-12'
            ]
        ]);
        CRUD::addField([
            'name'=>'climatic_version',
            'label'=>'Климатическое исполнение',
            'type'=>'text',
            'wrapper'=>[
                'class'=>'form-group col-md-12'
            ]
        ]);
        CRUD::addField([
            'name'=>'console_load',
            'label'=>'Консольная нагрузка',
            'type'=>'text',
            'wrapper'=>[
                'class'=>'form-group col-md-12'
            ]
        ]);
        CRUD::addField([
            'name'=>'weight',
            'label'=>'Масса',
            'type'=>'text',
            'wrapper'=>[
                'class'=>'form-group col-md-12'
            ]
        ]);
        CRUD::addField([
            'name'=>'weight',
            'label'=>'Масса',
            'type'=>'text',
            'wrapper'=>[
                'class'=>'form-group col-md-12'
            ]
        ]);
        CRUD::addField([
            'name'=>'buildOptions',
            'type'=>'select_multiple',
            'label'=>'Варианты сборки',
            'entity'=>'buildOptions',
            'wrapper'=>[
                'class'=>'form-group col-md-12'
            ]
        ]);
        CRUD::addField([
            'name'=>'gearRatios',
            'type'=>'select_multiple',
            'label'=>'Передаточное отношение',
            'entity'=>'gearRatios',
            'wrapper'=>[
                'class'=>'form-group col-md-12'
            ]
        ]);
//        CRUD::addField([
//            'name'=>'frontShafts',
//            'type'=>'select_multiple',
//            'label'=>'Передний вал',
//            'entity'=>'frontShafts',
//            'attribute' => 'name',
//            'wrapper'=>[
//                'class'=>'form-group '
//            ],
//            'options'   => (function ($entry) {
//                dd($entry);
//            }),
//        ]);
//        CRUD::addField([
//            'name'=>'outputShafts',
//            'type'=>'select_multiple',
//            'label'=>'Выходной вал',
//            'entity'=>'outputShafts',
//            'attribute' => 'name',
//            'wrapper'=>[
//                'class'=>'form-group form-group '
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
                ]],
            'attributes'=>[
                'id'=>'size'
            ]
        ]);
//        CRUD::addField([
//            'name'=>'size',
//            'label'=>'Размеры',
//            'type'=>'view',
//            'view'=>'vendor/backpack/custom-fields/motor-sizes'
//        ]);


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
//    public function storeSizeImages(Request $request){
//        $description = $request->data;
//        $dom = new \DomDocument();
//        $dom->loadHtml($description, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
//        $images = $dom->getElementsByTagName('img');
//        $li = $dom->getElementsByTagName('li');
//        $data = '';
//        foreach ($li as $one => $style){
//            $style->removeAttribute('style');
//
//        }
//        foreach($images as $k => $img){
//            $data = $img->getAttribute('src');
//            list($type, $data) = explode(';', $data);
//            list($type, $data) = explode(',', $data);
//            $data = base64_decode($data);
//            $image_name=  time().$k.'.png';
//            \File::put(storage_path(). '/app/public/images/products/reducers/sizes/' . $image_name, $data);
//            $img->removeAttribute('src');
//            $img->removeAttribute('style');
//            $img->removeAttribute('data-filename');
//            $img->setAttribute('src', $image_name);
//            $img->setAttribute('data-filename', $image_name);
//            $img->setAttribute('loading', 'lazy');
//            $img->setAttribute('decoding', 'acync');
//        }
//        $description = $dom->saveHTML();
//        return response()->json($description);
////        $this->attributes['image'] = StoreImage::storeImage($value,$path);
//    }

}
