<div class="row">
    <div class="col-sm-12 mt-5">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary btn-md mb-3" data-toggle="modal" data-target="#modelId">
            <i class="fa fa-plus"></i> Input Article
        </button>
        <div class="card">
            <div class="card-header bg-primary text-white">
                Data Article
            </div>
            <div class="card-body">
                <div id="table-artikel"></div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> Input Article</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <form method="POST" id="Store">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Title</label>
                        <input type="text" class="form-control" required name="title" id="title" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="">Category</label>
                        <select class="form-control" required name="category">
                            <option value="" disabled selected> - select - </option>
                            <?php foreach($category as $r){?>
                                <option><?= $r->category;?></option>
                            <?php }?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Content</label>
                        <textarea class="form-control" required name="content" id="content" placeholder=""></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Authors</label>
                        <input type="text" class="form-control" required name="authors" id="authors" placeholder="">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $('#table-artikel').load('<?= base_url('home/article');?>');
</script>
<!-- insert data -->
<script>
    $("#Store").submit(function(e){
        e.preventDefault();
        $.ajax({
            url: "<?= base_url('api/article/store');?>",
            type: 'POST',
            data:new FormData(this),
            processData:false,
            contentType:false,
            cache:false,
            async:false,
            dataType: "JSON",
            success:function(data){
                alert(data.message);
                $('#Store')[0].reset();
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