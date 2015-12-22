<?php

namespace Id4v\Bundle\CarcheckBundle\Controller;

use Id4v\Bundle\CarcheckBundle\Document\Vehicule;
use Id4v\Bundle\CarcheckBundle\Document\Entretien;
use Id4v\Bundle\CarcheckBundle\Form\Type\EntretienType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Id4v\Bundle\CarcheckBundle\Form\Type\VehiculeType;

class DefaultController extends Controller
{
    public function getDoctrine()
    {
        return $this->get("doctrine_mongodb");
    }


    /************** Vehicules **************/

    /**
     * @Route("/",name="homepage")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function listVehiculeAction()
    {
        $repos=$this->getDoctrine()
            ->getRepository("Id4vCarcheckBundle:Vehicule");
        $vehicules=$repos->findAll();

        return $this->render('Id4vCarcheckBundle:Default:index.html.twig',array("vehicules"=>$vehicules));
    }
    
    /**
     * @Route("/vehicule/add",name="id4v_add_vehicule")
     **/
    public function addVehiculeAction(Request $request){
        $vehicule=new Vehicule();
        $dm=$this->getDoctrine()->getManager();
        $form=$this->createForm(VehiculeType::class,$vehicule);

        if($request->isMethod("POST"))
        {
            $form->handleRequest($request);
            if($form->isValid()){
                $dm->persist($vehicule);
                $dm->flush();
                return $this->redirectToRoute("homepage");
            }
        }

        return $this->render("@Id4vCarcheck/Default/add_vehicule.html.twig",array("form"=>$form->createView()));
    }

    /**
     * @Route("/vehicule/{vehicule}/stats",name="id4v_stats_vehicule")
     **/
    public function showStatsAction(Request $request){
        $vehicule=$this->getVehiculeForId($request->get("vehicule"));
        $entretiens=$this->getDoctrine()->getRepository("Id4vCarcheckBundle:Vehicule")->getAllEntretiensForVehicule($vehicule);

        return $this->render("@Id4vCarcheck/Default/stats.html.twig",
            array(
                "vehicule"=>$vehicule
            )
        );
    }

    /**************** Entretiens ********************/

    /**
     * @Route("/vehicule/{vehicule}/add_entretien",name="id4v_add_entretien")
     **/
    public function addEntretienAction(Request $request){
        $vehicule=$this->getVehiculeForId($request->get("vehicule"));

        $em=$this->getDoctrine()->getManagerForClass("Id4vCarcheckBundle:Entretien");
        
        $ent=new Entretien();
        $ent->setVehicule($vehicule);
        $form=$this->createForm(EntretienType::class,$ent);
        if($request->isMethod("POST")) {
            $form = $form->handleRequest($request);
            if($form->isValid()) {
                $em->persist($ent);
                $em->flush();
                $this->addFlash("success", "Enregistré");
            }
        }
        return $this->render("@Id4vCarcheck/Default/add_entretien.html.twig",array("form"=>$form->createView(),"vehicule"=>$vehicule));
    }
    
    /**
     * @Route("/vehicule/{vehicule}/edit_entretien/{entretien}",name="id4v_edit_entretien")
     **/
    public function editEntretienAction(Request $request){
        $vehicule=$this->getVehiculeForId($request->get("vehicule"));
        $repoE=$this->getDoctrine()->getRepository("Id4vCarcheckBundle:Entretien");
        $ent=$repoE->find($request->get("entretien"));

        $em=$this->getDoctrine()->getManagerForClass("Id4vCarcheckBundle:Entretien");

        if($ent==null) {
            $ent = new Entretien();
            $ent->setVehicule($vehicule);
        }
        $form=$this->createForm("entretien",$ent);
        if($request->isMethod("POST")) {
            $form = $form->handleRequest($request);
            if($form->isValid()) {
                $em->persist($ent);
                $em->flush();
                $this->addFlash("success", "Enregistré");
            }
        }
        return $this->render("@Id4vCarcheck/Default/add_entretien.html.twig",array("form"=>$form->createView(),"vehicule"=>$vehicule));
    }


    /**
     * @Route("/vehicule/{vehicule}",name="id4v_detail_vehicule")
     **/
    public function detailVehiculeAction(Request $request){
        $vehicule=$this->getVehiculeForId($request->get("vehicule"));

        return $this->render("@Id4vCarcheck/Default/detail_vehicule.html.twig", array("vehicule"=>$vehicule));
    }

    private function generateKilometrageStats($datas,&$labels,&$dataset)
    {
        foreach($datas as $entretien){
            $labels[]=$entretien["date"]->format("d/m/Y");
            $dataset[0][]=intval($entretien["kilometrage"]);
            $dataset[1][]=floatval($entretien["grand_total"]);
        }
    }

    /**
     * @param $id
     * @return \Id4v\Bundle\CarcheckBundle\Entity\Vehicule
     */
    private function getVehiculeForId($id){
        $repoV=$this->getDoctrine()
            ->getRepository("Id4vCarcheckBundle:Vehicule");
        $vehicule=$repoV->find($id);
        return $vehicule;
    }
}
