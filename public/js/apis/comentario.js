var ruta =document.querySelector("[name=route]").value;


new Vue({
    el:"#comentario",
    data:{
        comentarios:[],
        clientes:[],
        descripcion:'',
        mostrar:false,
        emailconfirm:'',
        nombreCliente:'',
    },
    created:function(){
        this.obtenerdatos();
        this.obtenerclientes();
    },

    methods:{
        obtenerdatos(){
            this.$http.get('comentarioApi').then(json=>{
                this.comentarios=json.data;
            }).catch(json=>{
                console.log(json);
            })
        },

        Alerta(titulo,mensaje,tipo){
            Swal.fire(
                titulo,
                mensaje,
                tipo,
            );
        },
        obtenerclientes(){
            this.$http.get('clientes2').then(json=>{
                this.clientes = json.data;
            }).catch(json=>{
                console.log(json);
            })
        },
        verificarEmail(){
            var emailc = this.emailconfirm.trim();
            var datosClientes=[];
            for(const i in this.clientes){
                datosClientes.push(this.clientes[i].email);
            }
            let verificar = datosClientes.indexOf(emailc);

            var registros =[];
            var registros2=[];
            for(const i in this.comentarios){
                if(this.comentarios[i].email_cliente == emailc){
                    registros.push(this.comentarios[i].email_cliente);
                }else{
                    registros2.push(this.comentarios[i].email_cliente);
                }
            }
            var nombre = [];
            for(const i in this.clientes){
                if(this.clientes[i].email == emailc){
                    nombre.push(this.clientes[i].nombre);
                }
            }

            this.nombreCliente = nombre[0];
            let contaremails = registros.length;
            if(verificar == -1){
                this.Alerta('Oops...¡¡¡¡','Lo sentimos, pero este correo no se tiene registrado','error')
                this.mostrar = false;
            }else if(contaremails >= 2){
                this.Alerta('Limite','Lo sentimos, solo se permite hacer 2 comentarios','warning')
                this.mostrar = false;
            }else{
                this.mostrar = true
            }

        },

        redireccionar(){
            window.location.href = ruta
        },

        Guardar(){
            if(_.isEmpty(this.descripcion) == true){
                this.Alerta('Falta comentario','Por favor, coloque un comentario','warning')
            }else{
            var dato = {
                descripcion:this.descripcion,
                email_cliente:this.emailconfirm,
                nombre:this.nombreCliente
            }

            this.$http.post('comentarioApi',dato).then(json=>{
                this.descripcion="";
                this.emailconfirm="";
                this.Alerta('Envio exitoso','Gracias por su opinion, estamos para serviles','success');
            setTimeout(this.redireccionar,3000);
            }).catch(json=>{
                console.log(json);
            })
        }
        },
    },
})
