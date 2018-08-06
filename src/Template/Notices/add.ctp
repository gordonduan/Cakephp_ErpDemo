<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Notice $notice
 */
?>

<div id="editModal" tabindex="-1" class="modal fade in" aria-hidden="true">
    <div class="modal-dialog">
        <div class="box box-info">
            <div class="box-header with-border">
                <h5 class="box-title" id="Title"></h5>
                <button class="close" aria-label="Close" type="button" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form class="form-horizontal">
                <input type="hidden" id="Id" />
                <input type="hidden" id="Code" />
                <input type="hidden" id="ProductId" />
                <input type="hidden" id="QuantityPerUnit" />
                <input type="hidden" id="IsValid" />
                <input type="hidden" id="CreatedTime" />
                <input type="hidden" id="ModifiedTime" />

                <div class="box-body">
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="">Categories</label>
                        <div class="col-sm-10">
                            <select name="catid" id="catid" class="form-control">
                                    <option value="0">Please slect</option>
                                    <option value="1">Sales</option>
                                    <option value="2">Administration</option>
                                    <option value="3">HR</option>
                                    <option value="4">Finance</option>
                                    <option value="5">Business</option>
                              </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="">Title</label>
                        <div class="col-sm-10">
                            <input class="form-control" id="Name" type="text" placeholder="Title" maxlength="40">
                        </div>
                    </div>
                   
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="">Content</label>
                        <div class="col-sm-10">
                            <textarea id="Description" class="form-control" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="box-footer">
                        <div class="pull-right box-tools">
                            <button id="btnSave" class="btn btn-primary" type="button">Save</button>
                            <button class="btn btn-default" type="button" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                 </div>
            </form>
        </div>
    </div>
</div>


<!--Pass category name to hidden element "noticecat", save it in database -->
<script>
$(document).ready(function(){
$("#catid").change(function(){  
        //code...  
        var category_text=$("#catid").find("option:selected").text();  
        $("#noticecat").val(category_text);  
    })
});  
</script>  


<!--
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Notices'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="notices form large-9 medium-8 columns content">
    <?= $this->Form->create($notice) ?>
    <fieldset>
        <legend><?= __('Add Notice') ?></legend>
        <?php
            echo $this->Form->control('category');
            echo $this->Form->control('name');
            echo $this->Form->control('title');
            echo $this->Form->control('text');
            echo $this->Form->control('picture');
            echo $this->Form->control('video');
            echo $this->Form->control('content');
            echo $this->Form->control('status');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
-->