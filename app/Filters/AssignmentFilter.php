<?php

// ProductFilter.php

namespace App\Filters;

use App\Filters\AbstractFilter;
use Illuminate\Database\Eloquent\Builder;

class AssignmentFilter extends AbstractFilter {


    protected $filters = [
        'assignment_id' => TypeFilter::class
        ];
}