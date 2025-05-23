# pontoeletronico



Autor: Carlos Eduardo Alves da Silva Contato: carloskdu@itepbrasil.net

1- O Projeto foi utilizando Docker para aproveitar a dinâmica da escalabilidade, e praticidade simulação do Ambiente; 
  - `docker-compose up -d --build`
2- Foi Utilizado projeto laravel simples com blade; 
3- Foi cria Seeders para usuarios iniciais; 
    - docker container exec pontoeletronico-app php artisan db:seed --class=UsuarioSeeder 
4- Foi Utilizado Helpers para validação a principio, depois resolvi alterar para Rules Validations por definição. 
5- Foi realizado Validação Apenas Backend; 
6- A Busca do CEP foi implementada uma versão apenas com front por atender a caracteristica da tarefa. 
7- Foi Criado uma pagina de Errors, e criado o criterio de permitir alteração apenas seus funcionários, mas visualizar os registros de ponto para todos. 
8- Não Foi levado em consideração o Layout e aparência, foi ajustado apenas o mínimo do visual para uso e testes; 
9- Apesar de nao estar no escopo da tarefa, foi implementado um teste unitario simples 
  - ```docker container exec pontoeletronico-app php artisan test```
