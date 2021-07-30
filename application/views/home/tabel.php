<div class="table-responsive">
    <table class="table table-hover table-bordered" id="mytable">
        <thead>
            <tr>
                <th>No</th>
                <th>Title</th>
                <th>Category</th>
                <th>Authors</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $no =1;
                foreach($article as $r){
            ?>
            <tr>
                <td><?= $no;?></td>
                <td><?=$r->title;?></td>    
                <td><?=$r->category;?></td>     
                <td><?=$r->authors;?></td>      
                <td><?=$r->created_at;?></td>
                <td>
                    <a href="javascript:void(0)" 
                        data-id="<?= $r->id;?>"
                        class="btn btn-success btn-sm edit_article" 
                        title="Edit">
                        <i class="fa fa-edit"></i> 
                    </a> 
                    <a href="javascript:void(0)"
                        class="btn btn-danger btn-sm delete_article" 
                        data-id="<?= $r->id;?>"
                        onclick="javascript:return confirm(`Article ingin dihapus ?`);" 
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
                <h5 class="modal-title">Edit Article</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <form method="POST" id="Update">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Title</label>
                        <input type="text" class="form-control" required name="title" id="title_edit" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="">Category</label>
                        <select class="form-control" name="category" id="category_edit">
                            <option value="" disabled> - select - </option>
                            <?php foreach($category as $r){?>
                                <option value="<?= $r->category;?>"><?= $r->category;?></option>
                            <?php }?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Content</label>
                        <textarea class="form-control" style="height:150px;" 
                            name="content" required id="content_edit" placeholder=""></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Authors</label>
                        <input type="text" class="form-control" required name="authors" id="authors_edit" placeholder="">
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
    $('#mytable tbody').on('click', '.edit_article', function(e){
        var wid = $(this).attr('data-id');
        $.ajax({
            url: "<?= base_url('api/article/edit/id');?>/"+wid,
            type: 'GET',
            dataType: "JSON",
            success:function(data){
                $('#modelIdEdit').modal('show');
                $('#category_edit option[value="' + data.category + '"]').prop('selected', true);
                $('#title_edit').val(data.title);
                $('#content_edit').val(data.content);
                $('#authors_edit').val(data.authors);
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
    $('#mytable tbody').on('click', '.delete_article', function(e){
        var id = $(this).attr('data-id');
        $.ajax({
            url: "<?= base_url('api/article/delete/id');?>/"+id,
            type: 'GET',
            dataType: "JSON",
            success:function(data){
                alert(data.message);
                $('#table-artikel').load('<?= base_url('home/article');?>');
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
            url: "<?= base_url('api/article/update');?>",
            type: 'POST',
            data:new FormData(this),
            processData:false,
            contentType:false,
            cache:false,
            async:false,
            dataType: "JSON",
            success:function(data){
                alert(data.message);
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
    $('#modelIdEdit').on('hidden.bs.modal', function () {
        $('#table-artikel').load('<?= base_url('home/article');?>');
    });
</script>