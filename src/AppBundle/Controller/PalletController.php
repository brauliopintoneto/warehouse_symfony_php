<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Product;
use AppBundle\Entity\IMEI;
use AppBundle\Api\TransportApi;

class PalletController extends Controller
{
	/**
	 * @Route("/pallet/find/{pallet_cod}")
	 */
	public function findPallet($pallet_cod)
	{
		// TODO: add find in database by pallet_cod
		for ($i = 0; $i < 10; $i++) {
			$data[] = array('master_cod' => $i,
							'master_desc' => 'desc_'.$i); 	
		}
		
		return $this->json($data);
	}
	
    /**
     * @Route("/pallet/transfer")
     */
    public function palletTransportToMaster()
    {
        for ($i = 0; $i < 10; $i++) {        	
        	$warehouses[] = array(
        			'id' => $i,
        			'value'=> 'Warehouse_'.$i
        	);
        }
        
        for ($i = 0; $i < 10; $i++) {
        	$transporters[] = array(
        			'id' => $i,
        			'value'=> 'Transporter '.$i
        	);
        }        
                
        return $this->render('pallets/transport_pallet.html.php', 
							 array('list_warehouses'=>$warehouses,
        						   'list_transporter'=>$transporters));
    }

	
	
	/**
	 * @Route("/pallet/save")
	 */
	public function palletSave() 
	{		 
		$product = new Product();
		$product->setDescription("descricao");
		$product->setName("name");
		$product->setPrice(0);
		
		$repository = $this->getDoctrine()->getManager();
		$repository->persist($product);
		$repository->flush();
						
		return new Response('<h1>create product id : ' . $product->getId() . ' </h1>'); 	
	}
    
    /**
     * @Route("/pallet/transport/{name}")
     */
    public function indexAction($name)
    {
    	$this->getDoctrine()->getManager();
    	
    	return $this->render('pallets/transport_pallet.html.php', 
    			array('name' => $name));
    }
    
}
