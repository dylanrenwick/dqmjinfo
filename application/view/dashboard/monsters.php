<div class="container">
    <div id="content">

        <!-- echo out the system feedback (error and success messages) -->
        <?php $this->renderFeedbackMessages(); ?>
        <h1>DQMJ Dashboard</h1>

        <table class="monster_table rowstyle-even">
            <thead>
                <tr>
                    <th class="table_header" colspan="15">Manage Monsters</th>
                </tr>
                <tr>
                    <th>#</th>
                    <th>Family</th>
                    <th></th>
                    <th>Monster</th>
                    <th>Rank</th>
                    <th>Skillset</th>
                    <th>Traits</th>
                    <th>Resistances/Weaknesses</th>
                    <th>HP</th>
                    <th>MP</th>
                    <th>Atk</th>
                    <th>Def</th>
                    <th>Agi</th>
                    <th>Wis</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($this->monsters as $monster)
                    {
                        echo "<tr>";
                        echo "<td>".$monster->id."</td>";
                        echo "<td>".MonsterModel::getFamilyFromIndex($monster->family)."</td>";
                        echo "<td><a href=\"/monster?id=".$monster->id."\" class=\"m".sprintf("%03d", $monster->id)."\" title=\"".$monster->name."\"></td>";
                        echo "<td><a href=\"/monster?id=".$monster->id."\">".$monster->name."</a></td>";
                        echo "<td>".MonsterModel::getRankFromIndex($monster->rank)."</td>";
                        echo "<td>".$monster->skillset."</td>";
                        echo "<td>".$monster->traits."</td>";
                        echo "<td>".$monster->resistances."</td>";
                        echo "<td>".$monster->hp."</td>";
                        echo "<td>".$monster->mp."</td>";
                        echo "<td>".$monster->atk."</td>";
                        echo "<td>".$monster->def."</td>";
                        echo "<td>".$monster->agi."</td>";
                        echo "<td>".$monster->wis."</td>";
                        echo "<td><form action=\"\"><input type=\"submit\" value=\"Edit\"></form></td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
        <br><br>
        <div id="main">
            <h2>Create new Monster</h2>
            <form method="POST" action="/dashboard/createmonster">
                ID: <input style="width: 30px" type="text" name="id" value="<?php echo sizeof($this->monsters) + 1; ?>">
                Name: <input type="text" name="name">
                <br><br>
                Family: <select name="family">
                    <option value="0">Slime</option>
                    <option value="1">Dragon</option>
                    <option value="2">Nature</option>
                    <option value="3">Beast</option>
                    <option value="4">Material</option>
                    <option value="5">Demon</option>
                    <option value="6">Undead</option>
                    <option value="7">Incarni</option>
                </select>
                Rank: <select name="rank">
                    <option value="0">F</option>
                    <option value="1">E</option>
                    <option value="2">D</option>
                    <option value="3">C</option>
                    <option value="4">B</option>
                    <option value="5">A</option>
                    <option value="6">S</option>
                    <option value="7">X</option>
                </select>
                <br><br>
                Skillset: <input style="width: 30px" type="text" name="skillset">
                Traits: <input style="width: 45px" type="text" name="traits">
                <br><br>
                Resistances/Weaknesses: <input type="text" name="resistances">
                <br><br>
                HP: <input style="width: 30px" type="text" name="hp">
                MP: <input style="width: 30px" type="text" name="mp">
                Atk: <input style="width: 30px" type="text" name="atk">
                Def: <input style="width: 30px" type="text" name="def">
                Agi: <input style="width: 30px" type="text" name="agi">
                Wis: <input style="width: 30px" type="text" name="wis">
                <br><br>
                <input type="submit" value="Create Monster">
            </form>
        </div>
    </div>
</div>