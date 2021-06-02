<?php

namespace Model;

use Core\Db;

class User
{
    private $id = null;
    private $email;
    private $password;
    private $role;


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param null $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param mixed $role
     */
    public function setRole($role)
    {
        $this->role = $role;
    }

    public function save()
    {
        if ($this->id !== null) {
            $this->update();
        } else {
            $this->create();
        }
    }

    public function create()
    {
        $db = new Db();

        $user = [
            'email' => $this->email,
            'password' => $this->password,
            'role_id' => $this->role
        ];

        $db->insert('user')->values($user)->exec();
    }

    public function update()
    {
        $db = new Db();

        $user = [
            'email' => $this->email,
            'password' => $this->password,
            'role_id' => $this->role
        ];

        $db->update('user')->set($user)->where('id', $this->id)->exec();
    }

    public function getUserObjectById($id): User
    {
        $db = new Db();
        $user = $db->select()->from('user')->where('id', $id)->getOne();

        $this->setId($user['id']);
        $this->setPassword($user['password']);
        $this->setRole($user['role']);
        return $this;
    }

    public function getUserByEmail(string $email): array
    {
        $db = new Db();
        return $db->select('email')->from('user')->where('email', $email)->get();
    }

}