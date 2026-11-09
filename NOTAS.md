1.routes/web.php
2.a pasta é resources/views e a view da página de boas-vindas chama-se welcome
3.o nome está em .env e não vai para o github porque tem dados sensivéis como dados de acesso e palavras passes
Ao apagar o ; de uma das rotas dá o erro 500
Ao abrir /eventos/3 codigo 200
Ao abrir /eventos/99 codigo 404
Ao abrir /eventos/abc codigo 404 e não chega a entrar na funçao porque depois de eventos a funcção está á espera de um numero
Sem o whereNumber('id'), e com /eventos/{id} escrita antes de /eventos/proximos, o Laravel apanhava “proximos” como se fosse o valor de {id}, por ser a primeira rota a encaixar. Como a função espera int $id, e “proximos” não é um número, dava erro (TypeError) em vez de mostrar a lista de próximos eventos.

PL03 - Desafio: porque é que /eventos/tipo/{tipo} não entra em conflito com /eventos/{id}?
Não entram em conflito porque o {id} só serve endereços com 2 segmentos (/eventos/3), enquanto /eventos/tipo/{tipo} tem 3 segmentos. Além disso, o {id} está restringido a números com whereNumber.
