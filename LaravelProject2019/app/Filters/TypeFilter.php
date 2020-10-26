<?php

// TypeFilter.php

namespace App\Filters;

class TypeFilter
{
    public function filter($builder, $value)
    {
        return $builder->where('assignment_id', $value);
        return $builder->where('created_at', $value);

    }
}