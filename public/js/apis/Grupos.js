var Apigrupo = 'http://localhost/Proyecto-estadias/estadias/public/gruposApi';


new Vue({

    http:{
		headers:{
			'X-CSRF-TOKEN':document.querySelector('#token').getAttribute('value')
		}
	},

    el:"#Grupo",
    data:{
        grupos:[],
        estado:true,
        mostrar:false,
        nombre:'',
        descripcion:'',
        num_personas:'',
        id_grupo:"",
        

    },
    created:function(){
        this.obtenerDatos();
    },
    methods:{
        obtenerDatos(){
            this.$http.get(Apigrupo).then(js=>{
                this.grupos = js.data
            }).catch(js=>{console.log(js)})
        },
        mostrarModal(){
            this.estado = true;
            $("#modalGrupo").modal("show");
        },

        mostrarclientes(id){
            this.id_grupo=id;
            this.mostrar=!this.mostrar
        },

        Alerta(titulo,message,tipo){
            Swal.fire(
                titulo,
                message,
                tipo
            );
        },
        GuardarDatos(){
            let datos = {
                nombre:this.nombre,
                descripcion:this.descripcion,
                num_personas:this.num_personas
            };
            this.$http.post(Apigrupo, datos).then((json)=>{
                this.obtenerDatos();
                this.Alerta('Exito','Grupo agregado correctamente','success');
                this.nombre='';
                this.descripcion='';
                this.num_personas='';
            }).catch((json)=>{
                console.log(json);
            })
            $("#modalGrupo").modal("hide");
        },

        editar(id){
            this.estado=false;
            this.id_grupo=id;
            $("#modalGrupo").modal("show");
            this.$http.get(Apigrupo + "/" + id).then((json)=>{
                this.nombre=json.data.nombre;
                this.descripcion=json.data.descripcion;
                this.num_personas=json.data.num_personas;
            }).catch((json)=>{
                console.log(json);
            })
        },

        actualizar(){
            let datos = {
                nombre:this.nombre,
                descripcion:this.descripcion,
                num_personas:this.num_personas
            };
            this.$http.patch(Apigrupo + "/" + this.id_grupo, datos).then(json=>{
                this.obtenerDatos();
                this.Alerta('Actualizacion','Grupo actualizado correctamente','success');
            }).catch(json=>{
                console.log(json)
            });
            $("#modalGrupo").modal("hide");
        },

        eliminar(id) {
            Swal.fire({
                title: "¿ESTA SEGURO DE ELIMINAR ESTE GRUPO?",
                text: "Si se elimina ya no se podra recuperar",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "¡si, eliminar!",
            }).then((result) => {
                if (result.isConfirmed) {
                    this.$http
                    .delete(Apigrupo + "/" + id)
                    .then((js) => {
                        this.obtenerDatos();
                    })

                    Swal.fire(
                        "¡ELIMINADO!",
                        "Grupo eliminado correctamente.",
                        "success"
                    );
                }
            });




        },




    }//fin de los metodos


})
