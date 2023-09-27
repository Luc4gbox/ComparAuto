<template>
  <div class="container">
    <header class="page-header">
      <h1>Liste des constructeurs</h1>
      <div class="header-buttons">
        <router-link :to="{ name: 'quiz' }" class="bouton-quiz">Accéder au Quiz</router-link>
        <a href="http://localhost:8000/home" class="bouton-quiz">ComparAuto</a>
      </div>
    </header>
    <div class="constructeur-container">
      <router-link v-for="(constructeur, index) in store.constructeurs" :key="index" class="constructeur"
        :to="{ name: 'constructeur', params: { id: index } }">
        <img :src="`./public/constructeur/${constructeur.logo}`" :title="constructeur.nom" class="constructeur-logo" />
        <p>{{ constructeur.nom }}</p>
      </router-link>
    </div>
  </div>
</template>

<script setup>
import { useDefaultStore } from '../stores/index.js'
import { onMounted } from 'vue';


const store = useDefaultStore()

onMounted(() => {
  store.getData();
});


</script>

<style scoped>
.container {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  padding: 20px;
}

.page-header {
  text-align: center;
  margin-bottom: 20px;
}

.constructeur-container {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
}

.constructeur {
  width: calc(15% - 20px);
  margin: 10px;
  padding: 10px;
  border-radius: 10px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  text-align: center;
  background-color: white;
}

.constructeur-logo {
  width: 100%;
  height: 120px;
  border-radius: 10px;
  margin-top: 10px;
  object-fit: contain;
}

h1 {
  font-size: 40px;
  color: #3984DE;
  font-family: Arial, Helvetica, sans-serif;
  font-weight: bold;
}

a.constructeur {
  margin: 10px;
  padding: 10px;
  border-radius: 10px;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.3);
  text-align: center;
  text-decoration: none;
  color: inherit;
  font-size: 25px;
  color: #3984DE;
  font-family: Arial, Helvetica, sans-serif;
}

.constructeur:hover {
  transform: scale(1.05);
}

.bouton-quiz {
  color: white;
  text-decoration: none;
  margin-top: 20px;
  background-color: #3984DE;
  padding: 10px 20px;
  border: 1px solid #ccc;
  border-radius: 10px;
  transition: all 0.3s ease;
  font-family: Arial, Helvetica, sans-serif;
  margin-right: 30px;
  margin-left: 20px;
}

.bouton-quiz:hover {
  background-color: #2F6FC0;
}

@media (max-width: 768px) {
  .page-header h1 {
    font-size: 30px; /* Réduisez la taille de la police pour les tablettes */
  }
  
  .constructeur {
    width: calc(33% - 20px); /* 3 constructeurs par ligne pour tablette */
  }
  
  .bouton-quiz {
    padding: 5px 10px; /* Réduire la taille du bouton */
  }
}

@media (max-width: 480px) {
  .page-header h1 {
    font-size: 25px; /* Réduire encore plus la taille de la police pour les mobiles */
  }
  
  .constructeur {
    width: calc(50% - 20px); /* 2 constructeurs par ligne pour mobile */
  }
  
  .bouton-quiz {
    padding: 3px 5px; /* Réduire encore plus la taille du bouton */
  }
  
  .bouton-quiz {
    padding: 5px 10px; /* Réduire la taille du bouton */
  }
}

</style>