<template>
    <input type="submit"
        class="btn btn-danger b-block w-100 mb-2"
        value="Eliminar ×"
    @click="eliminarServicio" />
</template>

<script>
    export default {
        props: ['servicioId'],
        methods: {
            eliminarServicio() {

                this.$swal({
                    title: 'Desea eliminar una receta?',
                    text: "Una vez eliminada no se puede recuperar",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si',
                    cancelButtonText: 'No'
                }).then((result) => {
                    if (result.value) {

                        const params = {
                            id: this.servicioId
                        }

                        axios.post(`/cuentasProveedores/${this.servicioId}`, {params, _method: 'delete'})
                        .then(respuesta => {

                            console.log(respuesta);

                            this.$swal({
                                title: 'Deleted!',
                                text: 'Your file has been deleted.',
                                icon: 'success'
                            })

                            //eliminar receta del DOM
                            //console.log(this.$el);
                            this.$el.parentNode.parentNode.parentNode.removeChild(this.$el.parentNode.parentNode);
                        })
                        .catch(error => {
                            ///console.log(error);
                            console.log(error.status);
                            this.$swal({
                                title: 'No se pudo eliminar!',
                                text: 'Verifique permisos.',
                                icon: 'error'
                            })
                        });
                    }
                })
            }
        }

    }
</script>>
