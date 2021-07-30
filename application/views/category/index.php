<div class="row">
    <div class="col-sm-12 mt-5">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary btn-md mb-3" data-toggle="modal" data-target="#modelId">
            <i class="fa fa-plus"></i> Input category
        </button>
        <div class="card">
            <div class="card-header bg-primary text-white">
                Data Category
            </div>
            <div class="card-body">
                <div id="table-kategori"></div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> Input Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <form method="POST" id="Store">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Category</label>
                        <input type="text" class="form-control" name="category" id="category" placeholder="">
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
    $('#table-kategori').load('<?= base_url('home/data_category');?>');
</script>
<!-- insert data -->
<script>
    $("#Store").submit(function(e){
        e.preventDefault();
        $.ajax({
            url: "<?= base_url('api/category/store');?>",
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