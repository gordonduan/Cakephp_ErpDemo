<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Category[]|\Cake\Collection\CollectionInterface $categories
  * @var \App\Model\Entity\Category $category
 */
?>

<ol class="breadcrumb" style="text-align:right; background:transparent; margin-top:-10px; margin-bottom:-10px">
    <li><?= $this->Html->link('<i class="fa fa-home"></i>'.__(' Homepage', true), ['controller' => 'Pages', 'action' => 'display', 'home'], ['escape' => false]); ?></li>
    <li class="active">Business</li>
    <li class="active">Categories</li>
</ol>

<?= $this->Flash->render() ?>

<div class="row">
    <div class="box-body">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Categories</h3>
                <div class="pull-right box-tools">
                        <?= $this->Html->link('<i class="fa fa-plus"></i>'.__(' Add Category', true), ['controller' => 'Categories', 'action' => 'add'], ['escape' => false]); ?>
                        &nbsp;&nbsp;&nbsp;
                        <a id="batchDel" href="javascript:void(0)" onclick="formsubmit()"><i class="fa fa-trash"></i> Batch Delete</a>
                        <a><input class="icon-font" name=" batchdel" value=" batchdel" type="submit" style="display:none"></a>
                        &nbsp;&nbsp;&nbsp;
                        <?= $this->Html->link('<i class="fa fa-refresh"></i>'.__(' Refresh', true), ['action' => 'refresh'], ['escape' => false]); ?>
                </div>
            </div>
            <div class="box-body">
                <div class="search-wrap">
            
                    <div class="search-content">
                        <?= $this->Form->create('category', ['url' => ['action' => 'search']])?>
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
                <?= $this->Form->create('myform', ['id' => 'batchdelform', 'url' => ['action' => 'batchdel']])?>
                <div class="table-scrollable" style="margin-top:10px">
                    <table id="dataTable" class="table table-striped table-bordered table-hover dataTable no-footer" role="grid" aria-describedby="sample_2_info">
                        <thead>
                            <tr role="row">
                                <th class="tc" width="5%"></th>
                                <th scope="col"><?= __('Id') ?></th>
                                <th scope="col"><?= __('Parent_Category') ?></th>
                                <th scope="col"><?= __('Name') ?></th>
                                <th scope="col"><?= __('Description') ?></th>
                                <th scope="col"><?= __('Created') ?></th>
                                <th scope="col"><?= __('Modified') ?></th>
                                <th scope="col" class="actions"><?= __('Actions') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($categories as $category): ?>
                            <tr>
                                <td class="tc"><input name="id[]" value="<?= $category->id ?>" type="checkbox"></td>
                                <?= $this->Form->end() ?>
                                <td><?= $this->Number->format($category->id) ?></td>
                                <td><?= $category->has('parent_category') ? $category->parent_category->name : '' ?></td">
                                <td><?= h($category->name) ?></td>
                                <td><?= h($category->description) ?></td>
                                <td><?= h($category->created) ?></td>
                                <td><?= h($category->modified) ?></td>
                                <td class="actions">
                                    <?= $this->Html->link(__('View'), ['action' => 'view', $category->id]) ?>
                                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $category->id]) ?>
                                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $category->id], ['confirm' => __('Are you sure you want to delete # {0}?', $category->id)]) ?>
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

<script>

function formsubmit()
{
  var a = document.getElementsByName("id[]");
  var n = a.length;
  var k = 0;
  for (var i=0; i<n; i++){
       if(a[i].checked){
           k = 1;
       }
   }
       if(k==0){
       alert("Please select at least one record!");
       return;
   }
  if (confirm('Are you sure you want to delete these categories?')) {
      document.getElementById("batchdelform").submit();
  }else{
        return;
    }
}
</script>