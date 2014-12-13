<div class="row">
    <?php
    $myTemplates = [
        'inputContainer' => '<div class="form-group">{{content}}</div>',
        'submitContainer' => '<div class="form-group">{{content}}</div>',
        'error' => '<div class="alert alert-danger">{{content}}</div>',
        'inputContainerError' => '<div class="form-group">{{content}} {{error}}</div>',
    ];
    $this->Form->templates($myTemplates);

    echo $this->Form->create($vocab);
    echo $this->Form->input('first_word', ['class' => 'form-control', 'error' => ['wrap' => 'jembut']]);
    echo $this->Form->input('second_word', ['class' => 'form-control']);
    echo $this->Form->submit('Add', ['type' => 'submit', 'class' => 'btn btn-primary']);
    echo $this->Form->end();
    ?>
</div>