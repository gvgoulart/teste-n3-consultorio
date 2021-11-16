<h1>Tecnologias utilizadas</h1>
<ul>
    <li>Laravel</li>
        <ol> 
            <li>Laravel Jetstream(Autenticação)</li>
            <li>Laravel Passport(API OAuth 2.0)</li>
            <li>Laravel Laradock(Docker)</li>
        </ol>
</ul>

<h1>Instruções para instalação:</h1>

Após a clonagem do repositório, fazer a instalação do composer na raíz do projeto:
```
composer install
```
Fazer a configuração do arquivo .env copiando o arquivo .env.example:
```
cp .env.example .env
```
Após a configuração do banco de dados em .env, executar as migrations:
```
php artisan migrate:fresh
```
Após a criação das tabelas, executar as seeds para teste:
```
php artisan db:seed
```


Para geração das chaves de uso do passport:
```
php artisan passport:install
```

Caso a instalação do passport de erro siga os seguintes passos:
```
php artisan cache:clear
```

```
php artisan config:clear
```

```
composer dump-autoload
```
E se mesmo assim não der certo
![image](https://user-images.githubusercontent.com/71338619/130554717-6dd846c5-a48e-494a-8d15-a9ff5ec51bdd.png)

Exclua a linha 28
```
php artisan passport:install
```
E insira ela novamente

<h3> Caso queira utilizar pelo laradocker </h3>

Entre na raiz do laradock
```
cd laradock
```

Copie o .env
```
cp .env.example .env
```
altere as portas como desejar e run nos containers

```
docker-compose up -d nginx mysql phpmyadmin redis workspace 
```

Altere o .env do projeto para

```
DB_HOST=mysql
USER MYSQL=root
PASSWORD MYSQL=root
REDIS_HOST=redis
QUEUE_HOST=beanstalkd
```

Vai ser necessário gerar keys e também criar o banco de dados no Mysql! Recomendo utilizar a porta do phpmyadmin
