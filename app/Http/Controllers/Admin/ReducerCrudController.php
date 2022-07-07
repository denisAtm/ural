<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\StoreImage;
use App\Http\Requests\ReducerRequest;
use App\Models\GearRatio;
use App\Models\Image;
use App\Models\QuestionAnswer;
use App\Models\Reducer;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Backpack\CRUD\app\Library\Widget;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

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
            ],
            'tab'=>'Основное',
        ]);
        CRUD::addField([
            'name'=>'slug',
            'label'=>'Уникальная ссылка',
            'type'=>'text',
            'wrapper'=>[
                'class'=>'form-group col-md-12'
            ],
            'attributes'=>[
                'readonly'=>'readonly'
            ],
            'tab'=>'Основное',
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
//            'entity'=>'images',
//            'attribute'=>'title',
        ]);

        CRUD::addField([
            'name'=>'category_id',
            'type'=>'select',
            'label'=>'Тип редуктора',
            'entity'=>'category',
            'model'=>'App\Models\Categories',
            'wrapper'=>[
                'class'=>'form-group col-md-12'
            ],
            'tab'=>'Основное',
        ]);
        CRUD::addField([
            'name'=>'series_id',
            'type'=>'select',
            'label'=>'Серия',
            'entity'=>'series',
            'model'=>'App\Models\Series',
            'wrapper'=>[
                'class'=>'form-group col-md-12'
            ],
            'tab'=>'Основное',
        ]);
        CRUD::addField([
            'name'=>'number_of_transfer_stages_id',
            'type'=>'select',
            'label'=>'Количество передаточных ступней',
            'entity'=>'NumberOfTransferStages',
            'model'=>'App\Models\NumberOfTransferStages',
            'wrapper'=>[
                'class'=>'form-group col-md-6'
            ],
            'tab'=>'Характеристики',
        ]);
        CRUD::addField([
            'name'=>'location_of_axes_id',
            'type'=>'select',
            'label'=>'Расположение осей',
            'entity'=>'locationOfAxes',
            'model'=>'App\Models\locationOfAxes',
            'wrapper'=>[
                'class'=>'form-group col-md-3'
            ],
            'tab'=>'Характеристики',
        ]);

        CRUD::addField([
            'name'=>'weight',
            'label'=>'Масса',
            'type'=>'text',
            'wrapper'=>[
                'class'=>'form-group col-md-3'
            ],
            'tab'=>'Характеристики',
        ]);

        CRUD::addField([
            'name'=>'buildOptions',
            'type'=>'select_multiple',
            'label'=>'Варианты сборки',
            'entity'=>'buildOptions',
            'wrapper'=>[
                'class'=>'form-group col-md-6'
            ],
            'tab'=>'Характеристики',
        ]);
//        CRUD::addField([
//            'name'=>'gearRatios',
//            'type'=>'select_multiple',
//            'label'=>'Передаточное отношение',
//            'entity'=>'gearRatios',
//            'wrapper'=>[
//                'class'=>'form-group col-md-6'
//            ],
//            'tab'=>'Характеристики',
//        ]);
        CRUD::addField([
           'name'=>'gearRatioStart',
           'label'=>'Передаточное отношение от',
           'type'=>'number',
           'wrapper'=>[
               'class'=>'form-group col-md-3'
           ],
           'attributes'=>[
               'placeholder'=>'ОТ'
           ],
           'tab'=>'Характеристики'
        ]);


        CRUD::addField([
            'name'=>'title',
            'label'=>'Заголовок',
            'type'=>'text',
            'attributes'=>[
                'placeholder'=>'Заголовок'
            ],
            'tab'=>'Сео'
        ]);
        CRUD::addField([
            'name'=>'description',
            'label'=>'Описание',
            'type'=>'text',
            'attributes'=>[
                'placeholder'=>'Описание'
            ],
            'tab'=>'Сео'
        ]);
        CRUD::addField([
            'name'=>'alt',
            'label'=>'Альтернативный текст',
            'type'=>'text',
            'attributes'=>[
                'placeholder'=>'Альтернативный текст'
            ],
            'tab'=>'Сео'
        ]);
        CRUD::addField([
            'name'=>'keywords',
            'label'=>'Ключевые слова(через запятую или пробел)',
            'type'=>'text',
            'attributes'=>[
                'placeholder'=>'Ключевые слова'
            ],
            'tab'=>'Сео'
        ]);
        CRUD::addField([
            'name'=>'canonical',
            'label'=>'Каноническая ссылка',
            'type'=>'text',
            'attributes'=>[
                'placeholder'=>'Каноническая ссылка'
            ],
            'tab'=>'Сео'
        ]);

        CRUD::addField([
            'name'=>'gearRatioEnd',
            'type'=>'number',
            'label'=>'<br>до',
            'wrapper'=>[
                'class'=>'form-group col-md-3'
            ],
            'attributes'=>[
                'placeholder'=>'ДО'
            ],
            'tab'=>'Характеристики'
        ]);
        CRUD::addField([
            'name'=>'torque',
            'type'=>'text',
            'label'=>'Крутящий момент Н*м',
            'tab'=>'Характеристики'
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
                ]],
            'tab'=>'Характеристики',
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
            ],
            'tab'=>'Характеристики',
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

    public function update(){
        CRUD::setValidation(ReducerRequest::class);
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
        CRUD::setValidation(ReducerRequest::class);
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
    public function sendForm(Request $request){
        $product = Reducer::find($request->id);

//        $validate = Validator::make(Input::all(), [
//            'g-recaptcha-response' => 'required|captcha'
//        ]);
//        if ($validate){
            $product->questions()->create([
                'name'=>$request->name,
                'email'=>$request->email,
                'question'=>$request->textarea,
                'answer'=>'',
                'status'=>0,
            ]);
            $product->save();
//        }
        $data=['name'=>$request->name,'email'=>$request->email,'text'=>$request->textarea];
        Mail::send('test', $data, function ($m) {
            $email ="uralredutor@yandex.ru";
            $m->from($email);
            $m->to($email);
        });
        return back()->with('Всё');

    }
}
