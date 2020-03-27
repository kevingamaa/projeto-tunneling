## Installing
Para rodar o projeto localmente, você deve cumprir com os pré requisitos.
ter o **composer** instalado em sua maquina, junto ao básico e simples **LAMP**, **MAMP**, **WAMP** ou **XAMP** Tendo a versão do `php >=5.3.0`


Com tudo instalado corretamente, está na hora de baixar o repositório dentro da pasta localhost.

    git clone https://github.com/kevingamaa/projeto-tunneling.git

Agora acesse a pasta do projeto pelo terminal e rode o seguinte comando

    composer install

Logo depois configure seu arquivo .env para ter acesso ao banco de dados

    DB_DATABASE="tunneling"
    DB_USERNAME="youruser"
    DB_PASSWORD="yourpassword"

Depois do .env configurado, você vai encontrar um arquivo chamado **tunneling.sql** com a estrutura do banco de dados.

cria o banco de dados com nome "tunneling" e import a estrutura.
concluindo  todos os passos, o projeto estará disponível na seguinte url: http://localhost/projeto-tunneling/