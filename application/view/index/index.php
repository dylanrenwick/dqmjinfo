<div class="container">
    <div id="main">
        <!-- echo out the system feedback (error and success messages) -->
        <?php $this->renderFeedbackMessages(); ?>

        <img src="<?php echo Config::get('URL'); ?>img/dqmjinfo.png">
        <table class="index_menu">
            <thead>
                <tr>
                    <th class="table_header" colspan="7">Monster Lookup</th>
                </tr>
                <tr>
                    <th>By Name</th>
                    <th>By Family</th>
                    <th>By Rank</th>
                    <th>By Skillset</th>
                    <th>By Trait</th>
                    <th>By Resistance</th>
                    <th>By Weapon Type</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <?php 
                            for($i = 0; $i < sizeof($this->monsters); $i++)
                            {
                                echo "<a href=\"monster?id=".$i."\">".$this->monsters[$i]->name."</a><br>";
                            }
                        ?>
                    </td>
                    <td>
                        <?php //IndexController::getFamilies(); ?>
                    </td>
                    <td>
                        <?php //IndexController::getRanks(); ?>
                    </td>
                    <td>
                        <?php //IndexController::getSkillsets(); ?>
                    </td>
                    <td>
                        <?php //IndexController::getTraits(); ?>
                    </td>
                    <td>
                        <?php //IndexController::getResistances(); ?>
                    </td>
                    <td>
                        <?php //IndexController::getWeaponTypes(); ?>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
