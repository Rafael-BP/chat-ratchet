chat-ratchet
============

Chat criado usando Ratchet

A base foi retirada da própria documentação do ratchet, implementei algumas outras coisas, em especial a função chat.enviar que aceita parametro do destino (s) a ser enviado, além de algumas customizações.

A ideia do chat é ser utilizado em rede, usando o console do browser (IE não da suporte a Web Socket, nem alguns navegadores antigos, e ainda não mechi para deixar compativel).

Para configurar o ip e a porta da máquina servidor que vai subir a aplicação ao qual o cliente (browser) deve se conectar, altere a seguinte linha do arquivo index.html:

#####var conn = new WebSocket('ws://192.168.0.118:8080');
