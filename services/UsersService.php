<?php
include_once 'models/UsersModel.php';

class UsersService
{
    private $usersModel;

    public function __construct(UsersModel $usersModel)
    {
        $this->usersModel = $usersModel;
    }

    public function fetchAllUsers()
    {
        $users = $this->usersModel->readAllUsers();
        $users_array = array();
        $users_array["records"] = array();
        while ($rows = $users->fetch(PDO::FETCH_ASSOC))
        {
            extract($rows);
            $user_item = array(
                "id_user" => $id_user,
                "user_name" => $user_name,
                "email" => $email,
                "role" => $role
            );
            array_push($users_array["records"], $user_item);
        }
        
        return $users_array;
    }

    public function addUser($data)
    {
        return $this->usersModel->insertUser($data);
    }

    public function createUser($data)
    {
        return $this->usersModel->createUser($data);
    }

    public function updateUser($id, $data)
    {
        return $this->usersModel->updateUser($id, $data);
    }

    public function deleteUser($id)
    {
        return $this->usersModel->deleteUser($id);
    }
}
?>
