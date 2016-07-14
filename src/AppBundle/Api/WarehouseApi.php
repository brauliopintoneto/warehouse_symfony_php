<?php

namespace AppBundle\Api;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\BrowserKit\Response;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use AppBundle\Entity\Warehouse;

/**
 * Warehouse Api.
 *
 */
class WarehouseApi extends Controller
{
	/**
	 * @Route("/api/warehouse/all")
	 */
	public function getAllWarehouseAction()
	{	
		$response = $this->getAllWarehouse();
		
		return new JsonResponse($response);
	}
	
	public function getAllWarehouse()
	{
		$warehouses = $this->getDoctrine()
								->getRepository('AppBundle:Warehouse')
								->findAll();
	
		$response = array();
		foreach ($warehouses as $warehouse) {
			$response[] = array(
					'id' => $warehouse->getId(),
					'label' => $warehouse->getLabel(),
			);
		}
	
		return $warehouses;
	}
}