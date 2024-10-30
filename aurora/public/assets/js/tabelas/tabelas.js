// Funçao para ordenar pela coluna data da tabela tableAtualizacoes e tableHomeAdm
$.fn.dataTable.ext.type.order['datetime-dd-mm-yyyy-hh:mm:ss-pre'] = function(d) {
    // Separa a data e a hora
    var parts = d.split(' às ');
    var datePart = parts[0].split('/');
    var timePart = parts[1].split(':');

    // Converte para o formato yyyy/mm/dd HH:MM:SS
    return new Date(
        datePart[2],        // Ano
        datePart[1] - 1,    // Mês (baseado em zero)
        datePart[0],        // Dia
        timePart[0],        // Hora
        timePart[1],        // Minutos
        timePart[2]         // Segundos
    );
};

// Função para ordenação pela data da tabela tableCli
$.fn.dataTable.ext.type.order['date-dd-mm-yyyy-pre'] = function(d) {
    var parts = d.split('/');
    return new Date(parts[2], parts[1] - 1, parts[0]);
};

var tableAtualizacoes = new DataTable('#myTableAtualizacoes', {
    language: {
        url: 'https://cdn.datatables.net/plug-ins/2.0.8/i18n/pt-BR.json',
    },  
    "paging": true,
    "lengthChange": false,
    "pagingType": 'simple_numbers',
    "ordering": true,
    "info": true,
    "autoWidth": false,
    "responsive": true,     
	columnDefs: [
        { width: '180px', targets: 0 },                                       // Define a largura máxima para a primeira coluna (índice 0)
        { width:  '90px', targets: 1 },                                       // Define a largura máxima para a segunda  coluna (índice 1)
		{ width: '200px', targets: 2, type: 'datetime-dd-mm-yyyy-hh:mm:ss' }, // Define a largura máxima para a terceira coluna (índice 2) - Chama a função de ordenação de coluna
		{ width: '200px', targets: 3 },                                       // Define a largura máxima para a quarta   coluna (índice 3)
        { width: '600px', targets: 4 },                                       // Define a largura máxima para a quinta   coluna (índice 4)
        
        
    ],
    order: [[2, 'desc']]
});

var tableHomeAdm = new DataTable('#myTableHomeAdm', {
    language: {
        url: 'https://cdn.datatables.net/plug-ins/2.0.8/i18n/pt-BR.json',
    },  
    "paging": true,
    "lengthChange": false,
    "pagingType": 'simple_numbers',
    "ordering": true,
    "info": true,
    "autoWidth": false,
    "responsive": true,    
    columnDefs: [
		{ targets: 3, type: 'datetime-dd-mm-yyyy-hh:mm:ss' }, // Define a largura máxima para a quarta   coluna (índice 3) - Chama a função de ordenação de coluna
    ], 
    order: [[3, 'desc']]
});

var tableCli = new DataTable('#myTableCli', {
    language: {
        url: 'https://cdn.datatables.net/plug-ins/2.0.8/i18n/pt-BR.json',
    },  
    "paging": true,
    "lengthChange": false,
    "pagingType": 'simple_numbers',
    "ordering": true,
    "info": true,
    "autoWidth": false,
    "responsive": true,   
	columnDefs: [
        { width: '160px', targets: 0 },                           // Define a largura máxima para a primeira coluna (índice 0)
        { width:  '90px', targets: 1 },                           // Define a largura máxima para a segunda  coluna (índice 1)
		{ width: '800px', targets: 2 },                           // Define a largura máxima para a terceira coluna (índice 2)
		{ width: '120px', targets: 3,  type: 'date-dd-mm-yyyy' }, // Define a largura máxima para a quarta   coluna (índice 3) - Chama a função de ordenação de coluna
        { width: '100px', targets: 4 },                           // Define a largura máxima para a quinta   coluna (índice 4)
        
        
    ],
    order: [[3, 'desc']]
});

var tableUsuarios = new DataTable('#myTableUsuarios', {
    language: {
        url: 'https://cdn.datatables.net/plug-ins/2.0.8/i18n/pt-BR.json',
    },  
    "paging": true,
    "lengthChange": false,
    "pagingType": 'simple_numbers',
    "ordering": true,
    "info": true,
    "autoWidth": false,
    "responsive": true,   
    order: [[3, 'asc']]
});

var tableEmpresas = new DataTable('#myTableFotos', {
    language: {
        url: 'https://cdn.datatables.net/plug-ins/2.0.8/i18n/pt-BR.json',
    },  
    "paging": true,
    "lengthChange": false,
    "pagingType": 'simple_numbers',
    "ordering": true,
    "info": true,
    "autoWidth": false,
    "responsive": true,   
    order: [[0, 'desc']]
});

var tableAdministradores = new DataTable('#myTableAdministradores', {
    language: {
        url: 'https://cdn.datatables.net/plug-ins/2.0.8/i18n/pt-BR.json',
    },  
    "paging": true,
    "lengthChange": false,
    "pagingType": 'simple_numbers',
    "ordering": true,
    "info": true,
    "autoWidth": false,
    "responsive": true,   
    order: [[0, 'desc']]
});

var tableTipos = new DataTable('#myTableTipos', {
    language: {
        url: 'https://cdn.datatables.net/plug-ins/2.0.8/i18n/pt-BR.json',
    },  
    "paging": true,
    "lengthChange": false,
    "pagingType": 'simple_numbers',
    "ordering": true,
    "info": true,
    "autoWidth": false,
    "responsive": true,   
    order: [[0, 'desc']]
});