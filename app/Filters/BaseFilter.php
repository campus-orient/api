<?php

namespace App\Filters;

use Illuminate\Http\Request;

class BaseFilter
{
    protected $safeParams = array();

    protected $columnMap = array();

    protected $operatorMap = array(
        //equal
        'eq' => '=',
        //not equal
        'ne' => '!=',
        //greater than
        'gt' => '>',
        //greater than or equal
        'gte' => '>=',
        //less than
        'lt' => '<',
        //less than or equal
        'lte' => '<=',
        //like
        'like' => 'like',
        //not like
        'nlike' => 'not like',
        //in
        'in' => 'in',
        //not in
        'nin' => 'not in',
        //partial match
    );

    public function transform(Request $request)
    {
        $eloQuery = array();
        $query = [];

        foreach ($this->safeParams as $param => $operators) {
            $rawQuery = $request->query();

            foreach ($rawQuery as $key => $processedQuery) {

                $attribute = explode(':', $key)[0] ?? null;
                $eloOperator = explode(':', $key)[1] ?? null;

                if ($attribute && $eloOperator) {
                    $query[$attribute] = [
                        $eloOperator => $processedQuery
                    ];
                }
            }

            // if (!isset($query)) {
            //     continue;
            // }

            $column = $this->columnMap[$param] ?? $param;

            foreach ($operators as $operator) {

                if (isset($query[$param][$operator])) {
                    $eloQuery[] = array(
                        $column,
                        $this->operatorMap[$operator],
                        $this->operatorMap[$operator] == 'like' ?
                            '%' . $query[$param][$operator] . '%'
                            : $query[$param][$operator]
                    );
                }
            }
        }

        return $eloQuery;
    }
}
