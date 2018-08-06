<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Category $category
 */
?>

<ol class="breadcrumb" style="text-align:right; background:transparent; margin-top:-10px; margin-bottom:-10px">
    <li><?= $this->Html->link('<i class="fa fa-home"></i>'.__(' Homepage', true), ['controller' => 'Pages', 'action' => 'display', 'home'], ['escape' => false]); ?></li>
    <li class="active">Business</li>
    <li class="active">Categories</li>
</ol>




<div class="row">
    <div class="box-body">
        <div class="box box-primary">
            
            <div class="box-header with-border">
                <h3 class="box-title">Categories</h3>
            </div>
                <?= $this->Form->create($category, ['class' => 'form-horizontal']) ?>
                <div class="box-body">
                    <div class="form-group">
                        <label style="padding-top: 25px" class="col-sm-2 control-label" for="">Parent Category</label>
                        <div class="col-sm-10">
                            <?= $this->Form->control('parent_id', ['options' => $parentCategories, 'class' => 'form-control', 'label' => '', 'empty' => true]);?>
                        </div>
                    </div>
                
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="">Name</label>
                        <div class="col-sm-10">
                            <?= $this->Form->text('name', ['size' => '50','class' => 'form-control']);?>
                        </div>
                    </div>
                   
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="">Description</label>
                        <div class="col-sm-10">
                            <?= $this->Form->textarea('description', ['rows' => '10', 'class' => 'form-control']);?>
                        </div>
                    </div>
                    <div class="box-footer">
                        <div class="pull-right box-tools">
                            <?= $this->Form->button(__('Submit'),['class' => 'btn btn-primary']) ?>
                            <?= $this->Html->link('Back', ['action'=>'index'], ['class' => 'btn btn-default']);?>
                        </div>
                    </div>
                 </div>
        </div>
        <?= $this->Form->end() ?>
        </div>
    </div>
</div>
                
                
                
