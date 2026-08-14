<template>
  <select v-model="selectedState" @change="fetchMunicipios">
    <option value="">Selecione um estado</option>
    <option v-for="estado in estados" :key="estado.id" :value="estado.id">{{ estado.nome }}</option>
  </select>
  <select v-model="selectedMunicipio" :disabled="!selectedState">
    <option v-for="municipio in municipios" :key="municipio.id" :value="municipio.id">{{ municipio.nome }}</option>
  </select>
</template>

<script>
export default {
  data() {
    return {
      selectedState: null,
      selectedMunicipio: null,
      estados: [],
      municipios: [],
    };
  },
  methods: {
    fetchMunicipios() {
      if (!this.selectedState) return;
      fetch(`municipios/buscar_cidades.php?estado=${this.selectedState}`)
        .then(response => response.json())
        .then(data => {
          this.municipios = data;
        })
        .catch(error => {
          console.error('Erro ao buscar municípios:', error);
        });
    },
  },
};
</script>
