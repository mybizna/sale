<?php

namespace Modules\Sale\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Classes\Views\FormBuilder;
use Modules\Base\Classes\Views\ListTable;
use Modules\Base\Entities\BaseModel;

class AccountDetail extends BaseModel
{
    /**
     * The fields that can be filled
     * @var array<string>
     */
    protected $fillable = [
        'sale_no', 'trn_no', 'trn_date', 'particulars', 'debit', 'credit',
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
    protected $table = "sale_account_detail";

    public function listTable(): ListTable
    {
        // listing view fields
        $fields = new ListTable();

        $fields->name('sale_no')->type('text')->ordering(true);
        $fields->name('trn_no')->type('text')->ordering(true);
        $fields->name('trn_date')->type('date')->ordering(true);
        $fields->name('debit')->type('text')->ordering(true);
        $fields->name('credit')->type('text')->ordering(true);

        return $fields;

    }

    public function formBuilder(): FormBuilder
    {
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('sale_no')->type('text')->group('w-1/2');
        $fields->name('trn_no')->type('text')->group('w-1/2');
        $fields->name('trn_date')->type('date')->group('w-1/2');
        $fields->name('debit')->type('text')->group('w-1/2');
        $fields->name('credit')->type('text')->group('w-1/2');
        $fields->name('particulars')->type('text')->group('w-1/2');

        return $fields;

    }

    public function filter(): FormBuilder
    {
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('sale_no')->type('text')->group('w-1/6');
        $fields->name('trn_no')->type('text')->group('w-1/6');
        $fields->name('trn_date')->type('date')->group('w-1/6');
        $fields->name('debit')->type('text')->group('w-1/6');
        $fields->name('credit')->type('text')->group('w-1/6');

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
        $table->integer('sale_no')->nullable();
        $table->integer('trn_no')->nullable();
        $table->date('trn_date')->nullable();
        $table->string('particulars')->nullable();
        $table->decimal('debit', 20, 2)->default(0.00);
        $table->decimal('credit', 20, 2)->default(0.00);
    }
}
