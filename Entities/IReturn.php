<?php

namespace Modules\Sale\Entities;

use Modules\Base\Entities\BaseModel;
use Illuminate\Database\Schema\Blueprint;

use Modules\Core\Classes\Views\ListTable;
use Modules\Core\Classes\Views\FormBuilder;

class IReturn extends BaseModel
{

    protected $fillable = [
        'invoice_id', 'voucher_no', 'vendor_id', 'vendor_name', 'trn_date', 'amount',
        'discount', 'discount_type', 'tax', 'reason', 'comments', 'status'
    ];
    public $migrationDependancy = [];
    protected $table = "sale_return";


    public function listTable(){
        // listing view fields
        $fields = new ListTable();

        $fields->name('invoice_id')->type('text')->ordering(true);
        $fields->name('voucher_no')->type('text')->ordering(true);
        $fields->name('vendor_id')->type('text')->ordering(true);
        $fields->name('vendor_name')->type('text')->ordering(true);
        $fields->name('trn_date')->type('text')->ordering(true);
        $fields->name('amount')->type('text')->ordering(true);
        $fields->name('discount')->type('text')->ordering(true);

        return $fields;

    }
    
    public function formBuilder(){
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('invoice_id')->type('text')->group('w-1/2');
        $fields->name('voucher_no')->type('text')->group('w-1/2');
        $fields->name('vendor_id')->type('text')->group('w-1/2');
        $fields->name('vendor_name')->type('text')->group('w-1/2');
        $fields->name('trn_date')->type('text')->group('w-1/2');
        $fields->name('amount')->type('text')->group('w-1/2');
        $fields->name('discount')->type('text')->group('w-1/2');
        $fields->name('discount_type')->type('text')->group('w-1/2');
        $fields->name('tax')->type('text')->group('w-1/2');
        $fields->name('reason')->type('text')->group('w-1/2');
        $fields->name('comments')->type('text')->group('w-1/2');
        $fields->name('status')->type('text')->group('w-1/2');


        return $fields;

    }

    public function filter(){
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('invoice_id')->type('text')->group('w-1/6');
        $fields->name('voucher_no')->type('text')->group('w-1/6');
        $fields->name('vendor_id')->type('text')->group('w-1/6');
        $fields->name('vendor_name')->type('text')->group('w-1/6');

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
        $table->integer('invoice_id');
        $table->integer('voucher_no');
        $table->integer('vendor_id')->nullable();
        $table->string('vendor_name')->nullable();
        $table->date('trn_date');
        $table->decimal('amount', 20, 2);
        $table->decimal('discount', 20, 2)->default(0.00);
        $table->string('discount_type')->nullable();
        $table->decimal('tax', 20, 2)->default(0.00);
        $table->text('reason')->nullable();
        $table->text('comments')->nullable();
        $table->integer('status')->nullable()->comment("0 means drafted, 1 means confirmed return");
    }
}
