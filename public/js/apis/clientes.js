
new Vue({

    http:{
		headers:{
			'X-CSRF-TOKEN':document.querySelector('#token').getAttribute('value')
		}
	},

    el:"#cliente",
    data: {
        estado: true,
        clientes:[],
        grupos:[],
        //variables del buscador
        buscador:'',
        tiempoBuscar:'',
        id_cliente:"",
        // datos de la base de datos
        grupo_id:"",
        nombre: "",
        email: "",
        apellido: "",
        //para la paginacion
        page:1,
        pages:1,
    },

    created(){
        this.obtenerClientes();
        this.obtenergrupos();

    },

    methods: {
        obtenerClientes() {
            this.$http
                .get('ClientesApi',{
                    params:{
                        buscador:this.buscador
                }
            })
                .then(function (json) {
                    this.clientes = json.data;
                })
                .catch(function (json) {
                    console.log(json);
                });
        },
        obtenergrupos() {
            this.$http
                .get('gruposApi')
                .then((json) => {
                    this.grupos = json.data;
                })
                .catch((json) => {
                    console.log(json);
                });
        },
        //funcion para evitar varias peticiones al servidor
        buscar(){
            clearTimeout(this.tiempoBuscar)
            this.tiempoBuscar = setTimeout(this.obtenerClientes,360)
        },


        Modalshow() {
            this.estado = true;
            $("#modalcliente").modal("show");
        },

        Alerta(titulo,message,tipo){
            Swal.fire(
                titulo,
                message,
                tipo
            );
        },

        Guardar() {
            let correo = this.email;
            let busqueda = correo.indexOf('@');
            let busqueda1 = correo.indexOf('.com');
            var registros= [];
            for (const i in this.clientes) {
                registros.push(this.clientes[i].email)
            }
            let buscaremail = registros.indexOf(correo);
                while (this.grupo_id == "" || this.nombre == ""||this.email == ""|| this.apellido == "" ) {
                    return this.Alerta('error','llene los campos correspondientes marcados con asteriscos','error');
                }
            if(busqueda == -1|| busqueda1 == -1){
                return this.Alerta('advertencia','Coloque el @ o .com al email','warning');
            }else if(buscaremail != -1){
                return this.Alerta('Advertencia','El correo asignado ya a sido registrado','warning');
            }else{
            var datos = {
                grupo_id: this.grupo_id,
                nombre:this.nombre,
                apellido: this.apellido,
                email: this.email,
            };
            this.$http
                .post('ClientesApi', datos)
                .then((json) => {
                    this.obtenerClientes();
                    this.Alerta('Exito','Cliente agregado correctamente','success');
                    this.grupo_id = "";
                    this.nombre = "";
                    this.apellido = "";
                    this.email = "";
                })
                .catch((json) => {
                    console.log(json);
                });
            $("#modalcliente").modal("hide");
        }
        },

        editar(id) {
            this.estado = false;
            this.id_cliente = id;
            $("#modalcliente").modal("show");
            this.$http
                .get('ClientesApi' + "/" + id)
                .then((json) => {
                    this.grupo_id = json.data.grupo_id;
                    this.nombre = json.data.nombre;
                    this.apellido = json.data.apellido;
                    this.email = json.data.email;
                })
                .catch((json) => {
                    console.log(json);
                });
        },


        actualizar(){
                // el indexof lanzara -1 si el valor no existe de lo contrario mandara la ubicacion
            while (this.grupo_id == "" || this.nombre == ""||this.email == ""|| this.apellido == "" ) {
                return this.Alerta('error','llene los campos correspondientes marcados con asteriscos','error');
            }
            let correo = this.email;
            let busqueda = correo.indexOf('@');
            let busqueda1 = correo.indexOf('.com');

                    if(busqueda != -1 && busqueda1 != -1){
                        var datos = {
                            grupo_id: this.grupo_id,
                            nombre:this.nombre,
                            apellido: this.apellido,
                            email: this.email,
                        };
                        this.$http
                            .patch('ClientesApi' + "/" + this.id_cliente, datos)
                            .then((json) => {
                                this.obtenerClientes();
                                this.Alerta('Actualizacion','Cliente actualizado correctamente','success');
                                this.grupo_id = "";
                                this.nombre = "";
                                this.apellido = "";
                                this.email = "";
                            });
                    $("#modalcliente").modal("hide");}else{
                        this.Alerta('Error','El formato del correo no es correcto','warning');
                    }

        },


        eliminar(id){

            Swal.fire({
                title: "¿ESTA SEGURO DE ELIMINAR ESTE CLIENTE?",
                text: "Si se elimina ya no se podra recuperar",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "¡si, eliminar!",
            }).then((result) => {
                if (result.isConfirmed) {
                    this.$http.delete('ClientesApi' + '/' + id).then((js)=>{
                        this.obtenerClientes();
                    }).catch((js)=>{
                        console.log(js)
                    });

                    Swal.fire(
                        "¡ELIMINADO!",
                        "Tipo eliminado correctamente.",
                        "success"
                    );
                }
            });
        },





    },
});
