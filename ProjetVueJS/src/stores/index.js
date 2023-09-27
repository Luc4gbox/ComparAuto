import { defineStore } from 'pinia'
import axios, { Axios } from 'axios'

export const useDefaultStore = defineStore({
  id: 'default',
  state: () => ({
    "constructeurs": []
  }),
  getters: {

  },
  actions: {
    getData() {
      axios.get('http://localhost:8000/api/constructeurs')
        .then(response => {
          this.constructeurs = response.data['hydra:member'];
        })
        .catch(e => {
          const erreurs = e
          console.error("Une erreur s'est produite lors de la récupération des données : ", erreurs);
        })
    },
  }
})