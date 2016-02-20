<?php

namespace Src\RouterBoard;

use Src\Adapters\RouterBoardDBAdapter;

class RouterBoardList extends AbstractRouterBoard {
	
	/**
	 * Print all info about routers from backup list
	 */
	public function printAllRouterBoards() {
		$dbconnect = new RouterBoardDBAdapter( $this->config, $this->logger );
		if ( $result = $dbconnect->getIP() ) {
			foreach ($result as $data) {
				$this->logger->log( $data['identity'] . ' - ' . $data['addr'], $this->logger->setNotice() );
			}
			return;
		}
		$this->logger->log('Get IP addresses from the database failed! Print is not available. Try later.', $this->logger->setError() );
	}


}

