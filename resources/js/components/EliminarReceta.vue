<template>
    <input type="submit"
    class="btn btn-danger b-block w-100 mb-2"
    value="Eliminar ×"
    @click="eliminarReceta" />
</template>

<script>
export default {
    props: ['recetaId'],
    methods: {
        eliminarReceta() {

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
                if (result.isConfirmed) {
                    this.$swal({
                        title: 'Deleted!',
                        text: 'Your file has been deleted.',
                        icon: 'success'
                    })
                }
            })
        }

    }
};
</script>
