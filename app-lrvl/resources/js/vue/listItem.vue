<template>
    <div class="item">
        <label :class="serie-name">{{ serie.name}}</label>
        <label :class="serie-id">{{ serie.id}}</label>
        <label :class="serie-status">{{ serie.status}}</label>
    </div>
</template>

<script>
export default {
  props: ['serie'],
}
</script>


<style scoped>
    .item {
        display: flex;
        justify-content: center;
        align-content: center;
    }
    .serie-id {
        width: 10%;
        margin-left: 20px;
    }
    .serie-name {
        width: 80%;
        margin-left: 20px;
    }
    .serie-status {
        width: 20%;
        margin-left: 20px;
    }
</style>