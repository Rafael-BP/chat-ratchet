chat-ratchet
============

Chat criado usando Ratchet

A base foi retirada da própria documentação do ratchet, implementei algumas outras coisas, em especial a função chat.enviar que aceita parametro do destino (s) a ser enviada a mensagem, além de algumas customizações.

A ideia do chat é ser utilizado em rede, usando o console do browser (IE não da suporte a Web Socket, nem alguns navegadores antigos, e ainda não mechi para deixar compativel).

Antes de tudo, não se esqueça de rodar o composer no projeto :)

Para configurar o ip da máquina servidor que vai subir a aplicação ao qual os clientes (browsers) devem conectarem-se, altere a seguinte linha do arquivo index.html:

#####var conn = new WebSocket('ws://SeuIp:8080');

A porta que será usada junto do ip configurado para acessar a aplicação, é a porta configurada ao subir o servidor.

A porta 8080 é usada para a aplicação php do chat, que deve ser iniciada (além de subir o servidor da aplicação) utilizando o comando:

#####php bin/chat-server.php


É isso ai :D

![Oh long jhonson power]
(http://i1.kym-cdn.com/entries/icons/original/000/009/687/safe_image_(1).jpg)
