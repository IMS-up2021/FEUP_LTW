<?php 
declare(strict_types = 1); 

require_once(__DIR__ . '/../templates/tickets.tpl.php');

function getEditProfileContent(User $user) {
    $content = '
        <form action="../actions/profile_update.php" method="POST" class="login_register">
            <label for="name">Name</label>
            <input id="name" type="text" name="name" value="' . $user->getName() . '"><br></br>

            <label for="username">Username</label>
            <input id="username" type="text" name="username" value="' . $user->getUsername() . '"><br></br>

            <label for="email">Email</label>
            <input id="email" type="text" name="email" value="' . $user->getEmail() . '"><br></br>

            <label for="password">Password</label>
            <input id="password" type="text" name="password">
            
            <div class="button">
                <button type="submit">Save</button>
            </div>
        </form>';

    return $content;
}


function getNewTicketContent() {
    $content .= '<form id="ticketForm" class="login_register">';
    $content .= '<label for="title">Title</label>';
    $content .= '<input id="title" type="text" name="title"><br><br>';
    $content .= '<label for="description">Description</label>';
    $content .= '<input id="description" type="text" name="description"><br><br>';
    $content .= '<label for="department">Departments</label>';
    $content .= '<select id="department" name="department">';
    $content .= '<option value="">None</option>';
    $content .= '</select>';
    $content .= '<div class="button">';
    $content .= '<button id="submitTicket" type="submit">Submit Ticket</button><br><br>';
    $content .= '</div>';
    $content .= '</form>';

    return $content;
}


function getMyTicketsContent() {
    $content = '
    <div id="tickets-container">
    </div>    
    ';
    return $content;
}


function drawProfile(User $user) {
?>
    <div id="menu">
        <h2>Profile</h2>
        <center>
            <button id="editProfile">Edit Profile</button>
            <button id="newTicket">New Ticket</button>
            <button id="myTickets">My Tickets</button>
        </center>
    </div>

    <div id="contentContainer"></div>

    <script src="/../javascript/profile.js"></script>
<?php
}
?>