<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product $product
 */
?>


<ol class="breadcrumb" style="text-align:right; background:transparent; margin-top:-10px; margin-bottom:-10px">
    <li><?= $this->Html->link('<i class="fa fa-home"></i>'.__(' Homepage', true), ['controller' => 'Pages', 'action' => 'display', 'home'], ['escape' => false]); ?></li>
    <li class="active">Business</li>
    <li class="active">Orders</li>
</ol>

<div class="row">
    <div class="box-body">
        <div class="box box-primary">
            
            <div class="box-header with-border">
                <h3 class="box-title">Orders</h3>
            </div>
         <!--   <?= $this->Flash->render() ?> -->
                <?= $this->Form->create($order, ['class' => 'form-horizontal']) ?>
                <div class="box-body">
                    <div class="form-group">
                        <label style="padding-top: 25px" class="col-sm-2 control-label" for="">Product</label>
                        <div class="col-sm-10">
                            <?= $this->Form->control('product_id', ['label' =>'', 'id'=>'product', 'options' => $products, 'class' => 'form-control', 'empty' => true]);?>
                        </div>
                    </div>
                
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="">Name</label>
                        <div class="col-sm-10">
                            <?= $this->Form->text('name', ['value'=>$order->name, 'id'=>'name', 'class' => 'form-control']);?>
                        </div>
                    </div>
                     <div class="form-group">
                        <label style="padding-top: 25px" class="col-sm-2 control-label" for="">Quantity</label>
                        <div class="col-sm-10">
                            <?= $this->Form->control('quantity',['label' =>'', 'class' => 'form-control'])?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="">Order Type</label>
                        <div class="col-sm-10">
                            <select name="type", class="form-control">
                                  <option value="">(choose one)</option>
                                  <option value="0" <?php if($order->type == "0")echo "selected=\"selected\"";?>>Purchasing Order</option>
                                  <option value="1" <?php if($order->type == "1")echo "selected=\"selected\"";?>>Sales Order</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="">Description</label>
                        <div class="col-sm-10">
                            <?= $this->Form->textarea('description', ['rows' => '10', 'id'=>'description',  'class' => 'form-control']);?>
                        </div>
                    </div>
                   
                    <div class="form-group">
                        <input type="hidden" name="status" value="0" />
                    </div>
                    <div class="box-footer">
                        <div class="pull-right box-tools">
                            <?= $this->Form->button(__('Submit'),['class' => 'btn btn-primary']) ?>
                            <?= $this->Html->link('Back', ['action'=>'index'], ['class' => 'btn btn-default']);?>
                        </div>
                    </div>
                 </div>
            <?= $this->Form->end() ?>
        </div>
        </div>
    </div>
</div>

