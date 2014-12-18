<?php
namespace ChatWebSocket;

use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;

class Chat implements MessageComponentInterface
{
	protected $clients;

    public function __construct() 
	{
        $this->clients = new \SplObjectStorage;
    }
	
    public function onOpen(ConnectionInterface $conn) 
	{
        $this->clients->attach($conn);
        echo "Nova conexão! ({$conn->resourceId})\n";
		$conn->send("Seu id de conexão é " . $conn->resourceId . "\n");
		foreach ($this->clients as $client) {
            if ($conn->resourceId !== $client->resourceId) {
                $conn->send("Há um cliente ativo de id " . $client->resourceId . "\n");
				$client->send("Há um novo cliente ativo de id " . $conn->resourceId . "\n");
            }
        }
    }

    public function onMessage(ConnectionInterface $from, $msg) 
	{
		$arrayDestino = null;
		if (  property_exists( json_decode($msg, false), 'destino' )) {
			$arrayDestino = json_decode($msg)->destino;
		}
		if (!$arrayDestino) {			
			echo ('Conexão ' . $from->resourceId . ' enviou a mensagem "' . json_decode($msg)->mensagem . '" no modo global.');
		}
		foreach ($this->clients as $client) {
			if ($arrayDestino) {
				if (in_array($client->resourceId, $arrayDestino)) {
					$client->send(json_decode($msg)->mensagem);
				}
			}
			else if ($from !== $client) {
				$client->send(json_decode($msg)->mensagem);
			}
		}
	}

    public function onClose(ConnectionInterface $conn)
	{
        $this->clients->detach($conn);
        echo "Conexão {$conn->resourceId} fechada\n";
    }

    public function onError(ConnectionInterface $conn, \Exception $e)
	{
		echo "O seguinte erro ocorreu: {$e->getMessage()}\n";
        $conn->close();
    }
	
	
}
