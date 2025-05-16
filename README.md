# Evento-Contabil-Desafio

---

# 📡 API de Gerenciamento de Evento

Esta API fornece endpoints para autenticação de usuários, gerenciamento de pessoas participantes, salas de treinamento e espaços de café em um evento de capacitação.

---

## 🔐 Autenticação

### 📥 Registro

`POST /api/register`

**Campos obrigatórios:**
```json
{
  "nome": "João Silva",
  "email": "joao@email.com",
  "password": "senha123",
  "password_confirmation": "senha123"
}
```

### 🔑 Login

`POST /api/login`

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

`GET /api/cafes`

**Resposta:**
```json
[
  {
    "id": 1,
    "nome": "Espaço A",
    "lotacao": 20
  }
]
```

### ➕ Criar Espaço

`POST /api/cafes`

**Body:**
```json
{
  "nome": "Espaço A",
  "lotacao": 20
}
```

### ✏️ Atualizar Espaço

`PUT /api/cafes/{id}`

**Body:**
```json
{
  "nome": "Espaço B",
  "lotacao": 25
}
```

### ❌ Remover Espaço

`DELETE /api/cafes/{id}`

---

## 🧑 Pessoa Participante

### 📄 Listar Pessoas

`GET /api/pessoas`

### ➕ Criar Pessoa

`POST /api/pessoas`

**Body:**
```json
{
  "nome": "Maria",
  "sobrenome": "Souza"
}
```

### ✏️ Atualizar Pessoa

`PUT /api/pessoas/{id}`

**Body:**
```json
{
  "nome": "Maria Clara",
  "sobrenome": "Souza"
}
```

### ❌ Remover Pessoa

`DELETE /api/pessoas/{id}`

---

## 🏫 Sala de Treinamento

### 📄 Listar Salas

`GET /api/salas`

### ➕ Criar Sala

`POST /api/salas`

**Body:**
```json
{
  "nome": "Sala 101",
  "lotacao": 40
}
```

### ✏️ Atualizar Sala

`PUT /api/salas/{id}`

**Body:**
```json
{
  "nome": "Sala 102",
  "lotacao": 50
}
```

### ❌ Remover Sala

`DELETE /api/salas/{id}`

---

## 📌 Observações

- Todas as rotas de `EspacoCafe`, `PessoaParticipante` e `SalaTreinamento` requerem autenticação via Bearer Token.
- As requisições devem ter o header:
  ```http
  Content-Type: application/json
  Accept: application/json
  Authorization: Bearer seu_token
  ```

---

## 🚀 Requisitos

- PHP 8+
- Laravel 10+
- MySQL
- Postman (ou similar para testar a API)

---

