<?php

namespace Modules\Sale\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Entities\BaseModel;

class Detail extends BaseModel
{
    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = [
        'trn_no', 'product_id', 'qty', 'price', 'amount', 'tax', 'tax_cat_id',
    ];

    /**
     * The fields that are to be render when performing relationship queries.
     *
     * @var array<string>
     */
    public $rec_names = ['trn_no', 'product_id'];

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
    protected $table = "sale_detail";

    /**
     * List of fields to be migrated to the datebase when creating or updating model during migration.
     *
     * @param Blueprint $table
     * @return void
     */
    public function fields(Blueprint $table): void
    {
        $this->fields->increments('id')->html('text');
        $this->fields->integer('trn_no')->nullable()->html('text');
        $this->fields->integer('product_id')->nullable()->html('text');
        $this->fields->integer('qty')->nullable()->html('text');
        $this->fields->decimal('price', 20, 2)->default(0.00)->html('amount');
        $this->fields->decimal('amount', 20, 2)->default(0.00)->html('amount');
        $this->fields->decimal('tax', 20, 2)->nullable()->html('amount');
        $this->fields->integer('tax_cat_id')->nullable()->html('text');
    }
}
