# Diretrizes de Segurança

* **Isolamento de Escopo de Usuário:** Ao realizar consultas no banco de dados para listar, editar ou excluir transações e categorias, sempre garanta que a query filtre pelo ID do usuário autenticado (ex: `auth()->user()->transactions()->...`). Um usuário nunca pode acessar o registro financeiro de outro.
* **Mass Assignment:** Proteja todos os Models definindo estritamente a propriedade `$fillable`.
* **Proteção CSRF:** Garanta que todos os formulários Blade incluam a diretiva `@csrf`.