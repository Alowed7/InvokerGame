<?php

class UserService {
    private $conn;

    public function __construct(mysqli $conn) {
        $this->conn = $conn;
    }

    public function register(User $user): bool {
        $stmt = $this->conn->prepare("INSERT INTO users (nickname, password, email) VALUES (?, ?, ?)");
        if (!$stmt) return false;

        $nickname = $user->getNickname();
        $password = $user->getPassword();
        $email = $user->getEmail();

        $stmt->bind_param("sss", $nickname, $password, $email);
        return $stmt->execute();
    }

    public function authenticate(string $nickname, string $password): ?array {
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE nickname = ? AND password = ?");
        if (!$stmt) {
            error_log("Prepare failed: " . $this->conn->error);
            return null;
        }

        $stmt->bind_param("ss", $nickname, $password); // ← 2 параметра
        $stmt->execute();
        $result = $stmt->get_result();

        error_log("Executed SQL with nickname=$nickname and password=$password; rows: " . $result->num_rows);

        if ($result->num_rows === 1) {
            return $result->fetch_assoc();
        }

        return null;
    }
}

