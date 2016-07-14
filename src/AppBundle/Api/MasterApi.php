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
class MasterApi extends Controller
{
	/**
	 * @Route("/api/json/master/all")
	 */
	public function getAllMasterApi()
	{	
		$response = $this->getAllMasterDatabase();
		
		return new JsonResponse($response);
	}
	
	private function getAllMasterDatabase()
	{	
		return $this->getDoctrine()
						->getRepository('AppBundle:Master')
									->findAll();
	}
}