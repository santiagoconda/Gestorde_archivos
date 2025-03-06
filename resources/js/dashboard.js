// $(document).ready(function () {
//     if ($.fn.DataTable.isDataTable('#tb_archivos')) {
//         $('#tb_archivos').DataTable().destroy();
//     }

//     $('#tb_archivos').DataTable({
//         scrollX: true,
//         language: {
//             url: 'https://cdn.datatables.net/plug-ins/2.1.3/i18n/es-ES.json',
//         }
//     });
// });

new DataTable('#tb_archivos', {
    scrollX: true,
    language: {
        url: 'https://cdn.datatables.net/plug-ins/2.1.3/i18n/es-ES.json',
        
    },
    columnDefs: [
        {orderable: false, targets:[5]}
    ],
});

new DataTable('#tb_archivosgeneral', {
    scrollX: true,
    language: {
        url: 'https://cdn.datatables.net/plug-ins/2.1.3/i18n/es-ES.json',
        
    },
    columnDefs: [
        {orderable: false, targets:[4]}
    ],

    
}); 

new DataTable('#tb_usuers', {
    scrollX: true,
    language: {
        url: 'https://cdn.datatables.net/plug-ins/2.1.3/i18n/es-ES.json',
        
    },
    columnDefs: [
        {orderable: false, targets:[2]}
    ],

    
});  
new DataTable('#tb_archivosDocentes', {
    scrollX: true,
    language: {
        url: 'https://cdn.datatables.net/plug-ins/2.1.3/i18n/es-ES.json',
        
    },
    columnDefs: [
        {orderable: false, targets:[4]}
    ],

    
});  
new DataTable('#tb_archivosCalidad', {
    scrollX: true,
    language: {
        url: 'https://cdn.datatables.net/plug-ins/2.1.3/i18n/es-ES.json',
        
    },
    columnDefs: [
        {orderable: false, targets:[4]}
    ],

    
});  