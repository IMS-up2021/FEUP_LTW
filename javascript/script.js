
//Ticket search

const searchQuestion = document.querySelector('#searchquestion');
const section1 = document.querySelector('#questions');

if (searchQuestion) {
  searchQuestion.addEventListener('input', debounce(handleSearch, 300));
}

async function handleSearch() {
  const searchValue = searchQuestion.value;
  const response = await fetch(`../api/api_questions.php?search=${searchValue}`);
  const questions = await response.json();
  displayQuestions(questions);
}

function displayQuestions(questions) {
  section1.innerHTML = '';

  for (const question of questions) {
    const article = createQuestionElement(question);
    section1.appendChild(article);
  }
}

function createQuestionElement(question) {
  const article = document.createElement('article');
  const link = document.createElement('a');
  link.href = `../pages/question.php?id=${question.id}`;
  link.textContent = question.title;
  article.appendChild(link);
  return article;
}

function debounce(func, delay) {
  let timeoutId;
  return function(...args) {
    clearTimeout(timeoutId);
    timeoutId = setTimeout(() => func.apply(this, args), delay);
  };
}
  
document.addEventListener('DOMContentLoaded', function() {
  var editButton = document.querySelector('.edit-ticket-button');
  var ticketId = editButton.getAttribute('data-ticket-id');
  var editTicketForm = document.getElementById('editTicketForm' + ticketId);
  var editTicketDepartmentSelect = editTicketForm.querySelector('#editTicketDepartment');

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

      editTicketDepartmentSelect.innerHTML = optionsHTML;
    }
  };

  xhr.send();

  editButton.addEventListener('click', function() {
    if (editTicketForm.style.display === 'none') {
      editTicketForm.style.display = 'block';
    } else {
      editTicketForm.style.display = 'none';
    }
  });
});


// Add a click event listener to the edit ticket button
// var editTicketButton = document.querySelector(".edit-ticket-btn");
// var editTicketForm = document.getElementById("editTicketForm");

// editTicketButton.addEventListener('click', function() {
//   var xhr = new XMLHttpRequest();
//   var editTicketForm = document.getElementById('editTicketForm');
//   var editTicketTitleInput = document.getElementById('editTicketTitle');
//   var editTicketDescriptionInput = document.getElementById('editTicketDescription');

//   xhr.open('GET', '../api/get_departments.php', true);
//   xhr.responseType = 'json';

//   xhr.onload = function() {
//     if (xhr.status === 200) {
//       var departments = xhr.response;
      
//       var optionsHTML = '<option value="">None</option>';
//       departments.forEach(function(department) {
//         optionsHTML += '<option value="' + department.id + '">' + department.name + '</option>';
//       });
      
//       document.getElementById('editTicketDepartment').innerHTML = optionsHTML;

//       // Get the current ticket attributes
//       var ticketTitle = '<?php echo $ticket->title; ?>';
//       var ticketDescription = '<?php echo $ticket->description; ?>';

//       // Set the current ticket attributes in the form fields
//       editTicketTitleInput.value = ticketTitle;
//       editTicketDescriptionInput.value = ticketDescription;
//     }
//   };

//   xhr.send();

//   editTicketForm.style.display = editTicketForm.style.display === 'none' ? 'block' : 'none';
// });


