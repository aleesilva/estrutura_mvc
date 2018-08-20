Descrição Do Teste.
Para realizar essa, aplicação teste, criei uma estrutura mvc própria, me baseando um pouco no core do CodeIgniter(https://www.codeigniter.com/). Utilizei um arquivo core, com autoload, para criar a estrutura de modelos, views, controllers e actions.
O model principal contem a conexão com o banco de dados,Mysql(com PDO), a conexão é feita, pela função Conectar que retorna a conexão no final que eh colocada, em uma variavel publica, que pode ser utilizada, por todos os modelos que herdam de model.
O controller principal, contem as funcao de carregar, a view função essa que se chama(view_load), que recebe como parametros, a view e os dados que serão transportadas para a mesma, contem a função input que basicamente me elemina a utilização da Global $_POST, passando assim o nome do input que, está trazendo meus dados, para poder tratar os mesmo, o controller principal, contem tambem as funções de criptografar e descriptografar baseadas na cifra de césar.
No controller Dispositivos, contem todo o crud, que foi solicitado, para os dispositvos.
O controller comando herda do controller dispositivos, para poder ter informações dos dispositivos e assim enviar comandos ao mesmo.
O controller criptografia, recebe o texto a ser criptografado, e envia para o controller principal, ontem o mesmo tem a função de criptografar, o texto enviar e descriptografar, dependendo da opção do usuário.
O controller CompararHashes, fica encarregado de cuidar da comparação de hashes e da criação de hashes a partir do texto digitado pelo usuario.
A criação do layout ficou, por conta da framework css (bootstrap).
E o banco utilizado, foi o mysql, estou enviando um script do mesmo, para ser rodado, antes do teste da aplicação o nome do arquivo é (sql_teste_mt4_aleson.sql).