<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\StoreImage;
use App\Http\Requests\GearMotorRequest;
use App\Models\GearMotor;
use App\Models\GearRatio;
use App\Models\Reducer;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Backpack\CRUD\app\Library\Widget;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

/**
 * Class GearMotorCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class GearMotorCrudController extends CrudController
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
        CRUD::setModel(\App\Models\GearMotor::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/gear-motor');
        CRUD::setEntityNameStrings('мотор-редуктор', 'Мотор-редукторы');
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
        CRUD::setValidation(GearMotorRequest::class);
        if(backpack_user()->hasRole(['Админ','Контент-Менеджер'])){
        CRUD::addField([
            'name'=>'name',
            'label'=>'Название',
            'type'=>'text',
            'wrapper'=>[
                'class'=>'form-group col-md-6'
            ],
            'tab'=>'Основные',
        ]);
        CRUD::addField([
            'name'=>'slug',
            'label'=>'Уникальная ссылка',
            'type'=>'text',
            'wrapper'=>[
                'class'=>'form-group col-md-6'
            ],
            'attributes'=>[
                'readonly'=>'readonly',

            ],
            'tab'=>'Основные'
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
            'upload' => true
        ]);

        CRUD::addField([
            'name'=>'category_id',
            'type'=>'select2',
            'label'=>'Тип редуктора',
            'entity'=>'category',
            'model'=>'App\Models\Categories',
            'wrapper'=>[
                'class'=>'form-group col-md-6',
            ],
            'attributes'=>[
                'readonly'    => 'readonly',
            ],
            'tab'=>'Основные'

        ]);
        CRUD::addField([
            'name'=>'series_id',
            'type'=>'select2',
            'label'=>'Серия',
            'entity'=>'series',
            'model'=>'App\Models\MotorSeries',
            'wrapper'=>[
                'class'=>'form-group col-md-6'
            ],
            'tab'=>'Основные',
        ]);
        CRUD::addField([
            'name'=>'number_of_transfer_stages_id',
            'type'=>'select2',
            'label'=>'Количество передаточных ступней',
            'entity'=>'NumberOfTransferStages',
            'model'=>'App\Models\NumberOfTransferStages',
            'wrapper'=>[
                'class'=>'form-group col-md-6'
            ],
            'tab'=>'Характеристики'
        ]);
        CRUD::addField([
            'name'=>'location_of_axes_id',
            'type'=>'select2',
            'label'=>'Расположение осей',
            'entity'=>'locationOfAxes',
            'model'=>'App\Models\locationOfAxes',
            'wrapper'=>[
                'class'=>'form-group col-md-3'
            ],
            'tab'=>'Характеристики'
        ]);
        CRUD::addField([
            'name'=>'weight',
            'type'=>'number',
            'label'=>'Масса',

            'wrapper'=>[
                'class'=>'form-group col-md-3'
            ],
            'tab'=>'Характеристики'
        ]);

        CRUD::addField([
            'name'=>'torque',
            'type'=>'text',
            'label'=>'Крутящий момент Н*м',
            'tab'=>'Характеристики',
        ]);
            CRUD::addField([
                'name'=>'paws',
                'type'=>'select2_from_ajax_multiple',
                'label'=>'Монтажное положение на лапах',
                'tab'=>'Характеристики',
                'entity'=>'paws',
                'attribute'   => "name", // foreign key attribute that is shown to user
                'wrapper'=>[
                    'class'=>'col-md-6'
                ],
                'include_all_form_fields' => true, //sends the other form fields along with the request so it can be filtered.
                'minimum_input_length' => 0, // minimum characters to type before querying results
                'dependencies'         => ['series_id'],
                'data_source'          => url('api/currentPaws'),
                'model'=>'App\Models\Paws',
                'method'=>'POST',
                'ajax'=>true
            ]);
            CRUD::addField([
                'name'=>'flanges',
                'type'=>'select2_from_ajax_multiple',
                'label'=>'Монтажное положение на фланце',
                'tab'=>'Характеристики',
                'entity'=>'flanges',
                'attribute'   => "name", // foreign key attribute that is shown to user
                'wrapper'=>[
                    'class'=>'col-md-6'
                ],
                'include_all_form_fields' => true, //sends the other form fields along with the request so it can be filtered.
                'minimum_input_length' => 0, // minimum characters to type before querying results
                'dependencies'         => ['series_id'],
                'data_source'          => url('api/currentFlanges'),
                'model'=>'App\Models\Flange',
                'method'=>'POST',
                'ajax'=>true
            ]);
        CRUD::addField([
            'name'=>'outputShafts',
            'type'=>'select2_from_ajax_multiple',
            'label'=>'Выходной вал',
            'tab'=>'Характеристики',
            'entity'=>'outputShafts',
            'attribute'   => "name", // foreign key attribute that is shown to user
            'wrapper'=>[
                'class'=>'col-md-6'
            ],
            'include_all_form_fields' => true, //sends the other form fields along with the request so it can be filtered.
            'minimum_input_length' => 0, // minimum characters to type before querying results
            'dependencies'         => ['series_id'],
            'data_source'          => url('api/currentOutputShaftsForGear'),
            'model'=>'App\Models\Shaft',
            'method'=>'POST',
            'ajax'=>true
        ]);
            CRUD::addField([
                'name'=>'output_shaft_id',
                'type'=>'select2_from_ajax',
                'label'=>'Выходной вал по умолчанию',
                'tab'=>'Характеристики',
                'entity'=>'outputShaft',
                'attribute'   => "name", // foreign key attribute that is shown to user
                'wrapper'=>[
                    'class'=>'col-md-6'
                ],
                'include_all_form_fields' => true, //sends the other form fields along with the request so it can be filtered.
                'minimum_input_length' => 0, // minimum characters to type before querying results
                'dependencies'         => ['series_id'],
                'data_source'          => url('api/currentOutputShaftsForGear'),
                'model'=>'App\Models\Shaft',
                'method'=>'POST',
                'ajax'=>true
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
            'tab'=>'Характеристики'
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
                'tab'=>'Характеристики'
            ]);
        }
        if(backpack_user()->hasRole(['СЕО'])){
            CRUD::addField([
                'name'=>'name',
                'label'=>'Название',
                'type'=>'text',
                'wrapper'=>[
                    'class'=>'form-group col-md-6'
                ],
                'attributes'=>[
                    'readonly'=>'readonly'
                ],
                'tab'=>'Сео',
            ]);
            CRUD::addField([
                'name'=>'slug',
                'label'=>'Уникальная ссылка',
                'type'=>'text',
                'wrapper'=>[
                    'class'=>'form-group col-md-6'
                ],
                'attributes'=>[
                    'readonly'=>'readonly'
                ],
                'tab'=>'Сео',
            ]);
        }
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


        /**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number']));
         */
    }

    protected function setupShowOperation(){
        CRUD::addColumn([
            'name'=>'name',
            'label'=>'Название',
        ]);
        CRUD::addColumn([
            'name'=>'slug',
            'label'=>'Уникальная ссылка',
        ]);
        CRUD::addColumn([
            'name'=>'image',
            'type'=>'image',
            'label'=>'Изображение',
            'prefix'=>'storage/images/products/',
            'width'=>'100px',
            'height'=>'100px',
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
        CRUD::addColumn([
            'name'=>'location_of_axes_id',
            'type'=>'select',
            'label'=>'Расположение осей',
            'entity'=>'locationOfAxes'
        ]);
        CRUD::addColumn([
            'name'=>'number_of_transfer_stages_id',
            'type'=>'select',
            'label'=>'Количество передаточных ступней',
            'entity'=>'numberOfTransferStages'
        ]);

        CRUD::addColumn([
            'name'=>'series.outputShafts',
            'type'=>'select_multiple',
            'label'=>'Выходной вал',
            'entity'=>'outputShafts',
            'attribute'=>'name',
        ]);
        CRUD::addColumn([
            'name'=>'series.paws',
            'type'=>'select_multiple',
            'label'=>'Монтажное положение на лапах',
            'entity'=>'paws',
            'attribute'=>'name',
        ]);
        CRUD::addColumn([
            'name'=>'series.flanges',
            'type'=>'select_multiple',
            'label'=>'Монтажное положение на фланце',
            'entity'=>'flanges',
            'attribute'=>'name',
        ]);
        CRUD::addColumn([
            'name'=>'desc',
            'label'=>'Описание',
            'type'=>'model_function',
            'function_name'=>'DescAttribute'
        ]);

    }

    /**
     * Define what happens when the Update operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */

    protected function setupUpdateOperation()
    {
        CRUD::setValidation(GearMotorRequest::class);
        $this->setupCreateOperation();
    }
    public function update(){
        CRUD::setValidation(GearMotorRequest::class);
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
                $storeFile = GearMotor::findOrFail($this->crud->entry->id);
                $storeFile->name = StoreImage::storeImage($file, $path,false,true);
                $this->crud->entry->images()->create(['name'=>$storeFile->name]);

            }

        }

        return $response;
    }
    public function store()
    {
        CRUD::setValidation(GearMotorRequest::class);
        $path = 'products';

        $mainImage = $this->crud->getRequest()->file('image');
        $gallery = $this->crud->getRequest()->file('gallery');
        $this->crud->getRequest()->request->add(['category_id',5]);
        //Главное изображение
        $response = $this->traitStore();
        if(!empty($mainImage)) {
            $this->crud->entry->update(['image' => StoreImage::storeImage($mainImage, $path)]);
        }
        if(!empty($gallery)){
            foreach ($this->crud->entry->images as $image){
                Storage::delete('/public/images/products/'.$image->name);
            }
            $this->crud->entry->images()->delete();
            foreach ($gallery as $file){
                $storeFile = GearMotor::findOrFail($this->crud->entry->id);
                $storeFile->name = StoreImage::storeImage($file, $path,false,true);
                $this->crud->entry->images()->create(['name'=>$storeFile->name]);
            }
        }
        return $response;
    }
    public function sendForm(Request $request){
        $product = GearMotor::find($request->id);

//        $validate = Validator::make(Input::all(), [
//            'g-recaptcha-response' => 'required|captcha'
//        ]);
//        if ($validate){
        $product->questions()->create([
            'name'=>$request->name,
            'email'=>$request->email,
            'question'=>$request->textarea,
            'link'=>$request->link,
            'answer'=>'',
            'status'=>0,
        ]);
        $data=['name'=>$request->name,'email'=>$request->email,'text'=>$request->textarea];
        Mail::send('test', $data, function ($m) {
            $email ="uralredutor@yandex.ru";
            $m->from($email);
            $m->to($email);
        });
        $product->save();
//        }

        return back()->with('Всё');

    }
}
