<div class="col-sm-3">
    <strong>MENU</strong>
    <hr>
    <ul class="nav nav-pills nav-stacked">
        <li class="nav-header"></li>
            <?php
            if ($navigations->count() > 0) {
                foreach ($navigations as $navigation) {
                    echo '<li>' . $this->Html->link('<i class="'.$navigation->icon.'"></i> &nbsp;'.$navigation->name, $navigation->link, ['escape' => FALSE]) . '</li>';
                }
            }
            ?>
    </ul>
</div>