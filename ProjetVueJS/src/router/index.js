import { createRouter, createWebHashHistory } from 'vue-router'
import Home from '../components/Home.vue'
import Constructeur from '../components/Constructeur.vue'
import Quiz from '../components/Quiz.vue'

const routes = [
    {
      path: '/',
      name : 'homepage',
      component : Home
    },
    {
      path:'/constructeur/:id',
      name : 'constructeur',
      component : Constructeur
    },
    {
      path:'/quiz',
      name : 'quiz',
      component : Quiz
    }
]

const router = createRouter({
    history: createWebHashHistory(),
    routes,
  })

export default router