<template>
    <p>{{ formatearFecha }}</p>
</template>

<script>
export default {
    props: ['fecha'],
    mounted() {
        console.log('Se recibio el siguiente props', this.fecha );
    },
    computed: {
        formatearFecha() {
            return moment(this.fecha).locale('es').format('DD [de] MMMM [del] YYYY')
        }

    }


}
</script>
