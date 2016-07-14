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
 * Product controller.
 *
 */
class ProductController extends Controller
{
	/**
	 * @Route("/product")
	 */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $products = $em->getRepository('AppBundle:Product')->findAll();

        return new Response('<h1>create product id : 10 </h1>');
    }

    /**
     * Show form to create a new product entity.
     * 
	 * @Route("/product/new")
     */
    public function newAction(Request $request)
    {
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
	        $product = new Product();
	        
	        return $this->render('product/new.html.php', 
	        			array('product' => $product,));
    	}
    }    
    
    /**
     * Save a new product entity.
     *
     * @Route("/product/save")
     */
    public function saveAction(Request $request) {
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
    		array('product' => $product
    	));
    }
    
    /**
     * Search product action by product name.
     *
     * @Route("/product/search/{productId}")
     */
    public function searchProductAction($productId) {
    	(new Product())->getId();
    	$repository = $this->getDoctrine()->getRepository('AppBundle:Product');
    	$product = $repository->find($productId);
    	
    	if ($product == null) {
    		return $this->json(array(
    				'id' => '',
    				'code' => '',
    				'description' => '',
    				'name' => '',
    				'price' => ''));
    	}
    	
    	return $this->json(array(
    				'id' => $product->getId(),
    				'code' => $product->getCode(),
    				'description' => $product->getDescription(),
    				'name' => $product->getName(),
    				'price' => $product->getPrice()));
    }
    
    /**
     * Preview Product
     */
    public function previewAction($product) {
    	return new Response('<h1>create product id : redirect' + $product + '</h1>');
    }
    
    /**
     * Finds and displays a Product entity.
     *
     */
    public function showAction(Product $product)
    {
        $deleteForm = $this->createDeleteForm($product);

        return $this->render('product/show.html.twig', array(
            'product' => $product,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Product entity.
     *
     */
    public function editAction(Request $request, Product $product)
    {
        $deleteForm = $this->createDeleteForm($product);
        $editForm = $this->createForm('AppBundle\Form\ProductType', $product);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($product);
            $em->flush();

            return $this->redirectToRoute('product_edit', array('id' => $product->getId()));
        }

        return $this->render('product/edit.html.twig', array(
            'product' => $product,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Product entity.
     *
     */
    public function deleteAction(Request $request, Product $product)
    {
        $form = $this->createDeleteForm($product);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($product);
            $em->flush();
        }

        return $this->redirectToRoute('product_index');
    }

    /**
     * Creates a form to delete a Product entity.
     *
     * @param Product $product The Product entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Product $product)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('product_delete', array('id' => $product->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
