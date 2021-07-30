<div class="table-responsive">
    <table class="table table-hover table-bordered" id="mytable">
        <thead>
            <tr>
                <th>No</th>
                <th>Category</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $no =1;
                foreach($category as $r){
            ?>
            <tr>
                <td><?= $no;?></td>
                <td><?=$r->category;?></td>     
                <td><?=$r->created_at;?></td>
                <td>
                    <a href="javascript:void(0)" 
                        data-id="<?= $r->id;?>"
                        class="btn btn-success btn-sm edit_category" 
                        title="Edit">
                        <i class="fa fa-edit"></i> 
                    </a> 
                    <a href="javascript:void(0)"
                        class="btn btn-danger btn-sm delete_category" 
                        data-id="<?= $r->id;?>"
                        onclick="javascript:return confirm(`category ingin dihapus ?`);" 
                        title="Delete">
                        <i class="fa fa-times"></i> 
                    </a>
                </td>
            </tr>
            <?php $no++; }?>
        </tbody>
    </table>
</div>
<!-- Modal -->
<div class="modal fade" id="modelIdEdit" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <form method="POST" id="Update">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Category</label>
                        <input type="text" class="form-control" name="category" id="category_edit" placeholder="">
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" value="" id="id_edit" name="id">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $('#mytable').dataTable();
</script>
<script>
    $('#mytable tbody').on('click', '.edit_category', function(e){
        var wid = $(this).attr('data-id');
        $.ajax({
            url: "<?= base_url('api/category/edit/id');?>/"+wid,
            type: 'GET',
            dataType: "JSON",
            success:function(data){
                $('#modelIdEdit').modal('show');
                $('#category_edit').val(data.category);
                $('#id_edit').val(data.id);
            },
            'error': function(xmlhttprequest, textstatus, message) {
                if(textstatus==="timeout") {
                    alert("request timeout");
                }else{
                    alert("request timeout");
                }
            }
        });
    });
</script>
<script>
    $('#mytable tbody').on('click', '.delete_category', function(e){
        var id = $(this).attr('data-id');
        $.ajax({
            url: "<?= base_url('api/category/delete/id');?>/"+id,
            type: 'GET',
            dataType: "JSON",
            success:function(data){
                alert(data.message);
                $('#table-kategori').load('<?= base_url('home/data_category');?>');
            },
            'error': function(xmlhttprequest, textstatus, message) {
                if(textstatus==="timeout") {
                    alert("request timeout");
                }else{
                    alert("request timeout");
                }
            }
        });
    });

</script>
<script>
    $("#Update").submit(function(e){
        e.preventDefault();
        $.ajax({
            url: "<?= base_url('api/category/update');?>",
            type: 'POST',
            data:new FormData(this),
            processData:false,
            contentType:false,
            cache:false,
            async:false,
            dataType: "JSON",
            success:function(data){
                alert(data.message);
                $('#table-kategori').load('<?= base_url('home/data_category');?>');
            },
            'error': function(xmlhttprequest, textstatus, message) {
                if(textstatus==="timeout") {
                    alert("request timeout");
                }else{
                    alert("request timeout");
                }
            }
        });
    });
</script>