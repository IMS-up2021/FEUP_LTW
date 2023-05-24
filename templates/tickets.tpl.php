<?php 
  declare(strict_types = 1); 

  require_once(__DIR__ . '/../database/user.class.php');
  require_once(__DIR__ . '/../utils/session.php');
?>

<?php function drawSimpleTicket(Ticket $ticket, string $department_name) { ?>
  <div class="ticket">
    <h3><a href="ticket.php?ticketId=<?php echo $ticket->id; ?>" class="ticket-link">Ticket <?php echo $ticket->id; ?></a></h3>
    <p><strong>Title:</strong> <?php echo $ticket->title; ?></p>
    <p><strong>Description:</strong> <?php echo $ticket->description; ?></p>
    <p><strong>Date:</strong> <?php echo $ticket->date->format('Y-m-d'); ?></p>
    <p><strong>Status:</strong> <?php echo $ticket->status; ?></p>
    <p><strong>Department:</strong> <?php echo $department_name ?? 'None'; ?></p>
  </div>
<?php } ?>

<?php function drawTicket(Session $session, Ticket $ticket, string $department_name) { ?>
  <div class="ticket">
    <h3><a href="ticket.php?ticketId=<?php echo $ticket->id; ?>" class="ticket-link">Ticket <?php echo $ticket->id; ?></a></h3>
    <p><strong>Title:</strong> <?php echo $ticket->title; ?></p>
    <p><strong>Description:</strong> <?php echo $ticket->description; ?></p>
    <p><strong>Date:</strong> <?php echo $ticket->date->format('Y-m-d'); ?></p>
    <p><strong>Status:</strong> <?php echo $ticket->status; ?></p>
    <p><strong>Department:</strong> <?php echo $department_name ?? 'None'; ?></p>
    
    <?php if ($session->getId() === $ticket->creator_id): ?>
      <button class="edit-ticket-button" data-ticket-id="<?php echo $ticket->id; ?>">Edit Ticket</button>
    <?php endif; ?>

  </div>

  <div id="editTicketForm<?php echo $ticket->id; ?>" class="edit-ticket-form" style="display: none;">
    <h3>Edit Ticket</h3>
    <form action="../actions/edit_ticket.php" method="POST">
      <input type="hidden" name="editTicketId" value="<?php echo $ticket->id; ?>">
      
      <label for="editTicketTitle">Title:</label>
      <input type="text" id="editTicketTitle" name="editTicketTitle" value="<?php echo $ticket->title; ?>">

      <label for="editTicketDescription">Description:</label>
      <textarea id="editTicketDescription" name="editTicketDescription"><?php echo $ticket->description; ?></textarea>

      <label for="editTicketDepartment">Department:</label>
      <select id="editTicketDepartment" name="editTicketDepartment">
        <option value="">None</option>
      </select>

      <button type="submit">Save Changes</button>
    </form>
  </div>

  <script src="../javascript/script.js"></script>

<?php } ?>

<?php function drawEditTicket(Ticket $ticket) { ?>
  <form action="../actions/action_edit_ticket.php" method="post">
    <input type="hidden" name="id" value="<?=$ticket->id?>">
    <label>Title:</label>
    <input type="text" name="title" value="<?=$ticket->title?>">
    <button type="submit">Save</button>
  </form>
<?php } ?>

