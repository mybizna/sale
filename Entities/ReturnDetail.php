<?php

namespace Modules\Sale\Entities;

use Modules\Base\Entities\BaseModel;
use Illuminate\Database\Schema\Blueprint;

use Modules\Core\Classes\Views\ListTable;
use Modules\Core\Classes\Views\FormBuilder;

class ReturnDetail extends BaseModel
{

    protected $fillable = [
        'invoice_details_id', 'trn_no', 'product_id', 'qty', 'unit_price', 'discount',
        'tax', 'item_total', 'ecommerce_type'
    ];
    public $migrationDependancy = [];
    protected $table = "sale_return_detail";


    public function listTable(){
        // listing view fields
        $fields = new ListTable();

        $fields->name('invoice_details_id')->type('text')->ordering(true);
        $fields->name('trn_no')->type('text')->ordering(true);
        $fields->name('product_id')->type('text')->ordering(true);
        $fields->name('qty')->type('text')->ordering(true);
        $fields->name('unit_price')->type('text')->ordering(true);
        $fields->name('discount')->type('text')->ordering(true);
        $fields->name('tax')->type('text')->ordering(true);
        $fields->name('item_total')->type('text')->ordering(true);
        $fields->name('ecommerce_type')->type('text')->ordering(true);

        return $fields;

    }
    
    public function formBuilder(){
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('invoice_details_id')->type('text')->group('w-1/2');
        $fields->name('trn_no')->type('text')->group('w-1/2');
        $fields->name('product_id')->type('text')->group('w-1/2');
        $fields->name('qty')->type('text')->group('w-1/2');
        $fields->name('unit_price')->type('text')->group('w-1/2');
        $fields->name('discount')->type('text')->group('w-1/2');
        $fields->name('tax')->type('text')->group('w-1/2');
        $fields->name('item_total')->type('text')->group('w-1/2');
        $fields->name('ecommerce_type')->type('text')->group('w-1/2');


        return $fields;

    }

    public function filter(){
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('invoice_details_id')->type('text')->group('w-1/6');
        $fields->name('trn_no')->type('text')->group('w-1/6');
        $fields->name('product_id')->type('text')->group('w-1/6');
        $fields->name('qty')->type('text')->group('w-1/6');

        return $fields;

    }
    /**
     * List of fields for managing postings.
     *
     * @param Blueprint $table
     * @return void
     */
    public function migration(Blueprint $table)
    {
        $table->increments('id');
        $table->integer('invoice_details_id');
        $table->integer('trn_no');
        $table->integer('product_id');
        $table->integer('qty');
        $table->decimal('unit_price', 20, 2);
        $table->decimal('discount', 20, 2)->default(0.00);
        $table->decimal('tax', 20, 2)->default(0.00);
        $table->decimal('item_total', 20, 2);
        $table->string('ecommerce_type')->nullable();
    }
}
