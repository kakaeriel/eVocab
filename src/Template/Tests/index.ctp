<div class="row show-grid">
    <p>
    <div class="btn-group">
        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            Start Test <span class="caret"></span>
        </button>
        <ul class="dropdown-menu" role="menu">
            <li><?php echo $this->Html->link('Daily Test', ['action' => 'start', 1]); ?></li>
            <li><?php echo $this->Html->link('Weekly Test', ['action' => 'start', 2]); ?></li>
            <li><?php echo $this->Html->link('Monthly Test', ['action' => 'start', 3]); ?></li>
        </ul>
    </div>
</p>
</div>
<div class="row">
    <table class="table table-bordered">
        <?php
        echo '<thead>';
        echo $this->Html->tableHeaders(['No', 'Test Type', 'Point', 'Date', 'Action']);
        echo '</thead>';
        $i = 1;
        $array = [];
        //debug($tests);
        foreach ($tests as $test) {
            $button .= $this->Form->postLink('<i class="fa fa-remove"></i>', ['controller' => 'tests', 'action' => 'delete', $test->id], ['escape' => FALSE, 'class' => 'btn btn-danger', 'confirm' => 'Are you sure you wish to delete this test?']);
            //$array[] = [$i, $test->first_lang, $test->second_lang, $test->ts, $button];
            $i++;
        }
        echo $this->Html->tableCells($array);
        ?>

    </table>
</div>