# 📋 Sistema de Cadastro de Clientes

## 🌟 Visão Geral
Sistema completo para cadastro e gerenciamento de clientes com integração de CEP via API externa, desenvolvido em PHP para o backend e React para o frontend.

---

## 🛠 Tecnologias

### Backend
| Tecnologia       | Descrição                           |
|-----------------|----------------------------------|
| PHP            | Linguagem de programação            |
| Composer       | Gerenciador de dependências PHP  |
| PDO            | Interface para banco de dados   |
| PostgreSQL     | Banco de dados utilizado       |
| ViaCEP API     | Integração para consulta de CEPs |

### Frontend
| Tecnologia       | Descrição                           |
|-----------------|----------------------------------|
| React          | Biblioteca para interfaces web   |
| React Router   | Gerenciamento de rotas          |
| Axios          | Cliente HTTP para APIs          |
| Styled Components | Estilização com CSS-in-JS |

---

## 🚀 Instalação

### **Pré-requisitos**
- PHP 8+
- Composer instalado
- Banco de dados PostgreSQL
- Node.js v16+
- npm ou yarn

### **Clonar o repositório**
```sh
git clone https://github.com/seuusuario/seurepositorio.git
cd seurepositorio
```

### **Configurar o Backend (PHP)**
```sh
cd backend

# Instale as dependências do PHP
composer install

# Configure o arquivo de ambiente
  cp config/config.ini.example config/config.ini

# Edite `config.ini` conforme necessário, definindo as credenciais do PostgreSQL

# Execute as migrações do banco de dados
php migrate.php up

# Inicie o servidor embutido do PHP
php -S localhost:8000 -t public
```

### **Configurar o Frontend (React)**
```sh
cd frontend

# Instale as dependências
npm install

# Configure as variáveis de ambiente
cp .env.example .env

# Inicie a aplicação React
npm start
```

---

## 🔍 Endpoints da API

| Método | Endpoint          | Descrição                 |
|---------|------------------|---------------------------|
| GET     | /clientes        | Lista todos os clientes   |
| POST    | /clientes        | Cria um novo cliente      |

---

## 🎯 Funcionalidades

### **Cadastro de Clientes**
- Formulário com validação
- Autocompletar endereço via CEP
- Persistência no banco de dados

### **Listagem**
- Visualização completa dos dados
- Ordenação por colunas

---

## 🛠 Comandos Úteis

| Comando              | Descrição                             |
|----------------------|---------------------------------|
| `php migrate.php up`   | Aplica as migrações do banco de dados |
| `php migrate.php down` | Reverte as migrações              |
| `php -S localhost:8000 -t public` | Inicia o servidor local |
| `npm start` | Inicia o frontend React |

---

## 🤝 Como Contribuir

1. Faça um **fork** do projeto.
2. Crie uma **branch** (`git checkout -b feature-minha-feature`).
3. **Commit** suas mudanças (`git commit -m 'Adiciona nova funcionalidade'`).
4. **Push** para a branch (`git push origin feature-minha-feature`).
5. Abra um **Pull Request**.

🚀 Agora você tem um README bem estruturado para o seu sistema PHP e React!

