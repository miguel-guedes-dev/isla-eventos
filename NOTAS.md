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

PL04 - E1: título com <script> usando {{ }}
Na listagem aparece o texto do script escrito no ecrã, como texto normal, e não aparece nenhum alerta. No código-fonte (Ctrl+U) está escrito &lt;script&gt;alert(&quot;XSS&quot;)&lt;/script&gt;. Isto acontece porque o {{ }} escapa os caracteres especiais (< passa a &lt;, > passa a &gt;, " passa a &quot;), por isso o browser mostra-os como texto e não os executa como código.

PL04 - E2: o mesmo título com {!! !!}
O alerta "XSS" aparece no ecrã e o script é executado. O texto do script não aparece na página, só o resto do título. Isto acontece porque o {!! !!} não escapa nada, por isso o browser recebe a etiqueta <script> como HTML verdadeiro e executa o código. Se o título viesse de um utilizador, qualquer pessoa podia pôr código malicioso na página (XSS). Por isso o {!! !!} nunca leva dados que vieram de utilizadores.

PL04 - Desafio: diferença entre @push/@stack e @section/@yield
O @section/@yield serve para preencher um buraco com nome no layout: o layout tem o @yield('conteudo') e cada página define o seu @section('conteudo'), que ocupa esse sítio. Cada página só preenche o seu buraco uma vez. Uso-o para o que cada página tem de diferente e que existe sempre, como o título e o conteúdo principal.
O @push/@stack serve para acrescentar coisas a uma pilha: o layout tem o @stack('estilos') e várias páginas ou componentes podem fazer @push('estilos'), e tudo o que for empilhado aparece lá, uma coisa a seguir à outra, sem se substituírem. Uso-o para extras opcionais que só algumas páginas precisam, como estilos (CSS) ou scripts (JavaScript) específicos de uma página.

PL05 - A3: o erro das sessões
Primeira linha do erro: SQLSTATE[42S02]: Base table or view not found: 1146 Table 'isla_eventos.sessions' doesn't exist (Connection: mysql, Host: 127.0.0.1, Port: 3306, Database: isla_eventos, SQL: select * from `sessions` where `id` = LIZSwYsvppT2sTWu83J5evhPQr2UoQsKzuknl5Hr limit 1)
O Laravel procura a tabela sessions porque no .env o SESSION_DRIVER é database, ou seja, as sessões são guardadas numa tabela da base de dados, e como a base isla_eventos é nova e está vazia, essa tabela ainda não existe (só passa a existir depois de correr o php artisan migrate).
