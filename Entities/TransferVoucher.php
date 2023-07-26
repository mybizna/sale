<?php

namespace Modules\Sale\Entities;

use Modules\Base\Entities\BaseModel;
use Illuminate\Database\Schema\Blueprint;

use Modules\Core\Classes\Views\ListTable;
use Modules\Core\Classes\Views\FormBuilder;

class TransferVoucher extends BaseModel
{

    protected $fillable = ['voucher_no', 'trn_date', 'amount', 'ac_from', 'ac_to', 'particulars'];
    public $migrationDependancy = [];
    protected $table = "sale_transfer_voucher";


    public function listTable(){
        // listing view fields
        $fields = new ListTable();

        $fields->name('voucher_no')->type('text')->ordering(true);
        $fields->name('trn_date')->type('text')->ordering(true);
        $fields->name('amount')->type('text')->ordering(true);
        $fields->name('ac_from')->type('text')->ordering(true);
        $fields->name('ac_to')->type('text')->ordering(true);
        $fields->name('particulars')->type('text')->ordering(true);

        return $fields;

    }
    
    public function formBuilder(){
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('voucher_no')->type('text')->group('w-1/2');
        $fields->name('trn_date')->type('text')->group('w-1/2');
        $fields->name('amount')->type('text')->group('w-1/2');
        $fields->name('ac_from')->type('text')->group('w-1/2');
        $fields->name('ac_to')->type('text')->group('w-1/2');
        $fields->name('particulars')->type('text')->group('w-1/2');

        return $fields;

    }

    public function filter(){
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('voucher_no')->type('text')->group('w-1/6');
        $fields->name('trn_date')->type('text')->group('w-1/6');
        $fields->name('amount')->type('text')->group('w-1/6');
        $fields->name('ac_from')->type('text')->group('w-1/6');

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
        $table->integer('voucher_no')->nullable();
        $table->date('trn_date')->nullable();
        $table->decimal('amount', 20, 2)->nullable();
        $table->integer('ac_from')->nullable();
        $table->integer('ac_to')->nullable();
        $table->string('particulars')->nullable();
    }
}
