<?php


namespace Helper\Validation;


use Session\Notification;

class UserValidation extends InputValidation
{

    /**
     * @return string
     */
    public function getErrorTitle(): string
    {
        return $this->errorTitle;
    }

    /**
     * @param string $errorTitle
     */
    public function setErrorTitle(string $errorTitle): void
    {
        $this->errorTitle = $errorTitle;
    }

    /**
     * @return array
     */
    public function getErrorImtems(): array
    {
        return $this->errorImtems;
    }

    /**
     * @param array $errorImtems
     */
    public function setErrorImtems(array $errorImtems): void
    {
        $this->errorImtems = $errorImtems;
    }

    public function isRegisterValid(string $email): bool
    {
        if (
            $this->isFieldNotEmpty($email) &&
            $this->isEmailFormat($email) &&
            $this->isLengthLess(50, $email) &&
            $this->isEmailUnique($email)
        ) {
            return true;
        } else {
            $errorItems = [];
            if (!$this->isFieldNotEmpty($email)) {
                $errorItems[] = 'Įveskite el. paštą';
            }
            if (!$this->isEmailFormat($email)) {
                $errorItems[] = 'Netinkamas el pašto formatas';
            }
            if (!$this->isLengthLess(50, $email)) {
                $errorItems[] = 'El paštas per ilgas (max:50)';
            }
            if (!$this->isEmailUnique($email)) {
                $errorItems[] = 'Toks el. paštas jau registruotas';
            }

            $notification = new Notification();
            $notification->setErrorTitleNotification('Registracija nesėkminga');
            $notification->setErrorItemsNotifications($errorItems);
            return false;
        }
    }
}