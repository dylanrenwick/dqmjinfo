<div class="container">
    <div id="main">

        <!-- echo out the system feedback (error and success messages) -->
        <?php $this->renderFeedbackMessages(); ?>
        <h1>DQMJ Dashboard</h1>

        <table class="index_menu">
            <thead>
                <tr>
                    <th class="table_header" colspan="3">Dashboard</th>
                </tr>
                <tr>
                    <th>Monsters</th>
                    <th>Special Recipes</th>
                    <th>Quadrilateral Recipes</th>
                </tr>
            </thead>
            <tbody style="text-align: center">
                <tr>
                    <td>Current Monster Count: <?php echo MonsterModel::getMonsterCount(); ?></td>
                    <td>Special Recipe Count: <?php echo RecipeModel::getSpecialRecipeCount(); ?></td>
                    <td>Quadrilateral Recipe Count: <?php echo RecipeModel::getQuadRecipeCount(); ?></td>
                </tr>
                <tr>
                    <td><form action="/dashboard/monsters"><input type="submit" value="Manage Monsters"></form></td>
                    <td><form action="/dashboard/special-recipes"><input type="submit" value="Manage Special Recipes"></form></td>
                    <td><form action="/dashboard/quad-recipes"><input type="submit" value="Manage Quadrilateral Recipes"></form></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
