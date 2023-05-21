<?php
declare(strict_types=1);

class Question
{
    public int $id;
    public string $title;
    public int $likes;
    public int $dislikes;
    public int $userId;

    public function __construct(int $id, string $title, int $likes, int $dislikes, int $userId)
    {
        $this->id = $id;
        $this->title = $title;
        $this->likes = $likes;
        $this->dislikes = $dislikes;
        $this->userId = $userId;
    }

    public static function searchQuestions(PDO $db, string $search, int $count): array
    {
        $stmt = $db->prepare('SELECT QuestionId, Title FROM Question WHERE Title LIKE ? LIMIT ?');
        $stmt->execute([$search . '%', $count]);

        $questions = [];
        while ($question = $stmt->fetch()) {
            $questions[] = new Question(
                $question['QuestionId'],
                $question['Title'],
                $question['Likes'],
                $question['Dislikes'],
                $question['UserId']
            );
        }

        return $questions;
    }

    static function getUserQuestions(PDO $db, int $id): array
    {
        $stmt = $db->prepare('SELECT QuestionId, Title, Likes, Dislikes, UserId FROM Question WHERE UserId = ?');
        $stmt->execute([$id]);

        $questions = [];
        while ($question = $stmt->fetch()) {
            $questions[] = new Question(
                $question['QuestionId'],
                $question['Title'],
                $question['Likes'],
                $question['Dislikes'],
                $question['UserId']
            );
        }

        return $questions;
    }

    static function getQuestion(PDO $db, int $id): Question
    {
        $stmt = $db->prepare('SELECT QuestionId, Title, Likes, Dislikes, UserId FROM Question WHERE QuestionId = ?');
        $stmt->execute([$id]);

        $question = $stmt->fetch();

        return new Question(
            $question['QuestionId'],
            $question['Title'],
            $question['Likes'],
            $question['Dislikes'],
            $question['UserId']
        );
    }

    function save(PDO $db)
    {
        $stmt = $db->prepare('UPDATE Question SET Title = ? WHERE QuestionId = ?');
        $stmt->execute([$this->title, $this->id]);
    }
}
?>