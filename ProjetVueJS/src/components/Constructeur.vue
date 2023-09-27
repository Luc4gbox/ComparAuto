<template>
  <div class="constructeur-container">
    <div class="constructeur" v-if="constructeur">
      <div class="constructeur-info">
        <h2>{{ constructeur.nom }}</h2>
        <p><strong>Pays : </strong>{{ constructeur.pays }} <span :class="`fi fi-${constructeur.icon}`"></span></p>
        <p><strong>Date de fondation : </strong>{{ formatDate(constructeur.date_fondation) }}</p>
      </div>
      <div class="constructeur-logo-description">
        <img :src="`./public/constructeur/${constructeur.logo}`" :title="constructeur.nom" class="constructeur-logo" />
        <p>{{ constructeur.description }}</p>
      </div>
    </div>
    <div v-else>
      <p>Pas de constructeur</p>
    </div>
    <router-link :to="{ name: 'homepage' }" class="bouton-retour">Retour à l'accueil</router-link>
  </div>
</template>

<script setup>
import { onMounted, ref, computed } from 'vue'
import { useRoute } from 'vue-router'
import { useDefaultStore } from '../stores/index.js'
import { format } from 'date-fns'

const route = useRoute()
const store = useDefaultStore()

onMounted(() => {
  store.getData();
});

const constructeur = computed(() => store.constructeurs[useRoute().params.id]);
const nom = computed(() => constructeur ? constructeur.nom : null);

const formatDate = (date) => {
  return format(new Date(date), 'dd/MM/yyyy')
}


</script>

<style scoped>
@import 'https://cdn.jsdelivr.net/gh/lipis/flag-icons@6.6.6/css/flag-icons.min.css';

body,
html {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100%;
  font-size: 2em;
  padding: 0;
  margin: 0;
}

.constructeur-container {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100%;
  flex-direction: column;
}

.constructeur {
  display: flex;
  flex-direction: row;
  align-items: start;
  justify-content: space-between;
  border: 1px solid gray;
  border-radius: 20px;
  box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
  padding: 0px 60px;
  margin: 50px;
  text-align: center;
  width: 800px;
  font-family: Arial, Helvetica, sans-serif;
}

.constructeur-info {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
}

.constructeur-logo-description {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  margin: 20px;
  font-size: 20px;
}

.constructeur-logo-description img {
  width: 100%;
  height: 150px;
  border-radius: 10px;
  margin-top: 10px;
  object-fit: contain;
}

.constructeur-logo-description p {
  margin: 30px;
}

.constructeur-info h2 {
  font-size: 60px;
}

.constructeur-info p {
  font-size: 20px;
}

.bouton-retour {
  color: white;
  text-decoration: none;
  margin-top: 20px;
  background-color: #3984DE;
  padding: 10px 20px;
  border: 1px solid #ccc;
  border-radius: 15px;
  transition: all 0.3s ease;
  font-family: Arial, Helvetica, sans-serif;
  font-size: 20px;
}

.bouton-retour:hover {
  transform: scale(1.02);
  background-color: #2F6FC0;
}

@media (max-width: 768px) {

  .constructeur {
    flex-direction: column;
    padding: 20px 30px;
    align-items: center;
    width: 80%;
    margin: 40px 40px;
  }

  .constructeur-logo-description,
  .constructeur-info {
    text-align: center;
  }

  .constructeur-info h2 {
    font-size: 40px;
  }

  .constructeur-info p,
  .constructeur-logo-description p {
    font-size: 16px;
  }

  .bouton-retour {
    padding: 5px 10px;
    font-size: 16px;
    margin-bottom: 20px;
  }
}

@media (max-width: 480px) {
  .constructeur {
    padding: 10px 15px;
  }

  .constructeur-info h2 {
    font-size: 30px;
  }

  .constructeur-info p,
  .constructeur-logo-description p {
    font-size: 14px;
  }

  .bouton-retour {
    padding: 5px 10px;
    font-size: 14px;
  }
}</style>
