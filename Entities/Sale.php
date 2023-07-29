<?php

namespace Modules\Sale\Entities;

use Modules\Base\Entities\BaseModel;
use Illuminate\Database\Schema\Blueprint;

use Modules\Base\Classes\Views\ListTable;
use Modules\Base\Classes\Views\FormBuilder;

class Sale extends BaseModel
{
    /**
     * The fields that can be filled
     * @var array<string>
     */
    protected $fillable = [
        'voucher_no', 'vendor_id', 'vendor_name', 'billing_address', 'trn_date',
        'due_date', 'amount', 'tax', 'tax_zone_id', 'ref', 'status', 'purchase_order',
        'attachments', 'particulars'
    ];

    /**
     * List of tables names that are need in this model during migration.
     * @var array<string>
     */
    public array $migrationDependancy = [];

    /**
     * The table associated with the model.
     * @var string
     */
    protected $table = "sale";


    public function  listTable(): ListTable
    {
        // listing view fields
        $fields = new ListTable();

        $fields->name('voucher_no')->type('text')->ordering(true);
        $fields->name('vendor_id')->type('text')->ordering(true);
        $fields->name('vendor_name')->type('text')->ordering(true);
        $fields->name('billing_address')->type('text')->ordering(true);
        $fields->name('trn_date')->type('text')->ordering(true);
        $fields->name('due_date')->type('text')->ordering(true);
        $fields->name('amount')->type('text')->ordering(true);
        $fields->name('tax')->type('text')->ordering(true);



        return $fields;

    }
    
    public function formBuilder(): FormBuilder
{
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('voucher_no')->type('text')->group('w-1/2');
        $fields->name('vendor_id')->type('text')->group('w-1/2');
        $fields->name('vendor_name')->type('text')->group('w-1/2');
        $fields->name('billing_address')->type('text')->group('w-1/2');
        $fields->name('trn_date')->type('text')->group('w-1/2');
        $fields->name('due_date')->type('text')->group('w-1/2');
        $fields->name('amount')->type('text')->group('w-1/2');
        $fields->name('tax')->type('text')->group('w-1/2');
        $fields->name('tax_zone_id')->type('text')->group('w-1/2');
        $fields->name('ref')->type('text')->group('w-1/2');
        $fields->name('status')->type('text')->group('w-1/2');
        $fields->name('purchase_order')->type('text')->group('w-1/2');
        $fields->name('attachments')->type('text')->group('w-1/2');
        $fields->name('particulars')->type('text')->group('w-1/2');


        return $fields;

    }

    public function filter(): FormBuilder
    {
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('voucher_no')->type('text')->group('w-1/6');
        $fields->name('vendor_id')->type('text')->group('w-1/6');
        $fields->name('vendor_name')->type('text')->group('w-1/6');
        $fields->name('billing_address')->type('text')->group('w-1/6');
        $fields->name('trn_date')->type('text')->group('w-1/6');

        return $fields;

    }
    /**
     * List of fields to be migrated to the datebase when creating or updating model during migration.
     *
     * @param Blueprint $table
     * @return void
     */
    public function migration(Blueprint $table)
    {

        $table->increments('id');
        $table->integer('voucher_no')->nullable();
        $table->integer('vendor_id')->nullable();
        $table->string('vendor_name')->nullable();
        $table->string('billing_address')->nullable();
        $table->date('trn_date')->nullable();
        $table->date('due_date')->nullable();
        $table->decimal('amount', 20, 2)->default(0.00);
        $table->decimal('tax', 20, 2)->nullable();
        $table->integer('tax_zone_id')->nullable();
        $table->string('ref')->nullable();
        $table->integer('status')->nullable();
        $table->tinyInteger('purchase_order')->nullable();
        $table->string('attachments')->nullable();
        $table->string('particulars')->nullable();
    }
}
