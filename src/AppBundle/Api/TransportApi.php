<?php

namespace AppBundle\Api;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints\DateTime;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use AppBundle\Entity\Product;
use AppBundle\Form\ProductType;
use AppBundle\Entity\WarehouseIMEI;

/**
 * Transport Api.
 *
 */
class TransportApi extends Controller
{	
	/**
	 * @Route("/api/transport/{warehouse_id}/imei")
	 */
	public function getImeisByWareehouseIdAction($warehouse_id)
	{
		$manager = $this->getDoctrine()->getEntityManager();
	
		$query = $manager->createQuery("SELECT imei, wi FROM AppBundle:IMEI imei
											INNER JOIN AppBundle:WarehouseIMEI wi
											WHERE wi.warehouseSourceId = $warehouse_id
											AND wi.endDate IS NULL ");
		$imei = $query->getResult();

		return new JsonResponse($imei);
	}
	
	/**
	 * @Route("/api/transport/{warehouse_id}/masters")
	 */
	public function getMastersByWarehouseIdAction($warehouse_id)
	{
		$manager = $this->getDoctrine()->getEntityManager();
	
		$query = $manager->createQuery("SELECT m, wm FROM AppBundle:Master m
											INNER JOIN AppBundle:WarehouseMaster wm
											WHERE wm.warehouseSourceId = $warehouse_id
											AND wm.endDate IS NULL ");
		$master = $query->getResult();
	
		return new JsonResponse($master);
	}
	
	/**
  	 * @Route("/api/transport/{warehouse_id}/pallet")
	 */
	public function getPalletsByWarehouseIdAction($warehouse_id)
	{
		$manager = $this->getDoctrine()->getEntityManager();
	
		$query = $manager->createQuery("SELECT p, wm FROM AppBundle:Pallet p
											INNER JOIN AppBundle:WarehouseMaster wm
											WHERE wm.warehouseSourceId = $warehouse_id
											AND wm.endDate IS NULL ");
		$pallet = $query->getResult();
	
		return new JsonResponse($pallet);
	}
	
	/**
	 * @Route("/api/transport/populate/{warehouse_source_id}/{warehouse_dest_id}")
	 */
	public function populateWarehouse($warehouse_source_id, $warehouse_dest_id)
	{	
		for ($x= 0; $x < 10; $x++) {
			$warehouse = new WarehouseIMEI();
			$warehouse->setWarehouseSourceId($warehouse_source_id);
			$warehouse->setWarehouseDestId($warehouse_dest_id);
			$warehouse->setTransportId(1);
			$warehouse->setImeiId($x);
			$warehouse->setInitialDate(new \DateTime());
			
	
			$repository = $this->getDoctrine()->getManager();
			$repository->persist($warehouse);
			$repository->flush();
		}
		return new Response('Create Success');
	}
	
}
