<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Scripts TCC</title>

        <link rel="stylesheet" href="css/style.css"/>

        <script src="js/jquery.min.js"></script>
        <script src="js/script.js"></script>
    </head>
    <body>
        <header>
            <h1>Scripts TCC</h1>
        </header>

        <section id="form">
            <select id="acao">
                <option>Escolha uma ação:</option>

                <optgroup label="Gerar scripts">
                    <option value="gerar_bunch">Gerar script BUNCH</option>
                    <option value="gerar_tgf">Gerar script TGF</option>
                    <option value="gerar_rsf">Gerar script ACDC</option>
                    <option value="gerar_csv">Gerar script Weka</option>
                </optgroup>

                <optgroup label="Converter scripts">
                    <option value="converter_bunch">Converter .bunch para .rsf</option>
                    <option value="converter_arff">Converter .arff para .rsf</option>
                    <option value="converter_arqref">Converter ArqRef para .rsf</option>
                    <option value="rsf_to_model_analizo">Converter .rsf para modelo analizo</option>
                </optgroup>

                <optgroup label="Converter scripts">
                    <option value="conta_cluster">Contar cluster (arquivos em .rsf)</option>
                </optgroup>
            </select>

            <input type="file" id="arquivo"/>

            <input type="button" id="btn_gerar" value="Gerar script"/>
        </section>

        <section id="script"></section>
    </body>
</html>
