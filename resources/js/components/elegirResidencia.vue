<template>

    <select name="residencia"
            class="form-control"
            id="residencia"
            v-model="selected">
            <option value="">-- Seleccionar --</option>
        <option v-for="item in items" :value="item.id">
        </option>
    </select>


</template>
<script>
export default {
   //variable pasadas vu.js
   props: ['residencias'],
   data: function() {
       return {
           items : this.residencias
       }
   }
}
</script>
