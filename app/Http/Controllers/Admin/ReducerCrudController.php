<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\StoreImage;
use App\Http\Requests\ReducerRequest;
use App\Models\Image;
use App\Models\Reducer;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Backpack\CRUD\app\Library\Widget;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

/**
 * Class ReducerCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ReducerCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation {store as traitStore;}
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation { update as traitUpdate; }
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
        CRUD::setEntityNameStrings('редуктор', 'Редукторы');
//        $this->crud->setOperationSetting('saveAllInputsExcept', ['_token', '_method', 'http_referrer', 'current_tab', 'save_action']);
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
            'name'=>'image',
            'label'=>'Загрузите основное изображение',
            'type'=>'upload',
            'upload' => true,
        ]);
        CRUD::addField([
            'name'=>'gallery',
            'label'=>'Загрузите изображени для галлереи',
            'type'=>'upload_multiple',
            'upload' => true,

//            'model'=>'App\Models\Reducer',
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

//    public function storeSizeImages(Request $request){
//        $description = $request->data;
//        $dom = new \DomDocument();
//        $dom->loadHtml($description, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
//        $images = $dom->getElementsByTagName('img');
//        $li = $dom->getElementsByTagName('li');
//        foreach ($li as $one => $style){
//            $style->removeAttribute('style');
//        }
//        foreach($images as $k => $img){
//            $data = $img->getAttribute('src');
//            if ( base64_encode(base64_decode($data, true)) === $data){
//                list($type, $data) = explode(';', $data);
//                list($type, $data) = explode(',', $data);
//                $data = base64_decode($data);
//                $image_name=  time().$k.'.png';
//                \File::put(storage_path(). '/app/public/images/products/reducers/sizes/' . $image_name, $data);
//                $img->removeAttribute('src');
//                $img->setAttribute('src', '{!!asset("storage/products/reducers/sizes/")!!}'.$image_name);
//            }
//        }
//        $description = $dom->saveHTML();
//        return response()->json($description);
////        $this->attributes['image'] = StoreImage::storeImage($value,$path);
//    }
    public function update(){
        $path = 'products';
        $mainImage = $this->crud->getRequest()->file('image');
        $gallery = $this->crud->getRequest()->file('gallery');
        //Главное изображение
        $response = $this->traitUpdate();
        if(!empty($mainImage)) {
            $this->crud->entry->update(['image' => StoreImage::storeImage($mainImage, $path)]);
        }
        if(!empty($gallery)){
            foreach ($gallery as $file){
                $storeFile = Reducer::findOrFail($this->crud->entry->id);
                $storeFile->name = StoreImage::storeImage($file, $path,false,true);
                $this->crud->entry->images()->create(['name'=>$storeFile->name]);
            }
        }
        return $response;
    }
    public function store()
    {
        $path = 'products';
        $mainImage = $this->crud->getRequest()->file('image');
        $gallery = $this->crud->getRequest()->file('gallery');
        //Главное изображение
        $response = $this->traitStore();
        if(!empty($mainImage)){
            $this->crud->entry->update(['image' => StoreImage::storeImage($mainImage, $path)]);
        }
        if(!empty($gallery)){
            foreach ($gallery as $file){
                $storeFile = Reducer::findOrFail($this->crud->entry->id);
                $storeFile->name = StoreImage::storeImage($file, $path);
                $this->crud->entry->images()->create(['name'=>$storeFile->name]);
            }
        }
        return $response;
    }
}
