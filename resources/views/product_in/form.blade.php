<div class="modal fade" id="modal-form" tabindex="1" role="dialog" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <form  id="form-item" method="post" class="form-horizontal" data-toggle="validator" enctype="multipart/form-data" >
                {{ csrf_field() }} {{ method_field('POST') }}

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h3 class="modal-title"></h3>
                </div>


                <div class="modal-body">
                    <input type="hidden" id="id" name="id">


                    <div class="box-body">
                        <div class="form-group">
                            <label>Products</label><br>
                           
                            {!! Form::select('product_id', $products, null, ['class' => 'form-control select2', 'placeholder' => '-- Choose Product --', 'id' => 'product_id','onchange'=>"myFunction();", 'required'] )!!} 
                            <span class="help-block with-errors"></span>
                        </div>

                        <div class="form-group">
                            <label>Product Name</label><br>
                            <input type="text" class="form-control" id="pname" name="pname" required>
                            <span class="help-block with-errors"></span>
                        </div>

                        <div class="form-group">
                            <label>Quantity</label>
                            <input type="text" class="form-control" id="qty" name="qty" required>
                            <span class="help-block with-errors"></span>
                        </div>

                        <div class="form-group">
                            <label>Date</label>
                            <input data-date-format='yyyy-mm-dd' type="text" class="form-control" id="date" name="date"   required>
                            <span class="help-block with-errors"></span>
                        </div>

                    </div>
                    <!-- /.box-body -->

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>

            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- /.modal -->
<script>
  function myFunction() {
  
  var BarID = $("#product_id").val();
  
  $.ajax({
                                        type: "GET",
                                        url: "{{url ('GetproductData')}}",
                                        data: {BarID: BarID},
                                        dataType: "json", 
                                        success: function(result) {
                                            $.each(result, function(i, item)
                                                {

                                                    $("#pname").val(item.name);
                                                    });   
                                        } 
                                });     


  
  }
</script>