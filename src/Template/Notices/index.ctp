<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Notice[]|\Cake\Collection\CollectionInterface $notices
 */
?>

<ol class="breadcrumb" style="text-align:right; background:transparent; margin-top:-10px; margin-bottom:-10px">
    <li><?= $this->Html->link('<i class="fa fa-home"></i>'.__(' Homepage', true), ['controller' => 'Pages', 'action' => 'display', 'home'], ['escape' => false]); ?></li>
    <li class="active">Business</li>
    <li class="active">Notices</li>
</ol>
<?= $this->Flash->render() ?>
<div class="row">
    <div class="box-body">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Notices</h3>
                <div class="pull-right box-tools">
                        <!--<?= $this->Html->link('<i class="fa fa-plus"></i>'.__(' Add Notice', true), ['action' => 'add'], ['escape' => false]); ?>
                        &nbsp;&nbsp;&nbsp;
                        <?= $this->Html->link('<i class="fa fa-refresh"></i>'.__(' Refresh', true), ['action' => 'refresh'], ['escape' => false]); ?>-->
                        <?= $this->Html->link('Refresh', ['controller' => 'Notices','action' => 'refresh'],['id' => 'btnRefresh','style' => 'visibility:hidden']); ?>
                        <?= $this->Html->link('Reload', ['controller' => 'Notices','action' => 'reload'],['id' => 'btnReload','style' => 'visibility:hidden']); ?>
                        <button id="btnAdd" class="btn btn-primary" type="button" data-original-title="New Notice" data-toggle="tooltip" data-widget="">
                            <i class="fa fa-plus-square"></i>&nbsp;&nbsp;New Notice
                        </button>
                        <button id="btnLoad" title="" class="btn btn-success" type="button" data-original-title="Reload Notices" >
                            <i class="fa fa-list"></i>&nbsp;&nbsp;Refresh
                        </button>
                </div>
            </div>
            <div class="box-body">
                <div class="search-wrap">
            
                    <div class="search-content">
              <?= $this->Form->create('notice', ['url' => ['action' => 'search']])?>
                   <table class="search-tab">
                      <tr>
                          <th width="100">Categories</th>
                          <td>
                              <select name="catid" id="catid" class="required">
                                    <option value="0">Please slect</option>
                                    <option value="1">Sales</option>
                                    <option value="2">Administration</option>
                                    <option value="3">HR</option>
                                    <option value="4">Finance</option>
                                    <option value="5">Business</option>
                              </select>
                          </td>                     
                          <th width="70">&nbsp;&nbsp;&nbsp;Title</th>
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
                                <th scope="col"><?= __('Category') ?></th>
                                <th scope="col"><?= __('Title') ?></th>
                             <!--   <th scope="col"><?= __('Document') ?></th>
                                <th scope="col"><?= __('Image') ?></th>
                                <th scope="col"><?= __('Video') ?></th> -->
				<th scope="col"><?= __('Created') ?></th>
                                <th scope="col"><?= __('Modified') ?></th>
                                <th scope="col" class="actions"><?= __('Actions') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($notices as $notice): ?>
                            <tr>
                               <td><?= $this->Number->format($notice->id) ?></td>
                                <td><?= h($notice->name) ?></td>
                                <td><?= h($notice->title) ?></td>
                        <!--    
                                <td><?php if (!empty($notice->document) & file_exists($_SERVER['DOCUMENT_ROOT'] . '/erp/webroot/'.$notice->document))echo $this->Html->link('<i class="icon-font">&#xe926;</i>'.__(trim(strrchr($notice->document, '/'),'/'), true), '/webroot/'.$notice->document, ['target' => '_blank','escape' => false]); ?></td>
                                <td><?php if (!empty($notice->image) & file_exists($_SERVER['DOCUMENT_ROOT'] . '/erp/webroot/'.$notice->image)) echo $this->Html->link('<i class="icon-font">&#xe927;</i>'.__(trim(strrchr($notice->image, '/'),'/'), true), '/webroot/'.$notice->image, ['target' => '_blank','escape' => false]); ?></td>
                                <td><?php if (!empty($notice->video) & file_exists($_SERVER['DOCUMENT_ROOT'] . '/erp/webroot/'.$notice->video)) echo $this->Html->link('<i class="icon-font">&#xe92a;</i>'.__(trim(strrchr($notice->video, '/'),'/'), true), '/webroot/'.$notice->video, ['target' => '_blank','escape' => false]); ?></td>
                        -->  
                                <td><?= h($notice->created) ?></td>
                                <td><?= h($notice->modified) ?></td>
                                <td class="actions">
                                    <!--<?= $this->Html->link(__('View'), ['action' => 'view', $notice->id]) ?>
                                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $notice->id]) ?>
                                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $notice->id], ['confirm' => __('Are you sure you want to delete # {0}?', $notice->id)]) ?>-->
                                    
                                    <button class="btn btn-info btn-xs" onClick="edit('<?php echo $notice->id?>')"><i class="fa fa-edit"></i>Edit</button>
                                    <button class="btn btn-danger btn-xs" onClick="deleteSingle('<?php echo $notice->id?>')"><i class="fa fa-trash-o"></i>Delete</button>
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

                <div class="box-body">
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="">Categories</label>
                        <div class="col-sm-10">
                            <select name="catid" id="Catid" class="form-control">
                                    <option value="0">Please slect</option>
                                    <option value="1">Sales</option>
                                    <option value="2">Administration</option>
                                    <option value="3">HR</option>
                                    <option value="4">Finance</option>
                                    <option value="5">Business</option>
                              </select>
                        </div>
                    </div>
                    <input type = "hidden" class="common-text required" id="Noticecat" name="noticecat" size="50" value="" type="text">
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="">Title</label>
                        <div class="col-sm-10">
                            <input class="form-control" id="Name" type="text" placeholder="Title" maxlength="40">
                        </div>
                    </div>
                   
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="">Content</label>
                        <div class="col-sm-10">
                            <textarea id="Content" class="form-control" rows="3"></textarea>
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



<script>
    $(function () {
        $("#btnAdd").click(function () { add(); });
        $("#btnSave").click(function () { save(); });
        $("#btnDelete").click(function () { deleteMulti(); });
        $("#btnLoad").click(function () {
            refresh();
        });
        $("#checkAll").click(function () { checkAll(this) });
    });
    function edit(id) {
        $.ajax({
        type: "Get",        
        url: "/Notices/get/" + id + "&_t=" + new Date(),
        
        success: function (data) {
        //visible
            $("#Id").val(data.id);
            $("#Catid").val(data.category);
            $("#Noticecat").val(data.name);
            $("#Name").val(data.title);
            $("#Content").val(data.content);
            //Pop up add modal
            $("#Title").text("Edit Notice");
            $("#editModal").modal("show");
        }
    })
    };
    
    function add() {
        $("#Id").val("");
        $("#Catid").val("0");
        $("#Noticecat").val("");
        $("#Name").val("");
        $("#Content").val("");
        //Pop up add modal
        $("#Title").text("New Notice");
        $("#editModal").modal("show");
    };
    function save() {
    if ($("#Catid").val() == 0) {
        layer.tips('Please select category', "#btnSave");
        return;
    };
    if ($("#Name").val().length == 0) {
        layer.tips('Please input title', "#btnSave");
        return;
    };
    var postData = {id:$("#Id").val(), category: $("#Catid").val(), name: $("#Noticecat").val(), title: $("#Name").val(), content:$("#Content").val()};
    $.ajax({
        type: "Post",
        url: "<?= $this->Url->build(['controller'=>'Notices', 'action'=>'save']) ?>",
        data: postData,
        success: function (data) {
            if (data.result == "Success") {
                refresh();
                layer.msg("The notice has been saved.");
                $("#editModal").modal("hide");
            } else {
                layer.tips(data.message, "#btnSave");
            };
        }
    });
    };
    
    function deleteSingle(id) {
        layer.confirm("Confirm to delete the item?", {
            btn: ["Confirm", "Cancel"]
        }, function () {
            $.ajax({
                type: "POST",
                url: "<?= $this->Url->build(['controller'=>'Notices', 'action'=>'deletesingle']) ?>",
                data: { "id": id },
                success: function (data) {
                    if (data.result == "Success") {
                        refresh();
                        layer.msg("The notice has been deleted.");
                    }
                    else {
                        layer.alert(data.message);
                    }
                }
            })
        });
    };
    
    function refresh() {
        document.getElementById('btnRefresh').click();
    };
    function reload() {
        document.getElementById('btnReload').click();
    };
    $(document).ready(function(){
    $("#Catid").change(function(){  
            //code...  
            var category_text=$("#Catid").find("option:selected").text();  
            $("#Noticecat").val(category_text);  
        })
    });  
</script>
    