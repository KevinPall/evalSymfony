<?php
 
    namespace App\Controller;
    
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\Routing\Annotation\Route;
    use App\Repository\GitesRepository;
    use App\Form\GiteSearchType;
    
    class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(Request $request, GitesRepository $gitesRepository): Response
    {
        // Créer une instance du formulaire de recherche
        $form = $this->createForm(GiteSearchType::class);
        $form->handleRequest($request);
    
        // Initialiser les gîtes à null
        $gites = null;
    
        // Si le formulaire est soumis et valide, effectuer la recherche avec les critères
        if ($form->isSubmitted() && $form->isValid()) {
            // Récupérer les données du formulaire
            $criteria = $form->getData();
           
            // Effectuer la recherche avec les critères
            $gites = $gitesRepository->findBySearchCriteria($criteria);
               // Ajouter une condition pour gérer le cas où aucun gîte n'est trouvé
    if (empty($gites)) {
        $this->addFlash('warning', 'Aucun gîte trouvé avec les critères de recherche.');
    }
        }
    
        // Si aucun critère de recherche n'est fourni ou si la recherche ne donne pas de résultats,
        // récupérer tous les gîtes
        if ($gites === null || empty($gites)) {
            $gites = $gitesRepository->findAll();
    
            // Ajoutez une condition pour gérer le cas où aucun gîte n'est trouvé
            if (empty($gites)) {
                $this->addFlash('warning', 'Aucun gîte trouvé avec les critères de recherche.');
            }
        }
    
        // Rendre la vue en passant les gîtes et le formulaire de recherche
        return $this->render('home/index.html.twig', [
            'gites' => $gites,
            'form' => $form->createView(), // Ajouter le formulaire à la vue
        ]);
    }
}