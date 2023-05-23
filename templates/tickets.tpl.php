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
    <button class="edit-ticket-btn" data-ticket-id="<?php echo $ticket->id; ?>">Edit Ticket</button>
    <?php endif; ?>

    <form id="editTicketForm" class="ticket-form" style="display: none;">
      <h2>Edit Ticket</h2>
      <input type="hidden" id="editTicketId" name="editTicketId" value="">
      
      <label for="editTicketTitle">Title</label>
      <input type="text" id="editTicketTitle" name="editTicketTitle">

      <label for="editTicketDescription">Description</label>
      <textarea id="editTicketDescription" name="editTicketDescription"></textarea>

      <label for="editTicketDepartment">Department</label>
      <select id="editTicketDepartment" name="editTicketDepartment">
        <option value="">None</option>
      </select>

      <div class="button">
        <button id="saveChangesBtn" type="submit">Save Changes</button>
      </div>
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

