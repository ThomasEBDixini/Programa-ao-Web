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
            <label for="categoria" class="form-label">Categoria: </label>
        </div>
        <div class="col-auto">
            <select v-model="serie.categoria" id="categoria" class="form-control">
                <option disabled value="">Escolha uma categoria</option>
                <option>Ação</option>
                <option>Ficção</option>
                <option>Terror</option>
            </select>
        </div>
        <div class="col-auto">
            <label for="streaming" class="form-label">Streaming: </label>
        </div>
        <div class="col-auto">
            <select v-model="serie.streaming" id="streaming" class="form-control">
                <option disabled value="">Escolha um streaming</option>
                <option>Amazon Prime</option>
                <option>HBO Max</option>
                <option>Netflix</option>
            </select>
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
                titulo: "",
                categoria: "",
                streaming: "",
            }
        }
    },
    methods: {
        cadastrarSerie() {
            if (this.existeCampoVazio() === true) {
                return;
            }
            axios.post('api/v1/serie', {
                nome: this.serie.titulo,
                categoria: this.serie.categoria,
                streaming: this.serie.streaming
            }).then( response => {
                    if (response.status == '201') {
                        this.serie.titulo = '';
                        this.serie.categoria = '';
                        this.serie.streaming = '';
                        this.$emit('reloadlist');
                    }
                }) 
                .catch( error => {
                    console.log(error);
                })
        },
        existeCampoVazio() {
            if (this.serie.titulo == '' 
                || this.serie.categoria == '' 
                || this.serie.streaming == ''
            ) {
                return true;
            }
            return false;
        }
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