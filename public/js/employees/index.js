var employees_table = $('#employees-table').DataTable({
    "ajax": "/employees/getJson",
    "responsive": true,
    "processing": true,
    "info": true,
    "showNEntries": true,
    "dom": 'Bfrtip',

    lengthMenu: [
        [ 10, 25, 50, -1 ],
        [ '10 filas', '25 filas', '50 filas', 'Mostrar todo' ]
    ],

    "buttons": [
    'pageLength',
    'excelHtml5',
    'csvHtml5'
    ],

    "paging": true,
    "language": {
        "sdecimal":        ".",
        "sthousands":      ",",
        "sProcessing":     "Procesando...",
        "sLengthMenu":     "Mostrar _MENU_ registros",
        "sZeroRecords":    "No se encontraron resultados",
        "sEmptyTable":     "Ningún dato disponible en esta tabla",
        "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix":    "",
        "sSearch":         "Buscar:",
        "sUrl":            "",
        "sInfoThousands":  ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
            "sFirst":    "Primero",
            "sLast":     "Último",
            "sNext":     "Siguiente",
            "sPrevious": "Anterior"
        },
        "oAria": {
            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        },
    },
    "order": [0, 'desc'],

    "columns": [
    {
        "title": "Código",
        "data": "code",
        "width" : "20%",
        "responsivePriority": 2,
        "render": function( data, type, full, meta ) {
            return (data);},
    },
    {
        "title": "Nombres",
        "data": "first_name",
        "width" : "20%",
        "responsivePriority": 2,
        "render": function( data, type, full, meta ) {
            return (data);},
    },
    {
        "title": "Apellidos",
        "data": "last_name",
        "width" : "20%",
        "responsivePriority": 2,
        "render": function( data, type, full, meta ) {
            return (data);},
    },
    {
        "title": "Fecha de nacimiento",
        "data": "birth_date",
        "width" : "20%",
        "responsivePriority": 2,
        "render": function( data, type, full, meta ) {
            return (data);},
    },
    {
        "title": "Departamento",
        "data": "department.name",
        "width" : "20%",
        "responsivePriority": 2,
        "render": function( data, type, full, meta ) {
            return (data);},
    },

    {
        "title": "Acciones",
        "orderable": false,
        "width" : "20%",
        "render": function(data, type, full, meta) {

        return "<div id='" + full.id + "' class='text-center'>" +
        "<div class='float-left col-lg-6'>" +
        "<a href='employee/"+full.id+"' class='edit-empleado'  >" +
        "<i class='fa fa-btn fa-edit' title='Editar Empleado'></i>" +
        "</a>" + "</div>" +
        "<div class='float-right col-lg-6'>" +
        "<a href='employee/"+full.id+"' class='remove-empleado'"+ "data-method='delete'"+ ">" +
        "<i class='fa fa-thumbs-down' title='Desactivar Empleado'></i>" +
        "</a>"
       +"</div>";

        },
        "responsivePriority": 5
    }]

});

//Desactivar Empleado
$(document).on('click', 'a.remove-empleado', function(e) {
    e.preventDefault(); // does not go through with the link.

    var $this = $(this);

    alertify.confirm('Desactivar Empleado', 'Esta seguro de desactivar el empleado',
        function(){
            $.post({
                type: $this.data('method'),
                url: $this.attr('href'),
                headers: {'X-CSRF-TOKEN': $('#tokenEmployee').val()},
            }).done(function (data) {
                employees_table.ajax.reload();
                    alert('Empleado Desactivado con Éxito!!');
            });
         }
        , function(){
            alertify.set('notifier','position', 'top-center');
            alertify.error('Cancel')
        });
});
