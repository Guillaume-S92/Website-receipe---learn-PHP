<?php
    include_once('./../config/mysql.php');
    include_once('./../config/user.php');
    include_once('./../variables.php');
?>

<form action="<?php echo($rootUrl . 'comments/post_create.php'); ?>" method="POST">
    <div class="mb-3">
        <label for="recipe_id" class="form-label">Sélectionnez la recette</label>
        <select class="form-select" id="recipe_id" name="recipe_id" required>
            <option value="" disabled selected>Choisissez une recette</option>
            <?php
            // Récupérez toutes les recettes existantes depuis votre base de données
            $recipesQuery = $mysqlClient->query('SELECT recipe_id, title FROM recipes');
            
            // Affichez chaque recette dans une option du menu déroulant
            while ($recipe = $recipesQuery->fetch(PDO::FETCH_ASSOC)) {
                echo '<option value="' . $recipe['recipe_id'] . '">' . $recipe['title'] . '</option>';
            }
            ?>
        </select>
    </div>
    <div class="mb-3">
        <label for="review" class="form-label">Évaluez la recette (de 1 à 5)</label>
        <input type="number" class="form-control" id="review" name="review" min="1" max="5" step="1" required>
    </div>
    <div class="mb-3">
        <label for="comment" class="form-label">Postez un commentaire</label>
        <textarea class="form-control" placeholder="Soyez respectueux/se, nous sommes humain(e)s." id="comment" name="comment" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Envoyer</button>
</form>



