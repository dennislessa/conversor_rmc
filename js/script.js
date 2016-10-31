$(function () {
    var btnGerar = $('#btn_gerar');
    var script = $('#script');

    btnGerar.click(function () {
        var file = $('#arquivo').get(0).files[0];
        var reader = new FileReader();
        var action = $('#acao').val();

        if (file && action) {
            reader.readAsText(file);
            reader.onload = function () {
                if (reader.readyState === 2) {
                    var content = reader.result;
                    var dependencias = get_dependencias((new DOMParser()).parseFromString(reader.result, 'text/html')) || null;
                    var classes = get_classes((new DOMParser()).parseFromString(reader.result, 'text/html')) || null;
                    
                    $.post('proc/processar.php', {
                        acao: action,
                        classes: classes,
                        conteudo: content,
                        dependencias: dependencias
                    }, function (resposta) {
                        script.html(resposta);
                    });
                }
            };
        } else {
            alert('VOCÊ NÃO ESCOLHEU UMA AÇÃO OU UM ARQUIVO.');
        }

        return false;
    });
});

function get_dependencias(doc) {
    var dependencias = doc.querySelectorAll('td.dependency');
    var depends = [];

    for (i = 0, j = dependencias.length; i < j; i++) {
        depends.push(dependencias[i].title.replace(' → ', ' '));
    }
    
    return depends;
}

function get_classes(doc) {
    var linhas = doc.querySelectorAll('tbody tr');
    var classes = linhas[0];
    var listClasses = [];

    for (var i = 1, j = $(classes).children().length; i < j; i++) {
        var classe = $(classes).children().get(i).title;

        listClasses.push(classe);
    }
    
    return listClasses;
}