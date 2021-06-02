<?php

namespace Helper\Validation;

use Core\Db;
use Model\User as UserModel;

class InputValidation
{
    public function isEmailUnique(string $email): bool
    {
        $user = new UserModel();
        return empty($user->getUserByEmail($email));
    }

    public function isEmailFormat(string $email): bool
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    public function isLengthLess(int $number, string $text): bool
    {
        return strlen($text) < $number;
    }

    public function isLengthMore(int $number, string $text): bool
    {
        return strlen($text) > $number;
    }

    protected function isFieldNotEmpty(string $name): bool
    {
        return !empty($name);
    }

    public function isPasswordsMatch(string $pass1, string $pass2): bool
    {
        return $pass1 === $pass2;
    }
}