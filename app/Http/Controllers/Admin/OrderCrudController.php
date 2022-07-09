<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\OrderRequest;
use App\Models\Order;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

/**
 * Class OrderCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class OrderCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Order::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/order');
        CRUD::setEntityNameStrings('order', 'orders');
        CRUD::denyAccess(['create','delete']);

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
                'name'=>'user_name',
                'label'=>'ФИО',
                'type'=>'text'
            ]);
        CRUD::addColumn([
            'name'=>'user_phone_number',
            'label'=>'Номер телефона'
        ]);
        CRUD::addColumn( [
                'name'=>'user_email',
                'label'=>'Email'
            ]);

        CRUD::addColumn([
                'name'=>'product_name',
                'label'=>'Товар'
            ]);
        CRUD::addColumn([
            'name'=>'status_id',
            'label'=>'Статус',
            'type'=>'select',
            'entity'=>'status',
            'model'=>'App\Models\AppealStatus',
            'attribute'=>'name'
        ]);
        CRUD::addButtonFromModelFunction('line', 'open_uri', 'openUri', 'beginning');
        CRUD::removeButton('show');

        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']);
         */
    }
    protected function setupShowOperation(){
        $this->setupListOperation();
    }
    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(OrderRequest::class);



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
        CRUD::addField([
            'type'=>'view',
            'view'=>'vendor.backpack.custom-views.order-details',
            'name'=>'user_name',
            'label'=>'ФИО',
            'attributes'=>[
                'readonly'=>'readonly'
            ]
        ]);
        CRUD::addField([
            'type'=>'view',
            'view'=>'vendor.backpack.custom-views.order-details',
            'name'=>'user_email',
            'label'=>'Email',
            'attributes'=>[
                'readonly'=>'readonly'
            ]
        ]);
        CRUD::addField([
            'type'=>'view',
            'view'=>'vendor.backpack.custom-views.order-details',
            'name'=>'user_phone_number',
            'label'=>'Номер телефона',
            'attributes'=>[
                'readonly'=>'readonly'
            ]
        ]);
        CRUD::addField([
            'type'=>'view',
            'view'=>'vendor.backpack.custom-views.order-details',
            'name'=>'product_name',
            'label'=>'Товар',
            'attributes'=>[
                'readonly'=>'readonly'
            ]
        ]);
        CRUD::addField([
            'name'=>'content',
            'type'=>'view',
            'view'=>'vendor.backpack.custom-views.order-details-li',
            'label'=>'Данные заказа',
        ]);
        CRUD::addField([
            'name'=>'status_id',
            'label'=>'Статус',
            'type'=>'select',
            'entity'=>'status',
            'model'=>'App\Models\AppealStatus',
            'attribute'=>'name'
        ]);
    }
    public function makeOrder(Request $request){
        $data = $request->all();
//        dd($data);
        if($data['accept'] === 'on'){
            $content = $request->details;
        }else{
            $content = [];
            foreach ($data as $key=>$value){
                if(preg_match("/[А-Яа-я]/",$key)){
                    $content[$key] = $value;
                }
            }
            $content = serialize($content);
        }

//        dd($content);
        $order = new Order();
        $order->user_name = $request->user_name;
        $order->user_email = $request->user_email;
        $order->user_phone_number = $request->user_phone;
        $order->user_comment = $request->user_comment;
        $order->product_name = $request->product_name;
        $order->uri = $request->uri;
        $order->content = $content;
        $order->save();
        $data=['name'=>$request->user_name,'email'=>$request->user_email, 'phone'=>$request->user_phone, 'text'=>$request->user_comment,'product'=>$request->product_name];
        Mail::send('test', $data, function ($m) {
            $email ="uralredutor@yandex.ru";
            $m->from($email);
            $m->to($email);
        });
        return back()->with(['message'=>'Заказ успешно оформлен']);
    }
}
