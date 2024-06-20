<?php

include_once 'models/UsersModel.php';
include_once 'services/UsersService.php';

class UsersController
{
    private $usersService;

    public function __construct($conn)
    {
        $usersModel = new UsersModel($conn);
        $this->usersService = new UsersService($usersModel);
    }

    public function readUsers()
    {
        $users = $this->usersService->fetchAllUsers();
        return json_encode($users);
    }

    public function addUser()
    {
        $data = json_decode(file_get_contents("php://input"), true);    
        $result = $this->usersService->addUser($data);
        return json_encode(["message" => $result ? "User added successfully." : "Failed to add user."]);
    }

    public function updateUser()
    {
        $data = json_decode(file_get_contents("php://input"), true);
        if (!isset($data['id_user'])) {
            echo json_encode(["message" => "ID is required."]);
            return;
        }
        $id = $data['id_user'];
        $result = $this->usersService->updateUser($id, $data);
        echo json_encode(["message" => $result ? "User updated successfully." : "Failed to update user."]);
        exit();
    }

    public function deleteUser()
    {
        $data = json_decode(file_get_contents("php://input"), true);
        if (!isset($data['id_user'])) {
            echo json_encode(["message" => "ID is required."]);
            return;
        }
        $id = $data['id_user'];
        $result = $this->usersService->deleteUser($id);
        echo json_encode(["message" => $result ? "User deleted successfully." : "Failed to delete user."]);
        exit();
    }
}
?>
