# pontoeletronico

Autor: Carlos Eduardo Alves da Silva  
Contato: carloskdu@itepbrasil.net

---
## Sobre o Projeto

1. O Projeto foi utilizando Docker para aproveitar a dinâmica da escalabilidade, e praticidade simulação do Ambiente;  
   ```bash
  docker-compose up -d --build
  ```

2. Foi Utilizado projeto laravel simples com blade;

3. Foi criado Seeders para usuários iniciais;  
   ```bash
    docker container exec pontoeletronico-app php artisan db:seed --class=UsuarioSeeder
  ```
  Admin: 19351367045 - Pwd: 123456
  Func: 66655023092 - Pwd: 654321

4. Foi Utilizado Helpers para validação a princípio, depois resolvi alterar para Rules Validations por definição.

5. Foi realizado Validação Apenas Backend;

6. A Busca do CEP foi implementada uma versão apenas com front por atender a característica da tarefa.

7. Foi Criada uma página de Errors, e criado o critério de permitir alteração apenas seus funcionários, mas visualizar os registros de ponto para todos.

8. Não Foi levado em consideração o Layout e aparência, foi ajustado apenas o mínimo do visual para uso e testes;

9. Apesar de não estar no escopo da tarefa, foi implementado um teste unitário simples  
   ```bash
    docker container exec pontoeletronico-app php artisan test`
  ```
