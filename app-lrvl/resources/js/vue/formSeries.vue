<template>
    <div class="row">
        <div class="col-auto">
            <label for="titulo" class="form-label">Título: </label>
        </div>
        <div class="col-auto">
            <input 
                v-model="serie.titulo" 
                id="titulo"
                placeholder="Digite o título da série"
                class="form-control"
                required
            />
        </div>
  

                <div class="col-auto">
            <select v-model="Categoria">
            <option disabled value="">Selecione uma, por favor</option>
            <option>A</option>
            <option>B</option>
            <option>C</option>
            </select>
            <span>Categoria: {{ Categoria }}</span>
        </div>


        <div class="col-auto">
                    <select v-model="Streaming">
                    <option disabled value="">Selecione um, por favor</option>
                    <option>A</option>
                    <option>B</option>
                    <option>C</option>
                    </select>
                    <span>Streaming: {{ Streaming }}</span>
        </div>


        <div class="col-auto">
            <button class="btn btn-primary" @click="cadastrarSerie()">
                Cadastrar
            </button>
        </div>
    </div>
</template>

<script>
export default {
    data: function () {
        return {
            serie: {
                titulo: ""
            }
        }
    },
    methods: {
        cadastrarSerie() {
            if (this.serie.titulo == '') {
                return;
            }
            axios.post('api/v1/serie', {
                nome: this.serie.titulo
            }).then( response => {
                    if (response.status == '201') {
                        this.serie.titulo = '';
                        this.$emit('reloadlist');
                    }
                }) 
                .catch( error => {
                    console.log(error);
                })
        },
    },
}


new Vue({
  el: '...',
  data: {
    selected: ''
  }
})

new Vue({
  el: '...',
  data: {
    selected: ''
  }
})
</script>

<style scoped>
    label {
        margin: 0;
    }
    .row {
        align-items: center;
        align-content: center;
        margin-bottom: 0px;
    }
</style>