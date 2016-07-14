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

use AppBundle\Entity\Pallet;

/**
 * Pallet Api.
 *
 */
class PalletApi extends Controller
{
	/**
	 * @Route("/api/pallets")
	 */
	public function getPalletsApi()
	{
		// get manager
		$manager = $this->getDoctrine()->getManager();
		// find all products
		$response = $manager->getRepository('AppBundle:Product')->findAll();
		// return value with json response
		return new JsonResponse($response);
	}

	/**
	 * @Route("/api/pallets/{pallet_id}")
	 */
	public function getPalletByIdApi($pallet_id)
	{
		// get manager
		$manager = $this->getDoctrine()->getManager();
		// find all products
		$response = $manager->getRepository('AppBundle:Product')->find($pallet_id);
		// return value with json response
		return new JsonResponse($response);
	}
}