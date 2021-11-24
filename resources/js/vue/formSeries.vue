<template>
    <div class="row">
        <div class="col-auto">
            <label for="nome" class="form-label">Título: </label>
        </div>
        <div class="col-auto">
            <input 
                v-model="serie.nome" 
                id="nome"
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
            <label for="temporada" class="form-label">Temporada: </label>
        </div>
        <div class="col-auto">
            <select v-model="serie.temporada" id="temporada" class="form-control">
                <option disabled value="">Qual a temporada: </option>
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
                <option>6</option>
                <option>7</option>
                <option>8</option>
                <option>9</option>
                <option>10</option>
                <option>11</option>
                <option>12</option>

            </select>
        </div>
        
        <div class="col-auto">
            <button class="btn btn-primary" @click="serie.id ? editarSerie() : cadastrarSerie() ">
                {{ serie.id ? 'Editar': 'Cadastrar' }}
            </button>
        </div>
    </div>
</template>

<script>
export default {
    props: ['serie'],
    methods: {
        cadastrarSerie() {
            if (this.existeCampoVazio() === true) {
                return;
            }
            axios.post('api/v1/serie', {
                nome: this.serie.nome,
                categoria: this.serie.categoria,
                streaming: this.serie.streaming,
                temporada: this.serie.temporada,
            }).then( response => {
                    if (response.status == '201') {
                        this.serie.id = null;
                        this.serie.nome = '';
                        this.serie.categoria = '';
                        this.serie.streaming = '';
                        this.serie.temporada = '';
                        this.$emit('reloadlist');
                    }
                }) 
                .catch( error => {
                    console.log(error);
                })
        },
        editarSerie() {
            if (this.existeCampoVazio() === true) {
                return;
            }
            axios.patch('api/v1/serie/' + this.serie.id, {
                nome: this.serie.nome,
                categoria: this.serie.categoria,
                streaming: this.serie.streaming,
                status: this.serie.status,
                temporada: this.serie.temporada,
            }).then( response => {
                    if (response.status == '204') {
                        this.serie.id = null;
                        this.serie.nome = '';
                        this.serie.categoria = '';
                        this.serie.streaming = '';
                        this.serie.temporada = '';
                        this.$emit('reloadlist');
                    }
                }) 
                .catch( error => {
                    console.log(error);
                })
        },
        deletarSerie() {
            if (this.existeCampoVazio() === true) {
                return;
            }
            axios.delete('api/v1/serie/', {
                nome: this.serie.nome,
                categoria: this.serie.categoria,
                streaming: this.serie.streaming,
                status: this.serie.status,
                temporada: this.serie.temporada,
            }).then( response => {
                    if (response.status == '204') {
                        this.serie.id = null;
                        this.serie.nome = '';
                        this.serie.categoria = '';
                        this.serie.streaming = '';
                        this.serie.temporada = '';
                        this.$emit('reloadlist');
                    }
                }) 
                .catch( error => {
                    console.log(error);
                })
        },
        existeCampoVazio() {
            if (this.serie.nome == '' 
                || this.serie.categoria == '' 
                || this.serie.streaming == ''
                || this.serie.temporada == ''
            ) {
                return true;
            }
            return false;
        }
    }
}
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
