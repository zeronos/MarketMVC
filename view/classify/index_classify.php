<html>
<?php include("./lib/head.php"); ?>


<body>
<div class="row">
    <div class="col">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#creatClassify">
            Create Classify
        </button>
    </div>
    <div class="col">
            <form class="form-inline mr-auto" method ="get">
                <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search" name ="key-classid">
                <input type="hidden" name="controller" value="classify">
                <input type="hidden" name="action" value="search_class">
                <button class="btn btn-info" type="submit">Search</button>
            </form>

    </div>
</div>
    <div class="card-body">
        <table class="table table-bordered" text>
            <thead>
                <tr>
                    <th scope="col">Classify</th>
                    <th scope="col">Update</th>
                    <th scope="col">Delete</th>
                    <!--<th scope="col">Delete</th>-->
                </tr>
            </thead>
            <tbody>


                <!--creat Modal -->
                <div class="modal fade" id="creatClassify" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Create Classify</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="get">
                                    <div class="form-group">
                                        <label class="col-form-label">Classify:</label>
                                        <input class="form-control" id="message-text" name="classify"></input>
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" name="controller" value="classify">
                                        <input type="hidden" name="action" value="add_classify">
                                    </div>

                            </div>

                            <div class="modal-footer">

                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" name="submit">OK</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>


                <!--delete Modal -->
                <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Are you sure to delete ?</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="get">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="del-classname" name="del-classname" readonly>
                                        <input type="hidden" class="form-control" id="del-classid" name="del-classid">
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" name="controller" value="classify">
                                        <input type="hidden" name="action" value="delete_classify">
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-danger" name="submit">Delete</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!--update Modal -->
                <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Update Classify</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="get">
                                    <div class="form-group">
                                        <label class="col-form-label">Classify name:</label>
                                        <input type="text" class="form-control" id="update_classname" name="update_classname">
                                    </div>

                                    <div class="form-group">
                                        <input type="hidden" name="update_classid" id="update_classid">
                                        <input type="hidden" name="controller" value="classify">
                                        <input type="hidden" name="action" value="update_classify">
                                    </div>

                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" name="submit">OK</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>

                <?php
                foreach ($class_list as $class) { ?>
                    <tr>
                        <input type="hidden" id="del-id" value="<?php echo "$class->class_id"; ?>">
                        <td><?php echo " $class->class_name"; ?></td>
                        <td><button type="button"
                                    class="btn btn-primary update_data"
                                    id-data="<?php echo "$class->class_id"; ?>"
                                    name-data="<?php echo "$class->class_name"; ?>">
                              Update
                              </button>
                        </td>
                        <td><button type="button"
                                    class="btn btn-danger delete_data"
                                    id-data="<?php echo "$class->class_id"; ?>"
                                    name-data="<?php echo "$class->class_name"; ?>">
                            Delete
                            </button>
                        </td>
                    </tr>
                <?php } ?>

            </tbody>
        </table>
    </div>

</body>
<?php include("./lib/footer.php") ?>
<script>
    $(document).ready(function() {
        $(document).on('click', '.delete_data', function() {
            var id = $(this).attr('id-data');
            var name = $(this).attr('name-data');
            var message = name + "     ";

            $('#del-classid').val(id);
            $('#del-classname').val(message);

            console.log(id);
            console.log(message);

            $('#deleteModal').modal("show");
        });


        $(document).on('click', '.update_data', function() {
            var id = $(this).attr('id-data');
            var name = $(this).attr('name-data');
            var price = $(this).attr('price-data');

            $('#update_classid').val(id);
            $('#update_classname').val(name);

            console.log(id);
            //console.log(message);

            $('#updateModal').modal("show");
        });
    });
</script>

</html>
