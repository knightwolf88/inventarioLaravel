InstanciarTabla()

const ModalProducto = new bootstrap.Modal(document.querySelector('#modal-producto'));

const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
});

function alerta(tipo, mensaje) {

    Toast.fire({
        icon: tipo,
        title: mensaje
    })
}

function InstanciarTabla() {
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    tablaListado = new DataTable('#tablaListado', {
        ajax: {
            url: "/inventarioLaravel/public/productos/listar", // Reemplaza con la URL de tu servidor PHP que proporciona los datos
            type: "POST", // Método HTTP para la solicitud
            dataType: "json",
            data: {},
            headers: {
                'X-CSRF-TOKEN': csrfToken
            }
        },
        destroy: true,
        processing: true,
        serverSide: false,
        responsive: true,
        stateSave: true,
        // scrollX: true, // Habilitar scroll horizontal
        language: {
            "decimal": "",
            "emptyTable": "No hay información",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
            "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
            "infoFiltered": "(Filtrado de _MAX_ total entradas)",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": "Mostrar _MENU_ Entradas",
            "loadingRecords": "Cargando...",
            "processing": "Procesando...",
            "search": "Buscar:",
            "zeroRecords": "Sin resultados encontrados",
            "paginate": {
                "first": "Primero",
                "last": "Ultimo",
                "next": ">",
                "previous": "<"
            }
        },
        deferRender: true
    });
    $('#tablaListado').DataTable().search('').draw();
}

function limpiar() {
    document.getElementById('idproducto').value = '';
    document.getElementById('nombre').value = '';
}

function editarModal(id) {
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    document.getElementById('idproducto').value = id;

    const data = new FormData();
    data.append('idproducto', id);
    fetch('/inventarioLaravel/public/productos/datosProducto', {
        method: 'POST',
        body: data,
        headers: {
            'X-CSRF-TOKEN': csrfToken
        }
    })
        .then(function (response) {
            if (response.ok) {
                return response.json()
            } else {
                throw "error ajax";
            }
        })
        .then(function (data) {
            console.log(data);
            document.getElementById('nombre').value = data.nombre;
        })
        .catch(function (error) {
            console.log(error);
        });
}



function guardar() {
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    let url = '';
    const formProducto = new FormData(document.getElementById('anadirfrm'));   
    if (document.getElementById('idproducto').value == '') {
        url = '/inventarioLaravel/public/productos/insertar';
    } else {
        url = '/inventarioLaravel/public/productos/editar';
    }
    //realizamos la peticion ajax
    fetch(url, {
        method: 'POST',
        body: formProducto,
        headers: {
            'X-CSRF-TOKEN': csrfToken
        }
    })
        .then(function (response) {
            if (response.ok) {
                return response.json()
            } else {
                throw "error ajax";
            }
        })
        .then(function (data) {
            if (data.status == 'success') {
                alerta('success', data.message)
                InstanciarTabla();
                ModalProducto.hide();
                limpiar();
            } else {
                alerta('error', data.message)
            }
            console.log(data);
        })
        .catch(function (error) {
            console.log(error);
        });
}

function estado(id,estado) {
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    const data = new FormData(); 
    data.append("idproducto",id);
    data.append("estado",estado);  
    //realizamos la peticion ajax
    fetch('/inventarioLaravel/public/productos/estado', {
        method: 'POST',
        body: data,
        headers: {
            'X-CSRF-TOKEN': csrfToken
        }
    })
        .then(function (response) {
            if (response.ok) {
                return response.json()
            } else {
                throw "error ajax";
            }
        })
        .then(function (data) {
            if (data.status == 'success') {
                alerta('success', data.message)
                InstanciarTabla();          
            } else {
                alerta('error', data.message)
            }
            console.log(data);
        })
        .catch(function (error) {
            console.log(error);
        });
}