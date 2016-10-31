# Conversor RMC

O Conversor RMC (um acrônimo para RSF, MDG e CSV) é um conversor para DSM em HTML desenvolvido para auxiliar na execução de algoritmos utilizados para a recuperação de arquitetura:
* ACDC
* Bunch
* LIMBO
* MoJo

### Formato RSF

O formato RSF é o formato gerado pela ferramenta Rigi Editor utilizado para representar os diversos tipos de relacionamentos entre os elementos de um sistema. Seu formato está representado abaixo.

RelationshipType Module1 Module2

Em RelationshipType representa o tipo do relacionamento (contain, call, depend, etc) entre Module1 e Module2 e estes representam os elementos do sistemas. Para este trabalho foi considerado apenas o tipo depend para representar a dependência entre os módulos 1 e 2, isto é, o elemento 1 depende do módulo 2, como apresentado abaixo.

depend Module1 Module2

Também é possível representar agrupamentos de um sistema utilizando o formato RSF. Para isso, é necessário que o tipo de relacionamento seja contain e o Module1 deve representar um cluster. Um cluster é representado com o sufixo .ss ao final do nome do módulo.

contain Cluster.ss Module2

Esse formato tem como relacionamento o valor contain que significa que o Cluster.ss contém o elemento Module2. O formato RSF é requerido pelas ferramentas ACDC e MoJo. A primeira ferra menta tem como input e output arquivos de formato RSF. Como entrada o arquivo deve ter relacionamento depend expressando o relacionamento de dependência entre as entidades do sistema. A saída gerada pela ferramenta é um arquivo de mesmo formato contendo o agrupamento do sistema. A segunda ferramenta, MoJo, tem como inputs dois arquivos de formato RSF representando agrupamentos.

O primeiro arquivo deve ser a saída gerada por algum algoritmo de agrupamento e o segundo deve ser um agrupamento realizado por um especialista. A saída gerada pela métrica é um número inteiro positivo expressando a quantidade mínima de operações necessárias para se transformar o primeiro agrupamento no segundo.
