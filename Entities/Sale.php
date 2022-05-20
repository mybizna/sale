<?php

namespace Modules\Sale\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;

class Sale extends Model
{

    protected $fillable = [];
    protected $migrationOrder = 5;
    protected $table = "sale";

    /**
     * List of fields for managing postings.
     *
     * @param Blueprint $table
     * @return void
     */
    public function migration(Blueprint $table)
    {
        $table->increments('id');
        $table->string('name');
        $table->timestamp('created_at')->nullable();
        $table->timestamp('updated_at')->nullable();
    }
}
