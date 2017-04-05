<div class="container">
    <div id="content>"
        <!-- echo out the system feedback (error and success messages) -->
        <?php $this->renderFeedbackMessages(); ?>

        <table class="synthesis_table">
            <tbody>
                <tr><th colspan="11" class="table_header"><?php echo $this->monster->name; ?></th></tr>
                <tr><td rowspan="5"><img alt="<?php echo $this->monster->name; ?>" src="<?php echo Config::get('URL')."img/monsters-large/".MonsterModel::getMonsterImageName($this->monster->name); ?>"></td></tr>
                <tr>
                    <th>No.</th>
                    <th>Family</th>
                    <th>Rank</th>
                    <th>Weapons</th>
                    <th>HP</th>
                    <th>MP</th>
                    <th>Atk</th>
                    <th>Def</th>
                    <th>Agi</th>
                    <th>Wis</th>
                </tr>
                <tr>
                    <?php
                        echo "<td>".$this->monster->id."</td>";
                        echo "<td>".MonsterModel::getFamilyFromIndex($this->monster->family)."</td>";
                        echo "<td>".MonsterModel::getRankFromIndex($this->monster->rank)."</td>";
                        echo "<td>".""."</td>";
                        echo "<td>".$this->monster->hp."</td>";
                        echo "<td>".$this->monster->mp."</td>";
                        echo "<td>".$this->monster->atk."</td>";
                        echo "<td>".$this->monster->def."</td>";
                        echo "<td>".$this->monster->agi."</td>";
                        echo "<td>".$this->monster->wis."</td>";
                    ?>
                </tr>
                <tr>
                    <th colspan="2">Skillset</th>
                    <th colspan="2">Traits</th>
                    <th colspan="6">Resistances/Weaknesses</th>
                </tr>
                <tr>
                    <?php
                        echo "<td colspan=\"2\" class=\"center\">".$this->monster->skillset."</td>";
                        echo "<td colspan=\"2\" class=\"center\">".$this->monster->traits."</td>";
                        echo "<td colspan=\"6\">".$this->monster->resistances."</td>"
                    ?>
                </tr>
            </tbody>
        </table>

    </div>
</div>