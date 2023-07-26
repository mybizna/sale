<?php

namespace Modules\Sale\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Entities\BaseModel;
use Modules\Core\Classes\Views\FormBuilder;
use Modules\Core\Classes\Views\ListTable;

class Detail extends BaseModel
{

    protected $fillable = [
        'trn_no', 'product_id', 'qty', 'price', 'amount', 'tax', 'tax_cat_id',
    ];
    public $migrationDependancy = [];
    protected $table = "sale_detail";

    public function listTable()
    {
        // listing view fields
        $fields = new ListTable();

        $fields->name('trn_no')->type('text')->ordering(true);
        $fields->name('product_id')->type('text')->ordering(true);
        $fields->name('qty')->type('text')->ordering(true);
        $fields->name('price')->type('text')->ordering(true);
        $fields->name('amount')->type('text')->ordering(true);
        $fields->name('tax')->type('text')->ordering(true);
        $fields->name('tax_cat_id')->type('text')->ordering(true);

        return $fields;

    }

    public function formBuilder()
    {
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('trn_no')->type('text')->group('w-1/2');
        $fields->name('product_id')->type('text')->group('w-1/2');
        $fields->name('qty')->type('text')->group('w-1/2');
        $fields->name('price')->type('text')->group('w-1/2');
        $fields->name('amount')->type('text')->group('w-1/2');
        $fields->name('tax')->type('text')->group('w-1/2');
        $fields->name('tax_cat_id')->type('text')->group('w-1/2');

        return $fields;

    }

    public function filter()
    {
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('trn_no')->type('text')->group('w-1/6');
        $fields->name('product_id')->type('text')->group('w-1/6');
        $fields->name('qty')->type('text')->group('w-1/6');
        $fields->name('price')->type('text')->group('w-1/6');
        $fields->name('amount')->type('text')->group('w-1/6');

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
        $table->integer('trn_no')->nullable();
        $table->integer('product_id')->nullable();
        $table->integer('qty')->nullable();
        $table->decimal('price', 20, 2)->default(0.00);
        $table->decimal('amount', 20, 2)->default(0.00);
        $table->decimal('tax', 20, 2)->nullable();
        $table->integer('tax_cat_id')->nullable();
    }
}
