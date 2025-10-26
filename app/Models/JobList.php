<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobList extends Model
{
      protected $fillable = [
          'title', 'slug', 'description', 'category', 'location', 'status', 'created_by', 'updated_by'
      ];
}
