<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product[]|\Cake\Collection\CollectionInterface $products
 */
?>
<ol class="breadcrumb" style="text-align:right; background:transparent; margin-top:-10px; margin-bottom:-10px">
    <li><?= $this->Html->link('<i class="fa fa-home"></i>'.__(' Homepage', true), ['controller' => 'Pages', 'action' => 'display', 'home'], ['escape' => false]); ?></li>
    <li class="active">Business</li>
    <li class="active">Products</li>
</ol>
<?= $this->Flash->render() ?>
<div class="row">
    <div class="box-body">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Products</h3>
                <div class="pull-right box-tools">
                        <?= $this->Html->link('<i class="fa fa-plus"></i>'.__(' Add Product', true), ['action' => 'add'], ['escape' => false]); ?>
                        &nbsp;&nbsp;&nbsp;
                        <?= $this->Html->link('<i class="fa fa-refresh"></i>'.__(' Refresh', true), ['action' => 'refresh'], ['escape' => false]); ?>
                </div>
            </div>
            <div class="box-body">
                <div class="search-wrap">
            
                    <div class="search-content">
              <?= $this->Form->create('product', ['url' => ['action' => 'search']])?>
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
                                <th scope="col"><?= __('Id') ?></th>
                                <th scope="col"><?= __('Name') ?></th>
                                <th scope="col"><?= __('Description') ?></th>
                                <th scope="col"><?= __('Category') ?></th>
                                <th scope="col"><?= __('Price') ?></th>
								<th scope="col"><?= __('Created') ?></th>
                                <th scope="col"><?= __('Modified') ?></th>
                                <th scope="col" class="actions"><?= __('Actions') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($products as $product): ?>
                            <tr>
                                <td><?= $this->Number->format($product->id) ?></td>
                              <td><?= h($product->name) ?></td>
                              <td><?= h($product->description) ?></td>
                              <td><?= $product->has('category') ? $product->category->name : '' ?></td>
                              <td><?= $this->Number->currency($product->price, 'USD') ?></td>
                              <td><?= h($product->created) ?></td>
                              <td><?= h($product->modified) ?></td>
                              <td class="actions">
                                <!--  <?= $this->Html->link(__('View'), ['action' => 'view', $product->id]) ?> -->
                                  <?= $this->Html->link(__('Edit'), ['action' => 'edit', $product->id]) ?>
                                  <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $product->id], ['confirm' => __('Are you sure you want to delete # {0}?', $product->id)]) ?>
                              </td>
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

