<?php 
namespace Backend\src\Client\Repositories\Survey;


interface SurveyRepository {
    public function getAll();
    public function getAllWhere(array $condition);
}