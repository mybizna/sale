<?php

namespace Modules\Sale\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Entities\BaseModel;
use Modules\Base\Classes\Views\FormBuilder;
use Modules\Base\Classes\Views\ListTable;

class DetailTax extends BaseModel
{
    /**
     * The fields that can be filled
     * @var array<string>
     */
    protected $fillable = ['invoice_details_id', 'agency_id', 'tax_rate'];

    /**
     * List of tables names that are need in this model during migration.
     * @var array<string>
     */
    public array $migrationDependancy = [];

    /**
     * The table associated with the model.
     * @var string
     */
    protected $table = "sale_detail_tax";

    public function  listTable(): ListTable
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

    public function filter(): FormBuilder
    {
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('invoice_details_id')->type('text')->group('w-1/6');
        $fields->name('agency_id')->type('text')->group('w-1/6');
        $fields->name('tax_rate')->type('text')->group('w-1/6');

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
        $table->integer('invoice_details_id');
        $table->integer('agency_id')->nullable();
        $table->decimal('tax_rate', 20, 2);
    }
}
