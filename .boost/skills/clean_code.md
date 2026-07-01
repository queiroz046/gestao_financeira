# Diretrizes de Clean Code e Refatoração

* **Nomenclatura Reveladora de Intenção:** Variáveis e métodos devem ter nomes descritivos em inglês. Evite abreviações. Exemplo: use `$monthlyTransactions` em vez de `$mt`.
* **Funções Pequenas:** Os métodos dos Controllers devem ser curtos e fazer apenas uma coisa (Single Responsibility Principle). Se um método estiver longo, extraia a lógica para um Service ou Action.
* **Early Return:** Evite aninhamentos profundos de `if/else`. Utilize cláusulas de guarda (early returns) para tratar condições de erro no início da função.
* **Sem Código Zumbi:** Não gere trechos de código comentados ou lógicas desativadas. O código final deve ser limpo e enxuto.