<?php
class User {
    private string $nickname;
    private string $password;
    private string $email;

    public function __construct(string $nickname, string $password, string $email) {
        $this->nickname = $nickname;
        $this->password = $password;
        $this->email = $email;
    }

    public function getNickname(): string {
        return $this->nickname;
    }

    public function getPassword(): string {
        return $this->password;
    }

    public function getEmail(): string {
        return $this->email;
    }
}

