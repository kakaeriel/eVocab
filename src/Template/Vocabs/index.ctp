<div class="row show-grid">
    <div class="col-lg-6 no-padding-left">
        <?php
        $myTemplates = [
            'inputContainer' => '{{content}}',
            'button' => '<span class="input-group-btn"><button {{attrs}}>{{text}}</button></span>',
        ];
        $this->Form->templates($myTemplates);
        echo $this->Form->create('Vocabs', ['action' => 'search', 'type' => 'get']);
        echo '<div class="input-group col-xs-6">';
        echo $this->Form->input('word', ['label' => false, 'placeholder' => 'Searching...', 'class' => 'form-control']);
        echo $this->Form->button('Search', ['class' => 'btn btn-default', 'type' => 'submit']);
        echo '</div>';
        echo $this->Form->end();
        ?>
    </div>
    <div class="col-lg-6 no-padding-right">
        <p class="pull-right">
            <?php echo $this->Html->link('<i class="fa fa-edit"></i> Add Word', ['controller' => 'vocabs', 'action' => 'add'], ['escape' => FALSE, 'class' => 'btn btn-primary']); ?>
        </p>
    </div>
</div>
<div class="row">
    <?php
    if (isset($vocabs)) {
        if ($vocabs->count() > 0) {
            echo '<table class="table table-bordered"><thead>';
            echo $this->Html->tableHeaders(['No', 'First Word', 'Second Word', 'Date', 'Action']);
            echo '</thead>';
            $i = 1;
            $array = [];
            foreach ($vocabs as $vocab) {
                $button = $this->Html->link('<i class="fa fa-edit"></i>', ['controller' => 'vocabs', 'action' => 'edit', $vocab->id], ['escape' => FALSE, 'class' => 'btn btn-primary']);
                $button .= '&nbsp;';
                $button .= $this->Form->postLink('<i class="fa fa-remove"></i>', ['controller' => 'vocabs', 'action' => 'delete', $vocab->id], ['escape' => FALSE, 'class' => 'btn btn-danger', 'confirm' => 'Are you sure you wish to delete this vocab?']);
                $array[] = [$i, $vocab->first_word, $vocab->second_word, $vocab->ts, $button];
                $i++;
            }
            echo $this->Html->tableCells($array);
            echo '</table>';

            $config = [
                'number' => '<a href="{{url}}">{{text}}</a>',
            ];
            echo '<nav><ul class="pagination">';
            echo $this->Paginator->prev('« Previous');
            echo $this->Paginator->numbers(['modulus' => 10, 'last' => true]);
            echo $this->Paginator->next('Next »');
            echo '</ul></nav>';
        }
        else {
            echo '<div class="alert alert-info" role="alert">Data not found</div>';
        }
    }
    else {
        echo '<div class="alert alert-info" role="alert">Data not found</div>';
    }
    ?>
</div>

<!--<nav>
    <ul class="pagination">
        <li><a href="#"><span aria-hidden="true">&laquo;</span><span class="sr-only">Previous</span></a></li>
        <li><a href="#">1</a></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">4</a></li>
        <li><a href="#">5</a></li>
        <li><a href="#"><span aria-hidden="true">&raquo;</span><span class="sr-only">Next</span></a></li>
    </ul>
</nav>-->