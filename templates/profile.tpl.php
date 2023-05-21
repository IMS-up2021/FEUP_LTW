<?php 
    declare(strict_types = 1); 
?>   


<?php function drawProfile(User $user) { ?>
    <div id="menu">
        <h2> Profile </h2>
        <center>
            <button id="editProfile">Edit Profile</button>
            <button id="newTicket">New Ticket</button>
            <button id="myTickets">My Tickets</button>
        </center>
    </div>
    
    <div id="content"></div>

    <script>

    document.getElementById('editProfile').addEventListener('click', function() {
        // Create the HTML form
        var formHTML = `
        <form action="../actions/profile_update.php" method="POST" class="login_register">
            <label for="name">Name</label>
            <input id="name" type="text" name="name" value="<?=$user->name?>"><br></br>

            <label for="username">Username</label>
            <input id="username" type="text" name="username" value="<?=$user->username?>"><br></br>

            <label for="email">Email</label>
            <input id="email" type="text" name="email" value="<?=$user->email?>"><br></br>

            <label for="password">Password</label>
            <input id="password" type="text" name="password">
            
            <div class="button">
                <button type="submit">Save</button>
            </div>

        </form>
        `;

        document.getElementById('content').innerHTML = formHTML;
    });

    document.getElementById('newTicket').addEventListener('click', function() {
        // Create an XMLHttpRequest object
        var xhr = new XMLHttpRequest();
    
        // Set up the AJAX request
        xhr.open('GET', '../api/get_departments.php', true);
    
        // Set the response type
        xhr.responseType = 'json';
    
        // Define the onload callback function
        xhr.onload = function() {
            if (xhr.status === 200) {
                // Retrieve the departments data from the response
                var departments = xhr.response;
                
                // Generate the options HTML dynamically
                var optionsHTML = '<option value="">None</option>';
                departments.forEach(function(department) {
                    optionsHTML += '<option value="' + department.id + '">' + department.name + '</option>';
                });
                
                // Create the HTML form with the dynamic options
                var formHTML = `
                    <form action="../actions/ticket_submission.php" method="POST" class="login_register">
                        <label for="title">Title</label>
                        <input id="title" type="text" name="title"><br></br>

                        <label for="description">Description</label>
                        <input id="description" type="text" name="description"><br></br>
                        
                        <label for="department">Departments</label>
                            <select id="department" name="department">
                                ${optionsHTML}
                            </select>

                        <div class="button">
                            <button type="submit">Submit Ticket</button><br></br>
                        </div>
                      
                    </form>
                `;
                
                // Replace the content with the generated form
                document.getElementById('content').innerHTML = formHTML;
            }
        };
        // Send the AJAX request
        xhr.send();
    });


    
        
        document.getElementById('myTickets').addEventListener('click', function() {
            // Make an AJAX request to retrieve the tickets
            var xhr = new XMLHttpRequest();
            xhr.open('GET', '../api/get_tickets.php', true);
            xhr.onload = function() {
                if (xhr.status === 200) {
                    // Parse the response JSON
                    var tickets = JSON.parse(xhr.responseText);
                    // Generate the HTML for listing the tickets
                    var div_ini ='<div id="prof">';
                    var div_fim ='</div>';
                    var html = div_ini+'<h2>My Tickets</h2>';
                    if (tickets.length === 0) {
                        html += '<p>No tickets found.</p>';
                    } else {
                        html += '<ul>';
                        for (var i = 0; i < tickets.length; i++) {
                            var ticket = tickets[i];
                            html += '<h3>Ticket ' + ticket.id + '</h3>';
                            html += '<li>';
                            html += '<strong>Title:</strong> ' + ticket.title + '<br>';
                            html += '<strong>Description:</strong> ' + ticket.description + '<br>';
                            html += '<strong>Date:</strong> ' + ticket.date + '<br>';
                            html += '<strong>Status:</strong> ' + ticket.status + '<br>';
                            
                            if (ticket.hasOwnProperty('department_name') && ticket.department_name !== null) {
                                html += '<strong>Department:</strong> ' + ticket.department_name + '<br>';
                            } else {
                                html += '<strong>Department:</strong> None<br>';
                            }

                            html += '</li>';
                        }
                        html += '</ul>'+ div_fim;
                    }
                    // Update the content with the ticket list
                    document.getElementById('content').innerHTML = html;
                    
                }
            };
            xhr.send();
        });
        
        </script>


<?php } ?>
   

  


