$(async ()=>{
    $('#summernote').summernote({
        placeholder: 'Insira o texto aqui',
        tabsize: 4,
        height: 240,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['']],
            ['insert', []],
            ['view', ['codeview']]
        ]
    });
})();