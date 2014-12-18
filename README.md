chat-ratchet
============

Chat criado usando Ratchet

A base foi retirada da própria documentação do ratchet, implementei algumas outras coisas, em especial a função chat.enviar que aceita parametro do destino (s) a ser enviada a mensagem, além de algumas customizações.

A ideia do chat é ser utilizado em rede, usando o console do browser (IE não da suporte a Web Socket, nem alguns navegadores antigos, e ainda não mechi para deixar compativel).

Para configurar o ip da máquina servidor que vai subir a aplicação ao qual os clientes (browsers) devem conectarem-se, altere a seguinte linha do arquivo index.html:

#####var conn = new WebSocket('ws://192.168.0.118:8080');

A porta que será usada junto do ip configurado para acessar a aplicação, é a porta configurada quando subir o servidor. A porta 8080 é usada para subir a aplicação de chat, que deve ser iniciada (além de subir o servidor da aplicação) utilizando o comando:

#####php bin/chat-server.php
