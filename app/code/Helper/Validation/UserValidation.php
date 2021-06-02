<?php


namespace Helper\Validation;


use Model\User;
use Session\Notification;

class UserValidation extends InputValidation
{
    public function isRegisterValid(string $email, string $pass1, string $pass2): bool
    {
        if (
//            email validation
            $this->isFieldNotEmpty($email) &&
            $this->isEmailFormat($email) &&
            $this->isLengthLess(50, $email) &&
            $this->isEmailUnique($email) &&

//            password validation
            $this->isPasswordsMatch($pass1, $pass2) &&
            !$this->isLengthLess(5, $pass1)
        ) {
            $notification = new Notification();
            $notification->setSuccessTitleNotification('Registracija sėkminga');
            $notification->setSuccessItemsNotifications([]);

            return true;
        } else {
            $errorItems = [];

//            email errors messages
            if (!$this->isFieldNotEmpty($email)) {
                $errorItems[] = 'Įveskite el. paštą';
            } else {
                if (!$this->isEmailFormat($email)) {
                    $errorItems[] = 'Netinkamas el pašto formatas';
                }
                if (!$this->isLengthLess(50, $email)) {
                    $errorItems[] = 'El paštas per ilgas (max:50)';
                }
                if (!$this->isEmailUnique($email)) {
                    $errorItems[] = 'Toks el. paštas jau registruotas';
                }
            }

//            password errors messages
            if (!$this->isFieldNotEmpty($pass1) && !$this->isFieldNotEmpty($pass1)) {
                $errorItems[] = 'Įveskite slaptažodį';
            } else {
                if (!$this->isPasswordsMatch($pass1, $pass2)) {
                    $errorItems[] = 'Slaptažodžiai nesutampa';
                } else {
                    if ($this->isLengthLess(5, $pass1)) {
                        $errorItems[] = 'Slaptažodis per trumpas (min:6)';
                    }
                }
            }

            $notification = new Notification();
            $notification->setErrorTitleNotification('Registracija nesėkminga');
            $notification->setErrorItemsNotifications($errorItems);

            return false;
        }
    }

    public function isLoginValid(string $email, string $password): bool
    {
        $userModel = new User();

        if ($userModel->getUserByEmailAndPassword($email, $password) === NULL) {
            $notification = new Notification();
            $notification->setErrorTitleNotification('Prisijungimas nesėkmingas');
            $notification->setErrorItemsNotifications(['Patikrinkite el paštą ir/arba slaptažodį']);

            header("Location: " . BASE_URL . '/user/login_and_register'); /* Redirect browser */
            return false;
        } else {
            return true;
        }
    }
}