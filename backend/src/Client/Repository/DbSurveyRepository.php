<?php 

namespace Backend\src\Client\Repositories\Survey;

use Backend\Data;

class DbSurveyRepository implements SurveyRepository
{
    public function getAll(array $relations = [])
    {
        return $this->Data->get();
    }

    public function getAllWhere(array $condition)
    {
        return $this->Data->where($condition)->first();
    }

}
