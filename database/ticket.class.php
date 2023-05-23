<?php
    declare(strict_types=1);

    class Ticket {
        public int $id;
        public string $title;
        public string $description;
        public DateTime $date;
        public string $status;
        public int $creator_id;
        public ?int $assignee_id;
        public ?int $department_id;

        public function __construct(int $id, string $title, string $description, DateTime $date, string $status, int $creator_id, ?int $assignee_id, ?int $department_id) {
            $this->id = $id;
            $this->title = $title;
            $this->description = $description;
            $this->date = $date;
            $this->status = $status;
            $this->creator_id = $creator_id;
            $this->assignee_id = $assignee_id;
            $this->department_id = $department_id;
        }

        public static function createTicket($db,$creator_id, $title, $description, $department) {
            // Get the current date
            $date = new DateTime();
    
            // Default status is 'open'
            $status = 'open';
    
            // Default assignee_id is NULL
            $assignee_id = null;
    
            // Prepare and execute the SQL query
            $query = "INSERT INTO Ticket (title, description, date, status, creator_id, assignee_id, department_id)
                      VALUES (:title, :description, :date, :status, :creator_id, :assignee_id, :department_id)";
            $statement = $db->prepare($query);
            $statement->bindParam(':title', $title);
            $statement->bindParam(':description', $description);
            $statement->bindParam(':date', $date->format('Y-m-d'));
            $statement->bindParam(':status', $status);
            $statement->bindParam(':creator_id', $creator_id);
            $statement->bindParam(':assignee_id', $assignee_id);
            $statement->bindParam(':department_id', $department);
    
            if ($department === 'None') {
                $department = null; // Set the department to NULL
                $statement->bindValue(':department_id', $department, PDO::PARAM_NULL);
            } else {
                $statement->bindParam(':department_id', $department);
            }

            // Execute the query
            if ($statement->execute()) {
                // Return the created Ticket object
                $ticketId = (int)$db->lastInsertId();
                return new Ticket($ticketId, $title, $description, $date, $status, (int)$creator_id, $assignee_id, (int)$department);
            } else {
                // Return null if the ticket creation failed
                echo('no');
                return null;
            }
        }

    }


?>
