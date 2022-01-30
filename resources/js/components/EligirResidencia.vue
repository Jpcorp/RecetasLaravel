<template>
<form method="POST"  enctype="multipart/form-data" class="row g-3" novalidate>
    <div class="justify-content-left col-12">
        <div class="justify-content-left col-2">
            <label for="residencia">1.- <small>Elige una residencia para listar:</small></label>
        </div>

        <div class="col-5">

        <select class="form-control" :required="true"
            id="s_residencias" name="s_residencias"
            @change="buscarEstadoResultados">
            <option value="0" :selected="true">-- Seleccionar --</option>
            <option v-for="row in residencias" :key="row.id"
                v-bind:value="row.id" >{{row.nombre}}</option>
        </select>

        </div>
    </div>

    <div class="justify-content-left col-12">

        <h3>Servicio del mes: [Septiembre] </h3>
        <h4 class="text-success"><small>Tipo de Ctas : [Cuentas por Pagar] </small></h4>

        <div class="col-12">
            <table class="table table-hover table-scrite">
                <thead>
                    <tr>
                        <td width="10px">Identificador</td>
                        <td>Nombre</td>
                        <td>Telefono para consultas</td>
                        <td>Fecha de pago Servicio</td>
                        <td>Descripcion del Servicio</td>
                        <td>Monto del mes</td>
                        <td>Gestionar cuenta</td>
                        <td>Ver detalle de pagos</td>
                    </tr>
                </thead>
                    <tbody class="justify-content-center">
                    <tr>
                        <td>Enel</td>
                        <td>(56) 223175869</td>
                        <td>20 de cada mes</td>
                        <td>Servicio de electricidad</td>
                        <td>$ 14.990 </td>
                        <td><a href="#" class="btn btn-dark b-block w-100 mb-2">Gestionar</a></td>
                        <td><a href="#" class="btn btn-success b-block w-100 mb-2">Ir</a></td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="7" class="">Total de mes :</td>
                        <td>$ 200.000</td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</form>


</template>
<script>
export default {
   //variable pasadas vue.js
   props: ['inf'],
   data: function() {
       return {
           residencias : this.inf,
           matriz: [
               {
                "1":[
                    {
                        "CuentaProveedor":[
                            {
                            id:"1",
                            nombre:"Servicio de internet",
                            dia_pago:"1",
                            dia_vencimiento:"21",
                            nmro_cliente:"12212332",
                            user_id:"2",
                            proveedor_id:"1",
                            tipo_cuenta_id:"1",
                            residencia_id:"1",
                            created_at:"2021-09-21T14:13:34.000000Z",
                            updated_at:"2021-09-22T16:52:42.000000Z"
                            }
                        ],
                        "1":{
                            id:"1",
                            nombre:"Vtr.com",
                            rut:"76.114.143-0",
                            direccion:"Apoquindo N 4800 piso 11",
                            tlf:"6008009000",
                            comuna:"Las Condes",
                            region:"RM",
                            giro:"Servicios de Telefonia©de Servicios de Telecomunicaciones",
                            descripcion:"Servicios de Telefon y Servicios de Telecomunicaciones",
                            user_id:"2",
                            residencias_id:"1",
                            created_at:"2021-09-21T14:09:23.000000Z",
                            updated_at:"2021-09-21T14:09:23.000000Z"
                        }
                    }
                ],
                "2":[
                    {
                        "CuentaProveedor":[
                            {
                            id:"6",
                            nombre:"Servicio de Gas",
                            dia_pago:"17",
                            dia_vencimiento:"5",
                            nmro_cliente:"60079838",
                            user_id:"2",
                            proveedor_id:"2",
                            tipo_cuenta_id:"1",
                            residencia_id:"1",
                            created_at:"2021-09-22T16:57:29.000000Z",
                            updated_at:"2021-09-22T16:57:29.000000Z"
                            }
                        ],
                        "2":{
                            id:"2",
                            nombre:"Empresa Lipigas SA",
                            rut:"96.928.510-K",
                            direccion:"Apoquindo 5400, las condes",
                            tlf:"6005006000",
                            comuna:"Santiago",
                            region:"RM",
                            giro:"Distrbucion de gas licuado",
                            descripcion:"Distrbucion de gas licuado",
                            user_id:"2",
                            residencias_id:"1",
                            created_at:"2021-09-22T16:23:45.000000Z",
                            updated_at:"2021-09-22T16:23:45.000000Z"
                        }
                    }
                ]
              }
           ]
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
           //elegir el elemento del dom
           this.$el = document.getElementById('s_residencias');
           //ver el valor de un campo
           console.log(this.$el.value);
           if (this.$el.value !== 0 && this.$el.value !== 'undefined') {
                //alert("ir a buscar lo elementos");

                const params = {
                  id: this.$el.value,
                }
                console.log(params.id);

                axios.get('/getCtasPorPagarByMes/'+ params.id)
                    .then(respuesta => {
                        console.log(respuesta.data);
                        this.proveedorCtaXpagar = respuesta.data;
                        let arr = respuesta.data;

                        this.myArray.forEach((value, index) => {
                            arr.push(value);
                            console.log(value);
                            console.log(index);
                        });
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
