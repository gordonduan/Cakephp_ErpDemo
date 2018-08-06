<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product $product
 */
?>

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Category $category
 */
?>
<!--
<script>
function getdata(id)
{
    var xmlhttp;
    if (id=="")
    {
        document.getElementById("txtHint").innerHTML="";
        return;
    } 
    else{
        document.getElementById("txtHint").innerHTML=id;
    }
    
    
     var request = new XMLHttpRequest();
     
    request.onreadystatechange = function() {
//        if (request.readyState === 4) {
//            alert(request.status);
//            alert(request.responseText);
//            document.getElementById("txtHint").innerHTML=request.responseText;
//            if (request.status === 200) {
//                       // OK
//
//                       alert('ok!');
//            } else {
//                       // not OK
//                       alert('failure!');
//            }
//        }
    };
    request.open('GET', '/erp/orders/product', true);
    request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    request.send("id="+id);
    
}


$(document).ready(function(){
$("#product").change(function(){
    alert($(this).val());
    $.ajax(
        {   type:"POST",
            url: '/erp/orders/product',
            data: {id: $(this).val()},
            success: function(data,status)
            {
                alert(data);
            }
        });
});
});
</script>
-->


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
                                  <option value="0">Purchasing Order</option>
                                  <option value="1">Sales Order</option>
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



<!--send ajax request to controller, when select product, get product info and fill into the form automatically -->
<script>
$(document).ready(function(){
$("#product").change(function(){
    $.ajax({
    type: "POST",
    url: "<?= $this->Url->build(['controller'=>'Orders', 'action'=>'getproduct']) ?>",
    data: {productid: $(this).val()},
    dataType: 'json',
    success: function(data) {
//        console.log("Reset user#"+data.name+data.description+"'s password successfully.");
//        alert(data.name);
        $('#name').val((data.name));
        $('#description').val((data.description));
    }
});
});
});
</script>


















<!--
<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Order $order
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Orders'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="orders form large-9 medium-8 columns content">
    <?= $this->Form->create($order) ?>
    <fieldset>
        <legend><?= __('Add Order') ?></legend>
        <?php
            echo $this->Form->control('product_id', ['options' => $products, 'empty' => true]);
            echo $this->Form->control('name');
            echo $this->Form->control('description');
            echo $this->Form->control('quantity');
            echo $this->Form->control('type');
            echo $this->Form->control('status');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
-->
