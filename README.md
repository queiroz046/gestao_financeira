 Sistema de Gestão Financeira Pessoal

O objetivo deste sistema é permitir que o usuário tenha um controle centralizado de suas receitas e despesas, facilitando a organização do orçamento pessoal.

Tecnologias Utilizadas

- **Backend:** PHP 8.x com framework Laravel
- **Frontend:** Tailwind CSS e Blade Templates
- **Banco de Dados:** SQLite (para desenvolvimento)
- **Controle de Versão:** Git e GitHub

Funcionalidades

-  Autenticação de usuários (Login/Registro).
-  Gestão de categorias de transações (Receitas e Despesas).
-  Registro, edição e exclusão de transações financeiras.
- Dashboard com resumo financeiro (Total de Receitas vs Despesas).
- Interface responsiva e otimizada.

 Como rodar o projeto localmente

1. Clone o repositório:

   git clone [https://github.com/SEU_USUARIO/gestao_financeira.git](https://github.com/SEU_USUARIO/gestao_financeira.git)

2. Instale as dependências:

    composer install
    npm install && npm run dev

3. Configure o arquivo de ambiente:

    cp .env.example .env
    php artisan key:generate

4. Execute as migrações do banco de dados:

    php artisan migrate

5. nicie o servidor:

    php artisan serve