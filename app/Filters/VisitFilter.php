<?php

namespace App\Filters;

use Illuminate\Http\Request;

class VisitFilter extends BaseFilter
{

    protected $safeParams = array(
        'userId' => array(
            'eq',
        ),

        'interestsPlaceId' => array(
            'eq',
        ),
    );

    protected $columnMap = array(
        'userId' => 'user_id',
        'interestsPlaceId' => 'interests_place_id',
    );
}
