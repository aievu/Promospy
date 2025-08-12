# 🕵️‍♂️ Promospy

Promospy é um site de promoções colaborativo onde os usuários podem publicar e salvar produtos em oferta. Os produtos mais bem avaliados pela comunidade ganham destaque na plataforma.

## ✨ Funcionalidades

- Registro e login de usuários
- Publicação de produtos com:
- Nome, descrição, preço, imagem, URL de compra, loja vendedora e categoria
- Visualização dos próprios produtos (editar/deletar)
- Sistema de favoritos
- Visualização de favoritos por usuário
- Preview ao vivo dos campos de publicação
- Validações robustas no backend para evitar dados maliciosos

## 🚀 Como rodar o projeto

### ✅ Pré-requisitos

Antes de começar, instale:

- PHP 8.2+
- Composer
- Node.js + NPM
- MySQL 8 ou MariaDB

### ⚙️ Instalação

1. Clone o repositório:

```bash
git clone https://github.com/aievu/Promospy
cd promospy
```

2. Instale as dependências PHP:

```bash
composer install
```

3. Copie o `.env.example` e configure o `.env`:

```bash
cp .env.example .env
```

Edite as variáveis de ambiente no `.env`:

```dotenv
DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=promospy
DB_USERNAME=seu_usuario
DB_PASSWORD=sua_senha
```

4. Gere a chave da aplicação:

```bash
php artisan key:generate
```

5. Crie as tabelas e rode o seeder para cirar as categorias e o admin no banco:

```bash
php artisan migrate --seed
```

6. Instale as dependências front-end e compile os assets:

```bash
npm install
npm run dev
```

7. Inicie o servidor:

```bash
php artisan serve
ou
composer run dev
```

Acesse no navegador: [http://localhost:8000](http://127.0.0.1:8000)

## 🛠️ Tecnologias utilizadas

- **Laravel 12**
- **PHP 8.2**
- **MySQL**
- **Blade**
- **JavaScript (ES6)**
- **HTML5 + CSS3**
- **Font Awesome** para ícones

## 💡 Observações

- Ainda em fase inicial de design, melhorias visuais futuras
- Docker ainda em fase de implementação

## Autor

Desenvolvido por Humberto.