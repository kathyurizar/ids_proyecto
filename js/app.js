const app = new Vue({
    el: '#app',
    data: {
        user: '',
        pass: '',
        respuesta: '',
        alertIsOpen: false,
        seleccion: '',
        horome: '',
        nuevoHorometros: false,
        estado: 1 //esta variable controla el boton de envio de formularios
    },
    computed: {
        deshabilitado() {
            return this.estado === 0;
        }
    },
    methods: {
        login() {
            const form = document.getElementById('inicioSesion');
            axios.post('../../controller/loginController.php', new FormData(form))
                .then(res => {
                    this.respuesta = res.data
                    if (this.respuesta == 1) {
                        location.href = '../../views/home';
                    } else {

                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'No fue posible actualizar los datos',
                            footer: 'Verifica que los datos sean correctos'
                        })
                    }
                });
        },
        agregarUsuarios() {
            const form = document.getElementById('agregarUsuario');
            this.estado = 0;
            axios.post('../../controller/usuarioController.php', new FormData(form))
                .then(res => {
                    this.respuesta = res.data
                    if (this.respuesta == 1) {
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Resgistro Exitoso',
                            showConfirmButton: false,
                            allowOutsideClick: false,
                            footer: '<a href="../usuarios/listadoUsuarios.php" class="btn btn-primary">Continuar</a>'
                        })
                        this.estado = 1;
                    } else {

                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'No fue posible actualizar los datos',
                            footer: 'Verifica que los datos sean correctos'
                        })
                        this.estado = 1;
                    }
                });
        },
        modificarUsuarios() {
            const form = document.getElementById('modificarUsuario');
            this.estado = 0;
            axios.post('../../controller/usuarioController.php', new FormData(form))
                .then(res => {
                    this.respuesta = res.data
                    if (this.respuesta == 1) {
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Se han guardado los cambios',
                            showConfirmButton: false,
                            allowOutsideClick: false,
                            footer: '<a href="../usuarios/listadoUsuarios.php" class="btn btn-primary">Continuar</a>'
                        })
                        this.estado = 1;
                    } else {

                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            html: this.respuesta,
                            text: 'No fue posible actualizar los datos'
                        })
                        this.estado = 1;
                    }
                });
        }
    }
})