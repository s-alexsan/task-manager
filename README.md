# 📝 PHP Task Manager

Um pequeno sistema de gerenciamento de tarefas desenvolvido em **PHP puro** (sem frameworks), como desafio de prática de programação orientada a objetos.

## 🚀 Desafio

O objetivo é implementar um sistema para gerenciar tarefas de um usuário, aplicando conceitos de **POO, boas práticas e manipulação de arrays**.

### Requisitos

1. **Classe `Task`**
   - Atributos:
     - `id` (int)
     - `title` (string)
     - `description` (string)
     - `status` (string: `"pendente"`, `"em andamento"`, `"concluída"`)
     - `createdAt` (DateTime)
   - Métodos:
     - `markAsInProgress()`
     - `markAsCompleted()`
     - `__toString()` → retorna um resumo da tarefa.

2. **Classe `TaskManager`**
   - Deve armazenar uma lista de tarefas (`array`).
   - Métodos obrigatórios:
     - `addTask(Task $task)`
     - `removeTask(int $id)`
     - `getTaskById(int $id): ?Task`
     - `listTasks(): array`
     - `listTasksByStatus(string $status): array`

3. **Regras**
   - O `id` das tarefas deve ser incremental automaticamente.
   - O status inicial de uma tarefa sempre será `"pendente"`.
   - Se tentar remover ou buscar uma tarefa inexistente, deve retornar `null` ou lançar uma exceção.

### 🔧 Extras (opcional)
- Persistência em arquivo JSON (salvar e carregar tarefas).
- Interface simples no terminal (CLI) para adicionar, listar e concluir tarefas.
- Validação para que o título da tarefa não possa estar vazio.

---

## 📂 Estrutura sugerida

```bash
php-task-manager/
├── src/
│   ├── Task.php
│   ├── TaskManager.php
├── tests/
│   └── TaskTest.php
├── main.php   # arquivo principal para rodar o sistema
└── README.md
# task-manager