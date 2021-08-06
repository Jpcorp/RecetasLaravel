<template>
    <div>
        <span class="like-btn" @click="likeReceta" :class="{ 'like-active' : isActive }"></span>
        <p>{{ cantidadLikes }} Les gusto esta receta</p>
    </div>
</template>

<script>
    export default {
        //variable pasadas vu.js
        props: ['recetaId', 'like', 'likes'],
        data: function() {
            return {
                isActive : this.like,
                totalLikes: this.likes
            }
        },
        //cuando el compenente esta cargado
        mounted () {
            console.log(this.like);
            console.log(this.likes);
        },
        //metodos
        methods: {
            likeReceta() {
                console.log('Diste me gusta ', this.recetaId);
                axios.post('/recetas/like/' + this.recetaId)
                    .then(respuesta =>{

                        if (respuesta.data.attached.length > 0) {
                            this.$data.totalLikes++;
                        } else {
                            this.$data.totalLikes--;
                        }

                        this.isActive = !this.isActive;
                    })
                    .catch(error => {
                        if (error.response.status === 401) {
                            window.location = '/register';
                        }
                    });
            }
        },
        computed: {
            cantidadLikes: function() {
                return this.totalLikes;
            }
        }

    }
</script>
