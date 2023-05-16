const questions = [
    {
        question : 'Siapa dalang pembunuhan Munir ?',
        answers : [
            {text : 'SpongeBob', point : 4},
            {text : 'BoboiBoy', point : 2},
            {text : 'Shiva', point : 5},
        ]
    },
    {
        question : 'Apa kepanjangan PKI ?',
        answers : [
            {text : 'Pusat Komunikasi dan Informasi', point : 5},
            {text : 'Pusat Kerajaan Indonesia', point : 1},
            {text : 'Pusat Kendali Iman', point : 3},
        ]
    },
    {
        question : 'Apa yang membuat kamu kuat ?',
        answers : [
            {text : 'Gala', point : 5},
            {text : 'Cipung', point : 4},
            {text : 'Ameena', point : 3},
        ]
    },
];

const questionElement = document.getElementById('question');
const answerButtons = document.getElementById('answer-buttons');
const nextButton = document.getElementById('next-button');

let currentQuestionIndex = 0;
let score = 0;

function startQuiz() {
    currentQuestionIndex = 0;
    score = 0;
    nextButton.innerHTML = 'Next';
    showQuestions();
}

function showQuestions() {
    resetState();
    let currentQuestion = questions[currentQuestionIndex];
    let questionNo = currentQuestionIndex +1;
    questionElement.innerHTML = questionNo + ". " + currentQuestion.question;
    currentQuestion.answers.forEach(answer => {
        const button = document.createElement('button');
        button.innerHTML = answer.text;
        button.classList.add("btn-outlined-dark");
        button.classList.add("button");
        button.classList.add("w-100");
        button.classList.add("mb-3");
        button.classList.add("text-left");
        answerButtons.appendChild(button);
        if (answer.point == 5) {
            button.dataset.point = answer.point;
        }
        console.log(button.dataset.point);
        button.addEventListener("click", selectAnswer);
    });
}

function resetState() {
    nextButton.style.display = "none";
    while (answerButtons.firstChild ) {
        answerButtons.removeChild(answerButtons.firstChild);
    }
}

function selectAnswer(e) {
    const selectedBtn = e.target;
    const point = selectedBtn.dataset.point;
    score += point;
    console.log(point);
    if (point == 5) {
        selectedBtn.classList.add("btn-success");
    } else {
        selectedBtn.classList.add("btn-danger");
    }
    Array.from(answerButtons.children).forEach(button => {
        if (button.dataset.point ==5) {
            button.classList.add("btn-success");
        } else {
            button.classList.add("btn-danger");

        }
        button.classList.remove('btn-outlined-dark')
        button.classList.add('disabled');
        button.disabled = true;
    });
    nextButton.style.display = "block";
}

function handleNextButton() {
    currentQuestionIndex++;
    if (currentQuestionIndex < questions.length) {
        showQuestions();
    } else {
        showScore();
    }
}

nextButton.addEventListener("click", ()=> {
    if (currentQuestionIndex < questions.length) {
        handleNextButton();
    } else {
        startQuiz();
    }
}); 

function showScore() {
    resetState();
    questionElement.innerHTML = "Your score is ${score}";

}

startQuiz();
