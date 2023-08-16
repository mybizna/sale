<?php

namespace Modules\Sale\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Entities\BaseModel;

class ReturnDetail extends BaseModel
{
    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = [
        'invoice_details_id', 'trn_no', 'product_id', 'qty', 'unit_price', 'discount',
        'tax', 'item_total', 'ecommerce_type',
    ];

    /**
     * The fields that are to be render when performing relationship queries.
     *
     * @var array<string>
     */
    public $rec_names = ['invoice_details_id', 'trn_no'];

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
    protected $table = "sale_return_detail";

    /**
     * List of fields to be migrated to the datebase when creating or updating model during migration.
     *
     * @param Blueprint $table
     * @return void
     */
    public function fields(Blueprint $table = null): void
    {
        $this->fields = $table ?? new Blueprint($this->table);

        $this->fields->increments('id')->html('text');
        $this->fields->integer('invoice_details_id')->html('text');
        $this->fields->integer('trn_no')->html('text');
        $this->fields->integer('product_id')->html('text');
        $this->fields->integer('qty')->html('text');
        $this->fields->decimal('unit_price', 20, 2)->html('number');
        $this->fields->decimal('discount', 20, 2)->default(0.00)->html('number');
        $this->fields->decimal('tax', 20, 2)->default(0.00)->html('number');
        $this->fields->decimal('item_total', 20, 2)->html('number');
        $this->fields->string('ecommerce_type')->nullable()->html('text');
    }

    /**
     * List of structure for this model.
     */
    public function structure($structure): array
    {

        $structure = [
            'table' => ['invoice_details_id', 'trn_no', 'product_id', 'qty', 'unit_price', 'discount', 'tax', 'item_total', 'ecommerce_type'],
            'form' => [
                ['label' => 'Trn No', 'class' => 'w-full', 'fields' => ['trn_no']],
                ['label' => 'Return', 'class' => 'w-1/2', 'fields' => ['invoice_details_id', 'product_id', 'qty', 'unit_price']],
                ['label' => 'Setting', 'class' => 'w-1/2', 'fields' => ['discount', 'tax', 'item_total', 'ecommerce_type']],
            ],
            'filter' => ['invoice_details_id', 'trn_no', 'product_id'],
        ];

        return $structure;
    }
}
