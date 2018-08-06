<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Order[]|\Cake\Collection\CollectionInterface $orders
 */
?>


<script>

function formsubmit()
{
  alert('Only administrator can modify stock!');
}
</script>


<ol class="breadcrumb" style="text-align:right; background:transparent; margin-top:-10px; margin-bottom:-10px">
    <li><?= $this->Html->link('<i class="fa fa-home"></i>'.__(' Homepage', true), ['controller' => 'Pages', 'action' => 'display', 'home'], ['escape' => false]); ?></li>
    <li class="active">Business</li>
    <li class="active">Stocks</li>
</ol>
<?= $this->Flash->render() ?>
<div class="row">
    <div class="box-body">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Stocks</h3>
                <div class="pull-right box-tools">
                        <a id="addstock" href="javascript:void(0)" onclick="formsubmit()"><i class="fa fa-plus"></i>Modify Stock</a>
                        &nbsp;&nbsp;&nbsp;
                        <?= $this->Html->link('<i class="fa fa-refresh"></i>'.__(' Refresh', true), ['action' => 'refresh'], ['escape' => false]); ?>
                </div>
            </div>
            <div class="box-body">
                <div class="search-wrap">
            
                    <div class="search-content">
              <?= $this->Form->create('stock', ['url' => ['action' => 'search']])?>
                    <table class="search-tab">
                        <tr>
                            <th width="70">Name:</th>
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
                                <th scope="col"><?= __('Product_Id') ?></th>
                                <th scope="col"><?= __('Name') ?></th>
                                <th scope="col"><?= __('Description') ?></th>
                                <th scope="col"><?= __('Quantity') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($stocks as $stock): ?>
                            <tr>
                              <td><?= $this->Number->format($stock->product_id) ?></td>
                          <!--    <td><?= $stock->has('product') ? $this->Html->link($stock->product->name, ['controller' => 'Products', 'action' => 'view', $stock->product->id]) : '' ?></td> -->
                              <td><?= h($stock->name) ?></td>
                              <td><?= h($stock->description) ?></td>
                              <td><?= $this->Number->format($stock->quantity) ?></td>
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


