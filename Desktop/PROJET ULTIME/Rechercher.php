<?php
// ici on aura tous les profils des utilisateurs avec sur la gauche une liste défilante de filtre pour faciliter la recherche. il y aura aussi une barre de recherche pour les mots clés.
?>
<?php include('Header.php'); ?>
<?php include('navbar.php'); ?>
<body>

<div class="bg-success">
    <h1>Recherche par investisseur</h1>
    <label for="Budget">Budget:</label>
<div>
        <select id="minBudget">
            <option value="" selected disabled>Budget minimal</option>
            <option value="">0€</option>
            <option value="">2 500€</option>
            <option value="">5 000€</option>
            <option value="">10 000€</option>
            <option value="">15 000€</option>
            <option value="">20 000€</option>
            <option value="">25 000€</option>
        </select>
    <select id="maxBudget">
        <option value="" selected disabled>Budget Maximal</option>
        <option value="">0€</option>
        <option value="">2 500€</option>
        <option value="">5 000€</option>
        <option value="">10 000€</option>
        <option value="">15 000€</option>
        <option value="">20 000€</option>
        <option value="">25 000€</option>
    </select>
</div>
</div>

<div class="bg-warning">
    <h1>Recherche par Entreprise</h1>
    <!-- <label for="">Taux d'intérêt</label> -->
    <label for="">secteur d'activité</label>
    <select name="" id="">
        <option></option>
    </select>
    <label for="">zone géographique</label>
    <label for="">Taille de l'Entreprise</label>
    <label for=""></label>
</div>

<div class="bg-success">
    <h1>Recherche par salarié</h1>
    <label for=""> </label>
    <select id="">
        <option value=""></option>
        <option value=""></option>
    </select>
</div>
<?php include('footer.php'); ?></body>