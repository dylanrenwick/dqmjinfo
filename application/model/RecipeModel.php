<?php

class RecipeModel
{
    public static function getSpecialRecipeCount()
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $query = $database->prepare("SELECT COUNT(*) FROM special_recipes");
        $query->execute();
        
        return $query->fetchColumn();
    }

    public static function getSpecialRecipeByResult($id)
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $query = $database->prepare("SELECT * FROM special_recipes WHERE result = :result_id LIMIT 1");
        $query->execute(array(':result_id' => $id));
        
        return $query->fetch();
    }

    public static function getQuadRecipeCount()
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $query = $database->prepare("SELECT COUNT(*) FROM quadrilateral_recipes");
        $query->execute();
        
        return $query->fetchColumn();
    }

    public static function getQuadRecipeByResult($id)
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $query = $database->prepare("SELECT * FROM quadrilateral_recipes WHERE result = :result_id LIMIT 1");
        $query->execute(array(':result_id' => $id));
        
        return $query->fetch();
    }
}