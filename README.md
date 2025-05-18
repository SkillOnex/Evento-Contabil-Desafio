# Evento-Contabil-Desafio

---

# Sistema de Gerenciamento de Evento

Este sistema permite o cadastro e a alocação de pessoas em salas de treinamento e espaços de café durante diferentes etapas de um evento.

## 🚀 Como iniciar o sistema

## 🚀 Requisitos

- PHP 8+
- Laravel 10+
- MySQL
- Postman (ou similar para testar a API)
- Docker 

---


1. **Criar e subir o Docker**:

   ```bash
   docker-compose up -d --build
   ```

2. **Acessar o container e rodar as migrations**:

   ```bash
   docker exec -it evento-contabil bash
   php artisan migrate
   ```

3. **Acessar a aplicação no navegador**:

   Acesse: [http://localhost:8000](http://localhost:8000)

## 🔐 Fluxo de Autenticação

- A aplicação redireciona para a página de **login**.
- Clique em **"Registre-se"** para se cadastrar.
- Após o cadastro, faça o **login**.
- Após o login, você será redirecionado para a página `/eventos`.

## 🧭 Funcionalidades

### Aba Pessoa

- Buscar pessoa pelo nome e visualizar suas informações.
- Cadastrar nova pessoa:
  - Preencha duas etapas com: **Nome**, **Sobrenome**, **Salas** e **Cafés**.

### Aba Salas

- Visualizar as salas cadastradas e as pessoas alocadas nelas.
- Cadastrar nova sala com **Nome** e **Lotação**.

### Aba Café

- Visualizar os cafés cadastrados e as pessoas alocadas.
- Cadastrar novo café com **Nome** e **Lotação**.

## 🧪 Executar os testes

Para rodar apenas os testes unitários:

```bash
php artisan test --testsuite=Unit
```

---

# 📡 API de Gerenciamento de Evento

Esta API fornece endpoints para autenticação de usuários, gerenciamento de pessoas participantes, salas de treinamento e espaços de café em um evento de capacitação.

---

## 🔐 Autenticação

### 📥 Registro

`POST http://localhost:8000/api/register`

**Campos obrigatórios:**
```json
{
  "name": "João Silva",
  "email": "joao@email.com",
  "password": "senha123",
  "password_confirmation": "senha123"
}
```

### 🔑 Login

`POST http://localhost:8000/api/login`

**Campos:**
```json
{
  "email": "joao@email.com",
  "password": "senha123"
}
```

**Resposta:**
```json
{
  "access_token": "seu_token_aqui",
  "token_type": "Bearer"
}
```

> Use o token em todas as requisições protegidas, adicionando no header:
```http
Authorization: Bearer seu_token_aqui
```

---

## ☕ Espaço Café

### 📄 Listar Espaços

`GET http://localhost:8000/api/cafes`

**Resposta:**
```json
[
  {
    "id": 1,
    "nome": "Espaço A",
    "lotacao": "20"
  }
]
```

### ➕ Criar Espaço

`POST http://localhost:8000/api/cafes`

**Body:**
```json
{
  "nome": "Espaço A",
  "lotacao": "20"
}
```

### ✏️ Atualizar Espaço

`PUT http://localhost:8000/api/cafes/{id}`

**Body:**
```json
{
  "nome": "Espaço B",
  "lotacao": "25"
}
```

### ❌ Remover Espaço

`DELETE http://localhost:8000/api/cafes/{id}`

---

## 🧑 Pessoa Participante

### 📄 Listar Pessoas

`GET http://localhost:8000/api/pessoas`

### ➕ Criar Pessoa

`POST http://localhost:8000/api/pessoas`

**Body:**
```json
{
  "nome": "Maria",
  "sobrenome": "Souza"
}
```

### ✏️ Atualizar Pessoa

`PUT http://localhost:8000/api/pessoas/{id}`

**Body:**
```json
{
  "nome": "Maria Clara",
  "sobrenome": "Souza"
}
```

### ❌ Remover Pessoa

`DELETE http://localhost:8000/api/pessoas/{id}`

---

## 🏫 Sala de Treinamento

### 📄 Listar Salas

`GET http://localhost:8000/api/salas`

### ➕ Criar Sala

`POST http://localhost:8000/api/salas`

**Body:**
```json
{
  "nome": "Sala 101",
  "lotacao": "40"
}
```

### ✏️ Atualizar Sala

`PUT http://localhost:8000/api/salas/{id}`

**Body:**
```json
{
  "nome": "Sala 102",
  "lotacao": "50"
}
```

### ❌ Remover Sala

`DELETE http://localhost:8000/api/salas/{id}`

---

## 📌 Observações

- Todas as rotas de `Café`, `Pessoas` e `Salas` requerem autenticação via Bearer Token.
- As requisições devem ter o header:
  ```http
  Content-Type: application/json
  Accept: application/json
  Authorization: Bearer seu_token
  ```

---


