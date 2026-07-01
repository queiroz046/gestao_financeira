# Diretrizes para Criação de CRUDs (Gestão Financeira)

Ao gerar controladores, modelos e visualizações para operações de CRUD, siga este padrão rigoroso:

* **Isolamento de Validação:** Nunca faça validação direta no Controller. Utilize sempre `Form Requests` para validar a entrada de dados (ex: `StoreTransactionRequest`).
* **Regras de Negócio:** Valores monetários devem ser validados como numéricos/decimais. Datas não podem ser futuras se for um registro de gasto realizado.
* **Respostas e UX:** Após qualquer operação de criação, edição ou exclusão (store, update, destroy), redirecione o usuário com uma mensagem de sessão (flash message) clara, como "Despesa registrada com sucesso!".
* **Paginação:** As listagens de itens (como o histórico de transações) devem obrigatoriamente utilizar a paginação padrão do Laravel (`->paginate(10)`), nunca retorne todos os registros de uma vez com `->all()`.