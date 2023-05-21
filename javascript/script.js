
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
