<?php 
  declare(strict_types = 1); 

  require_once(__DIR__ . '/../database/question.class.php');
  require_once(__DIR__ . '/../database/user.class.php');
  require_once(__DIR__ . '/../utils/session.php');
?>

<?php function drawQuestion(Question $question, User $user, array $answers, Session $session) { ?>
  <h2><?=$question->title?>
    <?php if($session->isLoggedIn()) {?>
      <a href="../pages/edit_question.php?id=<?=$question->id?>"><i class="fa-solid fa-pen action"></i></a>
    <?php } ?>
  </h2>
  <h3><a href="../pages/user.php?id=<?=$user->id?>"><?=$user->name?></a></h3>      
  <table id="answers">
    <tr><th scope="col">#</th><th scope="col">Answer</th><th scope="col">Timestamp</th></tr>
    <?php foreach ($answers as $id => $answer) { ?>
      <tr><td><?=$id + 1?></td><td><?=$answer->text?></td><td><?=$answer->timestamp()?></td></tr>
    <?php } ?>
  </table>
<?php } ?>

<?php function drawEditQuestion(Question $question) { ?>
  <form action="../actions/action_edit_question.php" method="post">
    <input type="hidden" name="id" value="<?=$question->id?>">
    <label>Title:</label>
    <input type="text" name="title" value="<?=$question->title?>">
    <button type="submit">Save</button>
  </form>
<?php } ?>
