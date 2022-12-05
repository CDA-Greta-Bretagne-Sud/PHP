Feature: AjoutLivre
Saisie des champs de la page ajoutLivre puis validation

Test fonctionnel sur la page AjoutLivre
Scenario: test fonctionnel sur les parametres de l'ajout du livre
Given I am on the authentification page
And I authenticated as "jvaljean" using "cosette"
When I submit the form
Then I should see Accueil
And I am on the AjoutLivre page
And I put Nom as "Les miserables"
And I put Auteur as "Victor Hugo"
And I put Edition as "Gallimard"
And I put Information as "Livre en bon état"
When I submit the form ajoutLivre
Then I should see AjoutLivre