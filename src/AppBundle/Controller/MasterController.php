<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Master;
use AppBundle\Repository\ProductRepository;
use AppBundle\Entity\IMEI;
use AppBundle\Api\MasterApi;

class MasterController extends Controller
{
    /**
     * @Route("master/transfer/imei")
     */
    public function transferImeiMasterAction()
    {
    	$warehouses = $this->getDoctrine()->getRepository('AppBundle:Warehouse')->findAll();
    	$masters = $this->getDoctrine()->getRepository('AppBundle:Master')->findAll();
    	
        return $this->render('masters/transfer_master_imei.html.php', 
        					 array('warehouses'=>$warehouses, 
        					 	   'masters'=>$masters));
    }
    
    
    /**
     * Show form to create a new product entity.
     *
     * @Route("/master/new")
     */
    public function masterNewAction(Request $request) 
    {	
    	if('POST' == $request->getMethod()
    			&& $request->request != null) 
    	{	
    		$master = new Master();   		
    		$master->setMasterCode($request->request->get('master_cod'));
    		$master->setStatus(0);

    		// save master
    		$repository = $this->getDoctrine()->getManager();
    		$repository->persist($master);
    		$repository->flush();
    		
    		$i = 0;
    		$imeis = [];
    		
    		while($request->request->has("product_imei_$i")) 
    		{
    			$imei = new IMEI();
    			$imei->setCodImei($request->request->get("product_imei_$i"));
    			$imei->setProductId($request->request->get("product_id_$i"));
    			$imei->setMaster($master);
    			$imei->setMasterId($master->getId());
    			$imei->setStatus(0);
    			
    			// save imei
    			$repository = $this->getDoctrine()->getManager();
    			$repository->persist($imei);
    			$repository->flush();
    			
    			// load product by product id
    			$repository = $this->getDoctrine()->getRepository('AppBundle:Product');
    			$product = $repository->find($imei->getProductId());
    			$imei->setProduct($product);
    			
    			$i = $i + 1;
    			
    			$imeis[] = $imei;
    		}
    		
    		return $this->render('masters/show.html.php', array(
    				'master' => $master,
    				'imeis'=> $imeis));
    	} 
    	else 
    	{
    		$repository = $this->getDoctrine()->getRepository('AppBundle:Product');
    		$products = $repository->findAll();
    		$master = new Master();    		
    		return $this->render('masters/new.html.php', array(
    				'master' => $master,
    			    'products'=> $products));
    	}
    }
}
