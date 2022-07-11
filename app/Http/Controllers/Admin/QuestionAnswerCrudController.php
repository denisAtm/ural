<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\QuestionAnswerRequest;
use App\Models\QuestionAnswer;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Backpack\CRUD\app\Library\Widget;
use Illuminate\Support\Facades\Mail;

/**
 * Class QuestionAnswerCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class QuestionAnswerCrudController extends CrudController
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
        CRUD::setModel(\App\Models\QuestionAnswer::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/question-answer');
        CRUD::setEntityNameStrings('Вопрос ответ', 'Вопрос ответ');
        CRUD::denyAccess('create');

    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::addColumn(['name' => 'name', 'type' => 'text','label'=>'Имя']);
        CRUD::addColumn(['name' => 'email', 'type' => 'text','label'=>'Почта']);
        CRUD::addColumn(['name' => 'question', 'type' => 'text','label'=>'Вопрос']);
        CRUD::addColumn(['name' => 'answer', 'type' => 'text','label'=>'Ответ']);
        CRUD::addColumn(['name' => 'status_id', 'type' => 'select','label'=>'Статус','entity'=>'status','attribute'=>'name']);
        CRUD::addColumn(['name' => 'link', 'type' => 'text','label'=>'Страница']);
//        CRUD::addColumn([
//            'name'=>'name',
//            'type'=>'select',
//            'label'=>'Тип редуктора',
//            'entity'=>'questions'
//        ]);
        CRUD::addButtonFromModelFunction('line', 'open_uri', 'openUri', 'beginning');
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
        CRUD::setValidation(QuestionAnswerRequest::class);

        CRUD::addField([
            'type'=>'view',
            'view'=>'vendor.backpack.custom-views.order-details',
            'name'=>'name',
            'label'=>'ФИО',
            'attributes'=>[
                'readonly'=>'readonly'
            ]
        ]);
        CRUD::addField([
            'type'=>'view',
            'view'=>'vendor.backpack.custom-views.order-details',
            'name'=>'email',
            'label'=>'Email',
            'attributes'=>[
                'readonly'=>'readonly'
            ]
        ]);

        CRUD::addField([
            'type'=>'view',
            'view'=>'vendor.backpack.custom-views.order-details',
            'name'=>'question',
            'label'=>'Вопрос',
            'attributes'=>[
                'readonly'=>'readonly'
            ]
        ]);

        CRUD::field('answer')->label('Добавит ответь')->type('textarea')->events([
            'updating' => function ($entry) {
                if (!empty($entry->answer)){
                    $answer_email = $entry->email;
                    Mail::send(['html' => 'answer'], ['name'=>$entry->name,'text'=>$entry->email,'answer'=>$entry->answer], function ($m) use ($entry) {
                        $email ="uralredutor@yandex.ru";
                        $m->from($email);
                        $m->to($entry->email);
                    });
                }
            },

        ]);
        CRUD::addField([
            'name'=>'status',
            'label'=>'Статус',
            'entity'=>'status',
            'type'=>'select',
            'model'=>'App\Models\AppealStatus',
            'attribute'=>'name'
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
    protected function setupShowOperation()
    {
        CRUD::addColumn([
            'name'=>'name',
            'label'=>'ФИО',
        ]);
        CRUD::addColumn([
            'name'=>'email',
            'label'=>'Email',
        ]);
        CRUD::addColumn([
            'name'=>'question',
            'label'=>'Вопрос',
        ]);
        CRUD::addColumn([
            'name'=>'answer',
            'label'=>'Ответ',
        ]);
        CRUD::addColumn([
            'name'=>'status',
            'label'=>'Статус',
            'type'=>'select',
            'entity'=>'status',
            'attribute'=>'name'
        ]);

    }
}
