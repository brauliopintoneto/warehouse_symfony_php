<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use AppBundle\Entity\Product;
use AppBundle\Form\ProductType;

/**
 * Transport controller.
 *
 */
class TransportController extends Controller
{
	
	/**
	 * @Route("/transport/imei")
	 */
	public function getTransportImeiView(Request $request)
	{
		$manager = $this->getDoctrine()->getManager();
				
		if('POST' == $request->getMethod()
				&& $request->request != null) {
					
			$product = new Product();
			$product->setCode($request->request->get('product_code'));
			$product->setName($request->request->get('product_commercial_name'));
			$product->setDescription($request->request->get('product_description'));
			$product->setPrice($request->request->get('product_unitary_price'));
			 
			$repository = $this->getDoctrine()->getManager();
			$repository->persist($product);
			$repository->flush();

			return $this->render(
					'product/show.html.php',
					array('product' => $product));
		} else {		
			$warehouses = $manager->getRepository('AppBundle:Warehouse')->findAll();
			 
			return $this->render('transport/transport_imei.new.html.php',
					array('warehouses' => $warehouses));
		}
	}	
	
}
