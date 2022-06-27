<?php

class Auth
{
    public function signIn(string $email, string $password): bool {
        $user = (new User())->getUserByEmail($email);

        if(!$user) {
            return false;
        }

        if(!password_verify($password, $user->getPassword())) {
            return false;
        }
        $this->authenticate($user);
        return true;
    }

    public function authenticate(User $user) {
        $_SESSION['user_id'] = $user->getUserId();
    }
}