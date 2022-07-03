<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\QuestionAnswerRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class QuestionAnswerCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class QuestionAnswerCrudController extends CrudController
{
    use \Backpacktions\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Opera
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
        CRUD::addColumn(['name' => 'status', 'type' => 'number','label'=>'Статус']);
        CRUD::addColumn([
            'name'=>'name',
            'type'=>'select',
            'label'=>'Тип редуктора',
            'entity'=>'questions'
        ]);
        CRUD::column('created_at');
        CRUD::column('updated_at');

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

        CRUD::field('name');
        CRUD::field('email');
        CRUD::field('question');
        CRUD::field('answer');
        CRUD::addField([
            'name'=>'status',
            'label'=>'Статус',
            'attributes' => [
                'min'    => '0',
                'max'    => '1',
            ]
        ]);
        CRUD::field('product_id');

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
}
