# Desafio Técnico Retta

Este projeto é um desafio técnico desenvolvido utilizando Laravel Sail para facilitar o ambiente de desenvolvimento com Docker.

## Passo a Passo para Configuração

Siga os comandos abaixo para clonar, configurar e iniciar o ambiente de desenvolvimento:

### 1. Clone o repositório

```sh
git clone https://github.com/alef-thallys/desafio-tecnico-retta.git
cd desafio-tecnico-retta/
```

### 2. Configure as variáveis de ambiente

Copie o arquivo de exemplo para criar seu `.env`:

```sh
cp .env.example .env
```

### 3. Instale as dependências do PHP

```sh
composer install
```

### 4. Inicialize o ambiente Docker com Laravel Sail

```sh
./vendor/bin/sail up -d
```

### 5. Gere a chave da aplicação

```sh
./vendor/bin/sail artisan key:generate
```

### 6. Execute as migrações do banco de dados

```sh
./vendor/bin/sail artisan migrate
```

### 7. Instale as dependências do Node.js

```sh
./vendor/bin/sail npm install
```

### 8. Execute o build de desenvolvimento do frontend

```sh
./vendor/bin/sail npm run dev
```

### 9. Inicie o processamento de filas

```sh
./vendor/bin/sail artisan queue:work
```

### 10. Sincronize os dados da câmara

```sh
./vendor/bin/sail artisan app:sincronizar-dados-camara
```

---

## Observações

- Certifique-se de ter o Docker instalado para utilizar o Laravel Sail.
- Todos os comandos acima devem ser executados na raiz do projeto.
- Consulte a documentação do Laravel ou Laravel Sail para mais detalhes sobre personalização do ambiente.

---

## Acesso ao Projeto

Após seguir todos os passos acima, acesse o sistema através do link:

[http://localhost](http://localhost)

---

## Licença

Este projeto está sob a licença MIT.