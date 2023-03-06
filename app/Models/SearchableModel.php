<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SearchableModel extends Model
{
    protected const SEARCH_DATE_FIELD = 'created_at';
    protected const DATE_FROM = 'date_from';
    protected const DATE_TO = 'date_to';

    protected array $searchableFields = [];

    protected array $filterFields = [];

    protected array $sortFields = [];

    protected array $acceptedTypes = ['integer', 'boolean', 'double', 'string', 'NULL'];

    public function scopeSearch($query, ?array $params)
    {
        if (is_null($params)) {
            return $this;
        }

        foreach ($this->sortFields as $sortField) {
            if (isset($params[$sortField . "_sort"]) && in_array($params[$sortField . "_sort"], ['asc', 'desc'])) {
                $filterValue = $params[$sortField . "_sort"];
                $query = $query->orderBy($sortField, $filterValue);
            }
        }

        foreach ($this->filterFields as $filterField) {
            if (isset($params[$filterField . "_from"])) {
                $fromValue = $params[$filterField . "_from"];
                $query = $query->where($filterField, '>=', $fromValue);
            }

            if (isset($params[$filterField . "_to"])) {
                $toValue = $params[$filterField . "_to"];
                $query = $query->where($filterField, '<=', $toValue);
            }
        }


        foreach ($this->searchableFields as $searchableField) {


            if (isset($params[$searchableField])) {
                $type = gettype($params[$searchableField]);

                if (!$this->isAcceptedType($type)) {
                    continue;
                }

                if ($type === "string" && !is_numeric($params[$searchableField])) {
                    $query = $query->where($searchableField, 'LIKE', "%$params[$searchableField]%");
                } elseif ($type === "NULL") {
                    $query = $query->whereNull($searchableField);
                } else {
                    $query = $query->where($searchableField, $params[$searchableField]);
                }
            }

        }

        if (isset($params[self::DATE_FROM])) {
            $query = $query->where(self::SEARCH_DATE_FIELD, '>=', $params[self::DATE_FROM]);
        }

        if (isset($params[self::DATE_TO])) {
            $query = $query->where(self::SEARCH_DATE_FIELD, '<=', $params[self::DATE_TO]);
        }

        return $query;
    }

    protected function isAcceptedType(string $type): bool
    {
        return in_array($type, $this->acceptedTypes);
    }
}
