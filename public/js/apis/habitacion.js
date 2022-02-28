var apiHabitacion ="http://localhost/Proyecto-estadias/estadias/public/apiHabitaciones";
var apiTipo ="http://localhost/Proyecto-estadias/estadias/public/tipoHabitaciones";

new Vue({

    http:{
		headers:{
			'X-CSRF-TOKEN':document.querySelector('#token').getAttribute('value')
		}
	},

    el: "#habitacion",
    data: {
        estado: true,
        habitaciones: [],
        tipos: [],
        //id de la habiatcion a editar
        id_habitacion: "",
        buscador:'',
        tiempoBuscar: '',

        // datos de la base de datos
        tipo_id: "",
        numero: 0,
        ubicacion: "",
        precio: 0,
        Estado: "",
        descripcion: "",
        capacidad: "",
    },

    created() {
        this.obtenerhabitaciones();
        this.obtenertipos();
    },

    methods: {
        obtenerhabitaciones(){
            this.$http
                .get(apiHabitacion,{
                    params:{
                        buscador:this.buscador,
                    }
                })
                .then(function (json) {
                    this.habitaciones = json.data;
                })
                .catch(function (json) {
                    console.log(json);
                });
        },

        buscar(){
            clearTimeout(this.tiempoBuscar)
            this.tiempoBuscar = setTimeout(this.obtenerhabitaciones,360)
        },

        obtenertipos(){
            this.$http
                .get(apiTipo)
                .then((json) => {
                    this.tipos = json.data;
                })
                .catch((json) => {
                    console.log(json);
                });
        },

        Modalshow() {
            this.estado = true;
            $("#modalhabitacion").modal("show");
        },

        Alerta(titulo,message,tipo){
            Swal.fire(
                titulo,
                message,
                tipo
              );
        },

        Guardar() {
            var registros= [];
            for (let i in this.habitaciones) {
                registros.push(this.habitaciones[i].numero)
            }
            let numero = parseInt(this.numero);
            let busqueda = registros.indexOf(numero);
            console.log(registros);
            console.log(busqueda);

            if(busqueda != -1){
                return this.Alerta('error','el numero ya se utilizo','error');
            }else if(this.tipo_id.length <= 0 || this.numero.length <= 0   || this.ubicacion.length <= 0 ||this.precio.length <= 0 ||this.Estado.length <= 0 ||this.capacidad.length<=0){
                return this.Alerta('error','llene los campos correspondientes marcados con asteriscos','error');
            }else{
            var datos = {
                tipo_id: this.tipo_id,
                numero: this.numero,
                ubicacion: this.ubicacion,
                precio: this.precio,
                estado: this.Estado,
                descripcion: this.descripcion,
                capacidad: this.capacidad,
            };
            this.$http
                .post(apiHabitacion, datos)
                .then((json) => {
                    this.obtenerhabitaciones();
                    this.Alerta('Exito','Habitacion agregada correctamente','success');
                    this.tipo_id = "";
                    this.numero = "";
                    this.ubicacion = "";
                    this.precio = "";
                    this.Estado = "";
                    this.descripcion = "";
                    this.capacidad = "";
                })
                .catch((json) => {
                    console.log(json);
                });
            $("#modalhabitacion").modal("hide");
            }
        },



        editar(id) {
            this.estado = false;
            this.id_habitacion = id;
            $("#modalhabitacion").modal("show");
            this.$http
                .get(apiHabitacion + "/" + id)
                .then((json) => {
                    this.tipo_id = json.data.tipo_id;
                    this.numero = json.data.numero;
                    this.ubicacion = json.data.ubicacion;
                    this.precio = json.data.precio;
                    this.Estado = json.data.estado;
                    this.descripcion = json.data.descripcion;
                    this.capacidad = json.data.capacidad;
                })
                .catch((json) => {
                    console.log(json);
                });
        },


        actualizar() {
            if(this.tipo_id.length <= 0 || this.numero.length <= 0   || this.ubicacion.length <= 0 ||this.precio.length <= 0 ||this.Estado.length <= 0 ||this.capacidad.length<=0){
                return this.Alerta('error','llene los campos correspondientes marcados con asteriscos','error');
            }else{
            var datos = {
                tipo_id: this.tipo_id,
                numero: this.numero,
                ubicacion: this.ubicacion,
                precio: this.precio,
                estado: this.Estado,
                descripcion: this.descripcion,
                capacidad: this.capacidad,
            };
            this.$http
                .patch(apiHabitacion + "/" + this.id_habitacion, datos)
                .then((json) => {
                    this.obtenerhabitaciones();
                    this.Alerta('Actualizacion','Habitacion actualizado correctamente','success');
                    this.tipo_id = "";
                    this.numero = "";
                    this.ubicacion = "";
                    this.precio = "";
                    this.Estado = "";
                    this.descripcion = "";
                    this.capacidad = "";
                });
            $("#modalhabitacion").modal("hide");
            }
        },


        eliminar(id) {
            Swal.fire({
                title: "¿ESTA SEGURO DE ELIMINAR ESTA HABITACION?",
                text: "Si se elimina ya no se podra recuperar",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "¡si, eliminar!",
            }).then((result) => {
                if (result.isConfirmed) {
                    this.$http
                    .delete(apiHabitacion + "/" + id)
                    .then((js) => {
                        this.obtenerhabitaciones();
                    })

                    Swal.fire(
                        "¡ELIMINADO!",
                        "Habitacion eliminado correctamente.",
                        "success"
                    );
                }
            });
        },
    },
});
