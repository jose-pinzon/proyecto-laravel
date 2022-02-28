var apitipoHabitacion = 'http://localhost/Proyecto-estadias/estadias/public/tipoHabitaciones';

new Vue({
    http:{
		headers:{
			'X-CSRF-TOKEN':document.querySelector('#token').getAttribute('value')
		}
	},

    el:"#tipohabitacion",
    data:{
        estado:true,
        tipo_habitacion:[],
        buscador:'',
        tiempoBuscar:'',
        tipo:'',
        precio:0,
        descripcion:'',
        id_tipo:'',
    },

    created(){
        this.obtenertiposhabitaciones();
    },

    methods:{
        obtenertiposhabitaciones(){
            this.$http.get(apitipoHabitacion,{
                params:{
                    buscador:this.buscador
                }
            }).then((json)=>{
                this.tipo_habitacion = json.data;
            }).catch((json)=>{
                console.log(json)
            });
        },
        buscar(){
            clearTimeout(this.tiempoBuscar)
            this.tiempoBuscar = setTimeout(this.obtenertiposhabitaciones,360)
        },
        Modal(){
            this.estado=true,
            this.tipo='',
            this.precio='',
            this.descripcion='',
            $('#modaltipos').modal('show')
        },

        Alerta(titulo,message,tipo){
            Swal.fire(
                titulo,
                message,
                tipo
            );
        },

        Guardar(){
            if(this.tipo.length <= 0 || this.precio.length <= 0 ){
                    return this.Alerta('error','Llene los campos obligatorios o coloque bien los datos','error');
            }else{
            var datos= {
                tipo:this.tipo,
                precio:this.precio,
                descripcion:this.descripcion
            };
            this.$http.post(apitipoHabitacion , datos).then((json)=>{
                this.obtenertiposhabitaciones();
                this.Alerta('Exito','Se agrego correctamente el tipo','success');
                this.tipo='';
                this.precio='';
                this.descripcion='';
            }).catch((json)=>{
                console.log(json);
            });

            $('#modaltipos').modal('hide');
        }
        },

        editar(id){
            this.estado=false;
            this.id_tipo=id;//aqui le pasaremos la id al data para poder guardar los cambios
            $('#modaltipos').modal('show');
            this.$http.get(apitipoHabitacion + '/' + id).then((js)=>{
            this.tipo=js.data.tipo;
            this.precio=js.data.precio;
            this.descripcion=js.data.descripcion;
            }).catch((js)=>{
                console.log(js)
            })
        },

        ActualizarDatos(){
            if(this.tipo.length <= 0 || this.precio.length <= 0 ){
                return this.Alerta('error','Llene los campos obligatorios y coloquelo como se pide','error');
            }else{
            let datostipos ={
                tipo:this.tipo,
                precio:this.precio,
                descripcion:this.descripcion
            };
            this.$http.patch(apitipoHabitacion + '/' + this.id_tipo,datostipos).then((js)=>{
                this.obtenertiposhabitaciones();
                this.Alerta('Actualizado','Tipo actualizado correctamente','success');
            });
            $('#modaltipos').modal('hide');}
        },


        eliminar(id){
            Swal.fire({
                title: "¿ESTA SEGURO DE ELIMINAR ESTE TIPO?",
                text: "Si se elimina ya no se podra recuperar",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "¡si, eliminar!",
            }).then((result) => {
                if (result.isConfirmed) {
                    this.$http.delete(apitipoHabitacion + '/' + id).then((js)=>{
                        this.obtenertiposhabitaciones();
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




    }
})
