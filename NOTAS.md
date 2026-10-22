1.routes/web.php
2.a pasta é resources/views e a view da página de boas-vindas chama-se welcome
3.o nome está em .env e não vai para o github porque tem dados sensivéis como dados de acesso e palavras passes
Ao apagar o ; de uma das rotas dá o erro 500
Ao abrir /eventos/3 codigo 200
Ao abrir /eventos/99 codigo 404
Ao abrir /eventos/abc codigo 404 e não chega a entrar na funçao porque depois de eventos a funcção está á espera de um numero