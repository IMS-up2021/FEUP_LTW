const editProfileButton = document.getElementById('editProfile');
const newTicketButton = document.getElementById('newTicket');
const myTicketsButton = document.getElementById('myTickets');
const contentContainer = document.getElementById('contentContainer');

editProfileButton.addEventListener('click', loadContent.bind(null, 'editProfile'));
newTicketButton.addEventListener('click', loadContent.bind(null, 'newTicket'));
myTicketsButton.addEventListener('click', loadContent.bind(null, 'myTickets'));

function loadContent(action) {
  const xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState === 4 && this.status === 200) {
      contentContainer.innerHTML = this.responseText;
    }
  };

  let phpFunction;
  switch (action) {
    case 'editProfile':
      phpFunction = 'getEditProfileContent';
      break;
    case 'newTicket':
      phpFunction = 'getNewTicketContent';
      break;
    case 'myTickets':
      phpFunction = 'getMyTicketsContent';
      break;
  }

  xhttp.open('GET', `../api/profile.php?action=${phpFunction}`, true);
  xhttp.send();
}


//New Ticket AJAX request for departments

document.getElementById('newTicket').addEventListener('click', function() {
  var xhr = new XMLHttpRequest();

  xhr.open('GET', '../api/get_departments.php', true);

  xhr.responseType = 'json';

  xhr.onload = function() {
      if (xhr.status === 200) {
          var departments = xhr.response;
          
          var optionsHTML = '<option value="">None</option>';
          departments.forEach(function(department) {
              optionsHTML += '<option value="' + department.id + '">' + department.name + '</option>';
          });
          
          document.getElementById('department').innerHTML = optionsHTML;
      }
  };

  xhr.send();
});


//My Tickets AJAX request

document.addEventListener('DOMContentLoaded', function() {
  document.getElementById('myTickets').addEventListener('click', function() {
      var xhr = new XMLHttpRequest();
      xhr.open('GET', '../api/get_tickets_by_creatorid.php', true);
      xhr.onload = function() {
          if (xhr.status === 200) {
              var tickets = JSON.parse(xhr.responseText);
              var html = '';
              if (tickets.length === 0) {
                  html += '<p>No tickets found.</p>';
              } else {
                  for (var i = 0; i < tickets.length; i++) {
                      var ticket = tickets[i];
                      html += generateTicketHTML(ticket);
                  }
              }
              var ticketsContainer = document.getElementById('tickets-container');
              if (ticketsContainer) {
                  ticketsContainer.innerHTML = html;
              }
          }
      };
      xhr.send();
  });

  function generateTicketHTML(ticket, departmentName) {
    return `
      <div class="ticket">
        <h3><a href="ticket.php?ticketId=${ticket.id}" class="ticket-link">Ticket ${ticket.id}</a></h3>
        <p><strong>Title:</strong> ${ticket.title}</p>
        <p><strong>Description:</strong> ${ticket.description}</p>
        <p><strong>Date:</strong> ${ticket.date}</p>
        <p><strong>Status:</strong> ${ticket.status}</p>
        <p><strong>Department:</strong> ${departmentName || 'None'}</p>
      </div>
    `;
  }
  
});