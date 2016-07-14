<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

use AppBundle\Entity\Warehouse;
use AppBundle\Entity\IMEI;
use AppBundle\Entity\Product;
use AppBundle\Entity\Master;
use AppBundle\Entity\Pallet;
use AppBundle\Entity\Transporter;
use AppBundle\Entity\WarehouseIMEI;
use AppBundle\Entity\WarehouseMaster;
use AppBundle\Entity\WarehousePallet;




class WarehouseController extends Controller
{
	/**
	 * Show form to create a new product entity.
	 *
	 * @Route("/warehouses/request/masters/{warehouse_id}")
	 */
	public function requestMastersFromWarehouseAction($warehouse_id) 
	{
// 		$em = $this->getDoctrine()->getManager();
// 		$query = $em->createQuery(
// 				'SELECT p
// 				    FROM AppBundle:Product p
// 				    WHERE p.price > :price
// 				    ORDER BY p.price ASC'
// 		)->setParameter('price', 19.99);
		
// 		$products = $query->getResult();
		
		return $this->json(array('key'=>$warehouse_id));
	}

	/**
	 * Create warehouses by total.
	 *
	 * @Route("/warehouses/create_automatic/{total}")
	 */
	public function createWarehousesAction(Request $request, $total) {
		$manager = $this->getDoctrine()->getManager();
		
		$warehouse = 
			$manager->createQuery('SELECT w FROM AppBundle:Warehouse w ORDER BY w.id DESC')
					->setMaxResults(1)
					->setFirstResult(1)
					->getResult();
		$lastId = 1;
		if ($warehouse != null) {
			$lastId = $warehouse[0]->getId();
		}
		
		for ($i = 0; $i < $total; $i++) {
			$warehouse = new Warehouse();
			$warehouse->setLabel("warehouse_" . ($i + $lastId));
			
			$manager->persist($warehouse);
			$manager->flush();
		}
		
		$warehouse =
			$manager->createQuery('SELECT w FROM AppBundle:Warehouse w ORDER BY w.id DESC')
					->setMaxResults(1)
					->setFirstResult(1)
					->getResult();
		
		return new Response("<h1>create product id : - " + print_r($warehouse). + "</h1>");
	}
	
	/**
	 * Create warehouses by total.
	 *
	 * @Route("/warehouses/create_automatic/{total}")
	 */
	public function generateDataToDatabase($total) 
	{	
		$manager = $this->getDoctrine()->getManager();
		for ($x=0; $x < $total; $x++) 
		{
			// Product
			$data = new Product();
			$data->setCode("100$x");
			$data->setDescription("description 100$x");
			$data->setName("name 100$x");
			$data->setPrice('10.01');
			
			$manager->persist($data);
			$manager->flush();
			
			// Master
			$data = new Master();
			$data->setMasterCode("00$x");
			$data->setStatus(0);
			
			$manager->persist($data);
			$manager->flush();
			
			// Imei
			$data = new IMEI();
			$data->setCodImei("00$x");
			$data->setMasterId($x);
			$data->setStatus(0);
			
			$manager->persist($data);
			$manager->flush();
				
				
				
			
		}	
		
	}
}
