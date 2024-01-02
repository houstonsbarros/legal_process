<h3 align="center">
    <img alt="Logo" title="#logo" width="300px" src="https://github.com/houstonsbarros/legal_process/assets/107281650/2c6b32ea-e4ff-40e7-9641-ed0a1d74c2f1">
</h3>
<h1 align="center">Sistema Jurídico</h1>
<h3 align="center">Projeto desenvolvido para a disciplina de Programação Web II do curso de Análise e Desenvolvimento de Sistemas do IFPI - Campus Parnaíba. O projeto consiste em um sistema de gerenciamento de processos jurídicos.
</h3>

## Índice

-   [Índice](#índice)
-   [Documentação](#documentação)
    -   [:rocket: Tecnologias:](#rocket-tecnologias)
    -   [:briefcase: Arquitetura e Design Patterns:](#briefcase-arquitetura-e-design-patterns)
    -   [:books: Ferramentas e componentes:](#books-ferramentas-e-componentes)
-   [Resultado](#resultado)
-   [Baixar o projeto](#baixar-o-projeto)
-   [Configuração](#configuração)
-   [Inicialização](#inicialização)
-   [Login](#login)

## Documentação

### :rocket: Tecnologias:

-   [PHP](https://www.php.net/)
-   [Laravel](https://laravel.com/)

### :briefcase: Arquitetura e Design Patterns:

-   [MVC](https://pt.wikipedia.org/wiki/MVC)

### :books: Ferramentas e componentes:

-   [Laravel Permission](https://spatie.be/docs/laravel-permission/v6/introduction)

## Resultado

-   [Clique aqui para ver o resultado](https://legal-process.fly.dev)

## Baixar o projeto

Primeiro passo, clonar o projeto:

```bash
# Clonar
git clone https://github.com/houstonsbarros/legal_process.git

# Acessar
cd legal_process
```

## Configuração

```bash
# Instalar dependências do projeto
composer install

# Copiar o arquivo .env.example para .env
cp .env.example .env

# Gerar a chave da aplicação
php artisan key:generate

# Criar as migrations (tabelas e Seeders)
php artisan migrate --seed
```

## Inicialização

```bash
# Para rodar o projeto
php artisan serve
```

## Login

O usuário de teste do advogado é:

```
email:    advogado@teste.com
senha: 123456
```

O usuário de teste do juiz é:

```
email: juiz@teste.com
senha: 123456
```

# Diagrama de Entidade e Relacionamento (DER)

![DER](https://github.com/houstonsbarros/legal_process/assets/107281650/731b4f1a-6de2-4cad-ac5a-b463722a10c3)

---

<h4 align="center">
    Feito com ❤ por <a href="https://www.linkedin.com/in/houston-barros/" target="_blank">Houston Barros</a>!
    <g-emoji class="g-emoji" alias="wave" fallback-src="https://github.githubassets.com/images/icons/emoji/unicode/1f44b.png">👋</g-emoji>
</h4>
