<?php


namespace App\Contracts;

interface TaskRepositoryInterface
{

    public function getTasksForUser($userId);
    public function getTask($id);
    public function insertTask($data);
    public function removeTask($id);

}