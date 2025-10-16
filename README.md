# tcc-projeto

Resumo rápido do repositório

Este repositório contém páginas PHP/HTML e um script Python usados para: cadastro de vendedores, autenticação, geração de relatórios e importação de dados Excel para um banco SQLite (local em C:\xampp\htdocs\dbfaseamento.db).

Arquivos principais

- `ADDFASEAMENTO copy.PY` — script Python que importa planilhas Excel para a base SQLite (dependências: openpyxl, tqdm).
- `Gerar_Excel_com_PHP.php` — endpoint simples que gera um CSV para download.
- `Login.html`, `Cadastrar.html`, `Redefinir senha.html` — telas front-end de autenticação/recuperação.
- `Cadastrar novo.php`, `Redefinirsenha1.php`, `Abrir_por_cliente.php` — handlers PHP que manipulam a base `VENDEDORES`/`LOGIN`.
- `relatorio.php`, `pagina1.php` — páginas que consultam `FATURAMENTO` e geram tabelas e gráficos.
- `grafico.php`, `graficosite.php` — exemplos de visualização.

Observações importantes (segurança e manutenção)

- O código atual contém consultas SQL construídas com concatenação de strings e inputs não validados — risco de SQL Injection.
- Caminhos absolutos Windows (`C:\xampp\htdocs\dbfaseamento.db`) estão hardcoded; recomenda-se usar configuração externa.
- Algumas páginas exibem senhas em texto puro (ex.: `Abrir_por_cliente.php`) — remova essa prática.
- Há inconsistências em formatos de data/strings nas queries (ex.: `2023-008-01`), revisar.

Como começar (local)

1. Instale o XAMPP e coloque o arquivo `dbfaseamento.db` em `C:\xampp\htdocs\`.
2. Coloque este projeto em `C:\xampp\htdocs\tcc-projeto` (ou use virtual host).
3. Para rodar o script Python de importação:

```powershell
# criar e ativar venv (opcional)
python -m venv .venv
.\.venv\Scripts\Activate.ps1
pip install openpyxl tqdm
python "ADDFASEAMENTO copy.PY"
```

Melhorias recomendadas (próximos passos)

- Refatorar queries para Prepared Statements (PDO with bound params) e validar/sanitizar inputs.
- Centralizar configuração (paths, db) em um arquivo `.env` ou config PHP/INI.
- Adicionar controle de versão para scripts e documentar o esquema SQLite (exportar DDL).
- Criar README mais detalhado com exemplos de uso e SQL de criação das tabelas.

