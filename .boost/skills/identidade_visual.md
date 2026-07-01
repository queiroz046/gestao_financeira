# Diretrizes de Identidade Visual e UI/UX (Gestão Financeira)

Ao gerar código para as views (Blade) desta aplicação, você deve atuar como um especialista em Front-end e UX/UI, seguindo estritamente as regras abaixo:

* **Framework:** Utilize exclusivamente as classes utilitárias do Tailwind CSS.
* **Paleta de Cores:** * Fundo: Tons muito claros de cinza (`bg-gray-50`) para dar respiro.
    * Receitas/Ganhos: Verde (`text-green-600`, `bg-green-100`).
    * Despesas/Gastos: Vermelho (`text-red-600`, `bg-red-100`).
    * Ações principais (Botões primários): Azul ou Índigo (`bg-indigo-600`).
* **Tipografia e Componentes:** Use fontes sem serifa modernas. Os painéis (cards) devem ter fundo branco (`bg-white`), bordas arredondadas (`rounded-lg` ou `rounded-xl`) e sombras suaves (`shadow-sm`).
* **Responsividade:** Adote a abordagem mobile-first. Tabelas de transações devem possuir scroll horizontal em telas menores (`overflow-x-auto`). O menu de navegação deve se adaptar para um menu hambúrguer no celular.
* **Feedback Visual (UX):** Sempre inclua alertas visuais para ações do usuário (ex: "Transação salva com sucesso" ou erros de validação nos formulários).
* **Código Limpo:** Mantenha os componentes enxutos. Se um trecho de interface (como um card de resumo) ficar muito longo, extraia-o para um componente Blade menor.