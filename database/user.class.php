<?php 
    declare(strict_types=1);

    class User {
        public int $id;
        public string $name;
        public string $username;
        public string $email;
        public string $role;
        
        public function __construct(int $id, string $name, string $username, string $email, string $role)
        {
            $this->id = $id;
            $this->name = $name;
            $this->username = $username;
            $this->email = $email;
            $this->role = $role;
        }

        static function getUserWithPassword(PDO $db, string $email, string $password) : ?User {
            $stmt = $db->prepare('
              SELECT id, name, username, email, role
              FROM User 
              WHERE lower(email) = ? AND password = ?
            ');
      
            $stmt->execute(array(strtolower($email), sha1($password)));
        
            if ($user = $stmt->fetch()) {
              return new User(
                $user['id'],
                $user['name'],
                $user['username'],
                $user['email'],
                $user['role']
              );
            } else return null;
        }

        static function createUserWithPassword(PDO $db, string $name, string $username, string $email, string $password) : ?User {
          $stmt = $db->prepare('INSERT INTO User (name, username, email, password, role) VALUES (?, ?, ?, ?, ?)');
          $role = 'client'; // Set the default role to 'client'
          $stmt->execute([$name, $username, $email, sha1($password), $role]);
  
          if ($stmt->rowCount() > 0) {
              $id = (int)$db->lastInsertId();
              return new User($id, $name, $username, $email, $role);
          } else {
              return null;
          }
        }

        static function getUser(PDO $db, int $id): ?User {
          $stmt = $db->prepare('
            SELECT id, name, username, email, role
            FROM User 
            WHERE id = ?
          ');
        
          $stmt->execute([$id]);
          $user = $stmt->fetch();
          
          return new User(
            $user['id'],
            $user['name'],
            $user['username'],
            $user['email'],
            $user['role']
          );
        }

        static function updateUser(PDO $db, int $id, string $name, string $username, string $email, string $password) {
          $stmt = $db->prepare('UPDATE User SET name = ?, username = ?, email = ?, password = ? WHERE id = ?');
          $stmt->execute([$name, $username, $email, sha1($password), $id]);
        }
    }

?>
