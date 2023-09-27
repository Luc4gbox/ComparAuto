<template>
    <div class="quiz-app">
        <div class="title">
            <h1>Quiz</h1>
        </div>
        <div class="quiz-container" v-if="!fin">
            <div v-if="currentQuestion" class="question">
                <p>{{ currentQuestion.question }}</p>
                <ul>
                    <li v-for="(reponse, index) in currentQuestion.reponse" :key="index">
                        <button :class="{success: variants[index] === 'success', danger: variants[index] === 'danger'}" @click="checkAnswer(index)" :disabled="voirReponse">{{ reponse }}</button>
                    </li>
                </ul>
                <button v-if="voirReponse && !fin" @click="selectQuestion">Continuer</button>
            </div>
        </div>
        <div v-else class="quiz-finished">
            <p>Quiz terminé ! Vous avez répondu à {{ score }} questions sur 10 correctement.</p>
            <button @click="restartQuiz">Recommencer</button>
        </div>
        <router-link :to="{ name: 'homepage'}" class="bouton-retour">Retour à la liste des constructeurs</router-link>
    </div>
</template>

<script setup>
import { ref, onMounted } from "vue";
import axios from "axios";

const quiz = ref(null);
const currentQuestion = ref(null);
const score = ref(0);
const questionCount = ref(0);
const voirReponse = ref(false);
const fin = ref(false);
const variants = ref([]);

const selectQuestion = () => {
    voirReponse.value = false;
    if (questionCount.value < 10) {
        const index = Math.floor(Math.random() * quiz.value.length);
        currentQuestion.value = quiz.value.splice(index, 1)[0];
        questionCount.value++;
        variants.value = new Array(currentQuestion.value.reponse.length).fill("");
    } else {
        currentQuestion.value = null;
        fin.value = true;
    }
};

const checkAnswer = (index) => {
    if (index === currentQuestion.value.ok) {
        score.value++;
        variants.value[index] = 'success';
    } else {
        variants.value[index] = 'danger';
        variants.value[currentQuestion.value.ok] = 'success';
    }
    voirReponse.value = true;
};

const restartQuiz = () => {
    questionCount.value = 0;
    score.value = 0;
    fin.value = false;
    selectQuestion();
};

const url = "http://localhost:8000/api/quizzes"

onMounted(() => {
  axios.get(url)
  .then(response => {
    quiz.value = response.data['hydra:member']
    selectQuestion();
  })
  .catch (error => {
    console.error("Une erreur s'est produite lors de la récupération des données : ", error);
  })
});
</script>

<style scoped>
.quiz-app {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    height: 600px;
    text-align: center;
    font-family: Arial, Helvetica, sans-serif;
}

.title {
    margin-bottom: 20px;
    color: #2F6FC0;
    font-size: 25px;
}

.quiz-container {
    display: flex;
    flex-direction: column;
    align-items: center;
}

.question {
    border: 1px solid #ccc;
    border-radius: 5px;
    padding: 20px;
    margin-bottom: 20px;
    width: 400px;
    max-width: 90%;
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
}

ul {
    list-style: none;
    padding: 0;
}

ul li {
    margin: 5px;
    padding: 5px;
}

button {
    width: 100%;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    text-align: center;
    color: black;
}

button:disabled {
    cursor: not-allowed;
}

.quiz-finished {
    border: 1px solid #ccc;
    border-radius: 5px;
    padding: 20px;
    width: 400px;
    max-width: 90%;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}

.danger {
    background-color: #f55757;
}

.success {
    background-color: #67C23A;
}

.bouton-retour {
    color: white;
    text-decoration: none;
    margin-top: 20px;
    background-color: #3984DE;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 10px;
    transition: all 0.3s ease;
}

.bouton-retour:hover {
    transform: scale(1.02);  /* Cette ligne permet de faire grossir le bouton lors du survol */
    background-color: #2F6FC0;  /* Cette ligne permet de rendre le bouton légèrement plus foncé lors du survol */
}

@media (max-width: 768px) {
    .quiz-app {
        height: auto;
        padding: 20px;
    }

    .title {
        font-size: 20px;
    }

    .question {
        width: 100%;
        padding: 10px;
    }

    button {
        padding: 5px 10px;
    }

    .quiz-finished {
        width: 100%;
    }

    .bouton-retour {
        padding: 5px 10px;
        font-size: 14px;
    }
}

@media (max-width: 480px) {
    .title {
        font-size: 16px;
    }

    button {
        padding: 3px 5px;
    }

    .bouton-retour {
        padding: 5px 10px;
        font-size: 12px;
    }
}

</style>