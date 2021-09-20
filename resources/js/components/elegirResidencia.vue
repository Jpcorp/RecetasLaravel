<template>

    <select class="form-control"
        :required="true"
        id="s_residencias" name="s_residencias"
        @change="buscarEstadoResultados">
            <option value="0" :selected="true">-- Seleccionar --</option>
            <option v-for="row in residencias" :key="row.id" v-bind:value="row.id" >
                {{row.nombre}}</option>
    </select>

</template>
<script>
export default {
   //variable pasadas vu.js
   props: ['inf'],
   data: function() {
       return {
           residencias : this.inf,
       }
   },
   methods: {
       getResidencias: function() {
           axios.get('/getAllResidencias')
            .then(respuesta => {
                //console.log(respuesta.data);
                this.residencias = respuesta.data;
            })
            .catch(error => {
                alert(error);
            });
       },
       buscarEstadoResultados: function() {
           //ver el valor de un campo
           //console.log(this.$el.value);
           if (this.$el.value != 0) {
              alert("ir a buscar lo elementos");

              const params = {
                  id: this.$el.value
              }
            console.log(params.id);

            axios.get('/getCtasPorPagarByMes/'+ params.id)
                .then(respuesta => {
                    console.log(respuesta.data);
                })
                .catch(error => {
                    if (error.response.status === 401) {
                        window.location = '/register';
                    }
                });


             //ios.get('/getCtasPorPagarByMes')
           }
           console.log('buscarEstadoResultados');
       }
   },
   created: function() {

       this.getResidencias();

   }
}
</script>
