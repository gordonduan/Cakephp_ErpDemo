<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Order[]|\Cake\Collection\CollectionInterface $orders
 */
?>


<ol class="breadcrumb" style="text-align:right; background:transparent; margin-top:-10px; margin-bottom:-10px">
    <li><?= $this->Html->link('<i class="fa fa-home"></i>'.__(' Homepage', true), ['controller' => 'Pages', 'action' => 'display', 'home'], ['escape' => false]); ?></li>
    <li class="active">Business</li>
    <li class="active">Reports</li>
</ol>
<?= $this->Flash->render() ?>
<div class="row">
    <div class="box-body">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Reports</h3>
                <div class="pull-right box-tools">
                        <?= $this->Html->link('<i class="fa fa-refresh"></i>'.__(' Refresh', true), ['action' => 'refresh'], ['escape' => false]); ?>
                </div>
            </div>
            <div class="box-body">
                <div class="search-wrap">
            
                    <div class="search-content">
              <?= $this->Form->create('product', ['url' => ['action' => 'search']])?>
                   <table class="search-tab">
                      <tr>
                          <th width="100">Categories</th>
                          <td><?= $this->Form->control('category_id', ['options' => $categories, 'id'=>'category', 'label' => '', 'empty' => true]);?></td>
                          <th width="90">&nbsp;&nbsp;&nbsp;Products</th>
                          <td><?= $this->Form->control('product_id', ['options' => $products, 'id'=>'product', 'label' => '', 'empty' => true]);?></td>                         
                          <th width="70">&nbsp;&nbsp;&nbsp;Name</th>
                          <td><input class="common-text" placeholder="Name" name="keywords" value="" id="" type="text"></td>
                          
                          <td>&nbsp;&nbsp;&nbsp;<input class="btn btn-primary btn2" name="sub" value="Search" type="submit"></td>
                          
                      </tr>
                  </table>
                <?= $this->Form->end() ?>
            </div>
                </div>
                
                <div class="table-scrollable" style="margin-top:10px">
					<table id="dataTable" class="table table-striped table-bordered table-hover dataTable no-footer" role="grid" aria-describedby="sample_2_info">
                        <thead>
                            <tr role="row">
                                <th scope="col"><?= __('Id') ?></th>
                                <th scope="col"><?= __('Product') ?></th>
                                <th scope="col"><?= __('Category') ?></th>
                                <th scope="col"><?= __('Name') ?></th>
                                <th scope="col"><?= __('Description') ?></th>
                                <th scope="col"><?= __('Quantity') ?></th>
                                <th scope="col"><?= __('Price') ?></th>
				<th scope="col"><?= __('Amount') ?></th>
                                <th scope="col"><?= __('Date') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($sales as $sale): ?>
                            <tr>
                              <td><?= $this->Number->format($sale->id) ?></td>
                                <td><?= $sale->has('product') ? $sale->product->name : '' ?></td>
                                <td><?= $sale->has('category') ? $sale->category->name : '' ?></td>
                                <td><?= h($sale->name) ?></td>
                                <td><?= h($sale->description) ?></td>
                                <td><?= $this->Number->format($sale->quantity) ?></td>
                                <td><?= $this->Number->format($sale->price, ['places' => 2,'before' => '$',]) ?></td>
                                <td><?= $this->Number->format($sale->amount, ['places' => 2,'before' => '$',]) ?></td>
                                <td><?= h($sale->date) ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    
                    <div class="paginator">
                            <ul class="pagination">
                                <?= $this->Paginator->first('<< ' . __('first')) ?>
                                <?= $this->Paginator->prev('< ' . __('previous')) ?>
                                <?= $this->Paginator->numbers() ?>
                                <?= $this->Paginator->next(__('next') . ' >') ?>
                                <?= $this->Paginator->last(__('last') . ' >>') ?>
                            </ul>
                            <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
                    </div>
                </div>

            </div>
            <!--box body-->
        </div>
        <!--box primary-->
    </div>
</div>

<!--send ajax request to controller.get return response to filter products by categories or filter categories by product -->
<script>
$(document).ready(function(){
    $("#category").change(function(){
        $.ajax({
        type: "POST",
        url: "<?= $this->Url->build(['controller'=>'Sales', 'action'=>'productfilter']) ?>",
        data: {categoryid: $(this).val()},
        dataType: 'json',
        success: function(data) {
            $("#product").empty();
            $("#product").append("<option value=''></option>");  
            for (var i in data) {  
                 $("#product").append("<option value='"+i+"'>"+ data[i]+ "</option>");  
            } 
        }
    });
    });
});
</script>