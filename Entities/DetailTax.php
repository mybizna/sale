<?php

namespace Modules\Sale\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Entities\BaseModel;
use Modules\Core\Classes\Views\FormBuilder;
use Modules\Core\Classes\Views\ListTable;

class DetailTax extends BaseModel
{

    protected $fillable = ['invoice_details_id', 'agency_id', 'tax_rate'];
    public $migrationDependancy = [];
    protected $table = "sale_detail_tax";

    public function listTable()
    {
        // listing view fields
        $fields = new ListTable();

        $fields->name('invoice_details_id')->type('text')->ordering(true);
        $fields->name('agency_id')->type('text')->ordering(true);
        $fields->name('tax_rate')->type('text')->ordering(true);

        return $fields;

    }

    public function formBuilder()
    {
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('invoice_details_id')->type('text')->group('w-1/2');
        $fields->name('agency_id')->type('text')->group('w-1/2');
        $fields->name('tax_rate')->type('text')->group('w-1/2');

        return $fields;

    }

    public function filter()
    {
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('invoice_details_id')->type('text')->group('w-1/6');
        $fields->name('agency_id')->type('text')->group('w-1/6');
        $fields->name('tax_rate')->type('text')->group('w-1/6');

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
        $table->integer('agency_id')->nullable();
        $table->decimal('tax_rate', 20, 2);
    }
}
