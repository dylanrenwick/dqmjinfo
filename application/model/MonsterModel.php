<?php

class MonsterModel
{
    public static function getMonsterImageName($name)
    {
        $name = str_replace(" ", "_", $name);
        $name = str_replace("-", "_", $name);
        $name = preg_replace("/[^A-Za-z0-9_\-]/", "", $name);
        $name = preg_replace("/-+/", "-", $name);

        return strtolower($name).".png";
    }

    public static function getMonsterByName($name)
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $query = $database->prepare("SELECT * FROM monsters
            WHERE name = :monster_name LIMIT 1");
        $query->execute(array(':monster_name' => $name));

        return $query->fetch();
    }

    public static function getMonsterById($id)
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $query = $database->prepare("SELECT * FROM monsters
            WHERE id = :monster_id LIMIT 1");
        $query->execute(array(':monster_id' => $id));

        return $query->fetch();
    }

    public static function getMonsterNameList()
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $query = $database->prepare("SELECT name FROM monsters");
        $query->execute();

        $result = $query->fetchAll();
        //print_r($result);

        return $result;
    }

    public static function getMonsterList()
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $query = $database->prepare("SELECT * FROM monsters");
        $query->execute();

        $result = $query->fetchAll();

        return $result;
    }

    public static function getMonsterCount()
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $query = $database->prepare("SELECT COUNT(*) FROM monsters");
        $query->execute();
        
        return $query->fetchColumn();
    }

    public static function getFamilyFromIndex($index)
    {
        $family_array = array(
            0 => "Slime", 
            1 => "Dragon", 
            2 => "Nature", 
            3 => "Beast", 
            4 => "Material", 
            5 => "Demon", 
            6 => "Undead", 
            7 => "Incarni"
        );

        return $family_array[$index];
    }



    public static function getRankFromIndex($index)
    {
        $rank_array = array(
            0 => "F", 
            1 => "E", 
            2 => "D", 
            3 => "C", 
            4 => "B", 
            5 => "A", 
            6 => "S", 
            7 => "X"
        );

        return $rank_array[$index];
    }

    public static function createMonster($id, $name, $family, $rank, $skillset, $traits, $resistances, $hp, $mp, $atk, $def, $agi, $wis)
    {
        if (!(isset($id) || isset($name) || isset($skillset) || isset($hp) || isset($mp) || isset($atk) || isset($def) || isset($agi) || isset($wis)))
        {
            Session::add('feedback_negative', Text::get('FEEDBACK_MONSTER_MISSING_VALUE')." <br>ID: $id Name: $name Family: $family Rank: $rank Skillset: $skillset Traits: $traits Resistances: $resistances HP: $hp MP: $mp Atk: $atk Def: $def Agi: $agi Wis: $wis");
            return false;
        }

        $database = DatabaseFactory::getFactory()->getConnection();

        $query = $database->prepare("SELECT * FROM monsters WHERE (id = :id OR name = :name)");
        $query->execute(array(':id' => $id, ':name' => $name));

        if ($query->rowCount() !== 0)
        {
            Session::add('feedback_negative', Text::get('FEEDBACK_MONSTER_ID_OR_NAME_TAKEN'));
            return false;
        }

        $sql = "INSERT INTO monsters (id, name, family, rank, hp, mp, atk, def, agi, wis, skillset";
        if (isset($traits)) $sql = $sql.", traits";
        if (isset($resistances)) $sql = $sql.", resistances";
        $sql = $sql.") VALUES (:id, :name, :family, :rank, :hp, :mp, :atk, :def, :agi, :wis, :skillset";
        if (isset($traits)) $sql = $sql.", :traits";
        if (isset($resistances)) $sql = $sql.", :resistances";
        $sql = $sql.")";

        $query = $database->prepare($sql);
        $query->execute(array(
            ':id' => $id,
            ':name' => $name,
            ':family' => $family,
            ':rank' => $rank,
            ':hp' => $hp,
            ':mp' => $mp,
            ':atk' => $atk,
            ':def' => $def,
            ':agi' => $agi,
            ':wis' => $wis,
            ':skillset' => $skillset,
            ':traits' => $traits,
            ':resistances' => $resistances
        ));

        if ($query->rowCount() !== 1)
        {
            Session::add('feedback_negative', "Unknown SQL Error");
            return false;
        }

        return true;
    }
}