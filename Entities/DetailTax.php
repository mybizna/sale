<?php

namespace Modules\Sale\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Entities\BaseModel;

class DetailTax extends BaseModel
{
    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = ['invoice_details_id', 'agency_id', 'tax_rate'];

    /**
     * The fields that are to be render when performing relationship queries.
     *
     * @var array<string>
     */
    public $rec_names = ['invoice_details_id', 'agency_id'];

    /**
     * List of tables names that are need in this model during migration.
     *
     * @var array<string>
     */
    public array $migrationDependancy = [];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "sale_detail_tax";

    /**
     * List of fields to be migrated to the datebase when creating or updating model during migration.
     *
     * @param Blueprint $table
     * @return void
     */
    public function fields(Blueprint $table): void
    {
        $this->fields->increments('id')->html('text');
        $this->fields->integer('invoice_details_id')->html('text');
        $this->fields->integer('agency_id')->nullable()->html('text');
        $this->fields->decimal('tax_rate', 20, 2)->html('text');
    }
}
