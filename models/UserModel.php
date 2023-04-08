<?php

class UserModel
{
    public function connection()
    {
        $connection = new mysqli("localhost", "root", "", "sapi_muo", 3306);
        return $connection;
    }
    public function getAll()
    {
        $query = "SELECT * FROM users";
        $data_users = mysqli_query($this->connection(), $query);
        // fetch_assoc() = mengambil data dari database
        $result = [];
        while ($row = mysqli_fetch_assoc($data_users)) {
            $result[] = $row;
        }
        return $result;
    }
    public function findUsers($id)
    {
        $query = "SELECT * FROM users WHERE id_users = $id";
        $data_users = mysqli_query($this->connection(), $query);
        // fetch_assoc() = mengambil data dari database
        $result = mysqli_fetch_assoc($data_users);
        return $result;
    }
    public function authUsers($email, $password)
    {
        $connection = $this->connection();
        $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
        $result = $connection->query($sql);
        $row = $result->fetch_assoc();
        return $row;
    }
    public function addUser($email, $password)
    {
        $connection = $this->connection();
        $sql = "INSERT INTO users (email, password) VALUES ('$email', '$password')";
        $result = $connection->query($sql);
        return $result;
    }
    public function update($data)
    {
        $query = "UPDATE users SET nama = '$data[nama_user]', kota = '$data[kota]', no_telp = '$data[no_telp]', email = '$data[email]' WHERE id_users = $data[id_users]";
        $data_users = mysqli_query($this->connection(), $query);
        return $data_users;
    }
    public function getLastUsers()
    {
        $query = "SELECT * FROM users ORDER BY id_users DESC LIMIT 1";
        $data_users = mysqli_query($this->connection(), $query);
        // fetch_assoc() = mengambil data dari database
        
        $result = mysqli_fetch_assoc($data_users);
        return $result;
    }
    public function newUsers($data)
    {
        $query = "INSERT INTO users (nama_users, kota, no_telp, email, password) VALUES ('$data[nama_users]','$data[kota]','$data[no_telp]','$data[email]','$data[password]')";
        $data_users = mysqli_query($this->connection(), $query);
        return $data_users;
    }
    public function findAccount($id)
    {
        $query = "SELECT * FROM users WHERE id_users = $id";
        $data = mysqli_query($this->connection(), $query);
        // fetch_assoc() = mengambil data dari database
        $result = mysqli_fetch_assoc($data);
        return $result;
    }
}
